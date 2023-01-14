<?php

    session_start();

    require("conn.php");

    $error = array("acc_no"=>"","fname"=>"","lname"=>"","uname"=>"","password"=>"","gender"=>"","ph_no"=>"", "balance"=>"");
    
    $acc_no = "";
    $fname = "";
    $lname = "";
    $uname = "";
    $password = "";
    $cpassword = "";
    $ph_no = "";
    $email = "";
    $balance = "";

    if(isset($_POST["submit"]))
    {
        
        $acc_no = $_POST['acc_no'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $ph_no = $_POST['ph_no'];
        $email = $_POST['email'];
        $balance = floatval($_POST['balance']);

        if(!(preg_match("/(^[0-9]+$)/",$_POST["acc_no"])))
        {
            $error["acc_no"]="Enter a valid account number";
        }
        if(!(preg_match("/^[a-zA-Z]+$/",$_POST["fname"])))
        {
            $error["fname"]="Name must only contains alphabets";
        }
        if(!(preg_match("/^[a-zA-Z]*$/",$_POST["lname"])))
        {
            $error["lname"]="Name must only contains alphabets";
        }
        $upper = preg_match('@[A-Z]@',$_POST["password"]);
        $lower = preg_match('@[a-z]@',$_POST["password"]);
        $number = preg_match('@[0-9]@',$_POST["password"]);
        $special = preg_match('@[^\w]@',$_POST["password"]);
        if(!$upper || !$lower || !$number || !$special || strlen($_POST["password"])<8)
        {
            $error["password"]="Password must be 8 characters long and should contain a uppercase, a lowercase, a digit and a special character ";
        }
        else if(!($_POST['password']===$_POST['cpassword']))
        {
            $error["password"]="Password doesn't match";

        }
        if(empty($_POST["gender"]))
        {
            $error["gender"]="Choose your gender";
        }
        if(strlen($_POST["ph_no"]<10))
        {
            $error["ph_no"]="Phone number should contain 10 digits";
        }
        else
        {
            $_POST["ph_no"] = intval($_POST["ph_no"]);
        }
        if($balance<1000)
        {
            $error["balance"] = "Minimum balance should be 1000";
        }

        if(!(array_filter($error)))
        {
            $query = "select * from accounts where acc_no = '$_POST[acc_no]'";
            $exec = mysqli_query($conn,$query);
            $result = mysqli_fetch_array($exec);

            $query1 = "select * from accounts where uname = '$_POST[uname]'";
            $exec1 = mysqli_query($conn,$query1);
            $result1 = mysqli_fetch_array($exec1);

            if($result)
            {
                $error['acc_no'] = "Account number already registered!"; 
            }
            else if($result1)
            {
                $error['uname'] = "Username unavailable. Enter another user name"; 
            }
            else
            {
                $query="insert into accounts(acc_no,fname,lname,uname,password,gender,ph_no,email,balance) values('$_POST[acc_no]','$_POST[fname]','$_POST[lname]','$_POST[uname]','$_POST[password]','$_POST[gender]','$_POST[ph_no]','$_POST[email]','$_POST[balance]')";
                $exec=mysqli_query($conn,$query);
                if(!$exec)
                {
                    echo "Account registration failed";
                }
                else
                {
                    $error="";
                    $_SESSION["acc_no"] = $acc_no;
                    $_SESSION["fname"] = $fname; 

                    $query="insert into logins(acc_no,fname,lname,ph_no) values('$_POST[acc_no]','$_POST[fname]','$_POST[lname]','$_POST[ph_no]')";
                    mysqli_query($conn,$query);
                     
                    header("Location:user.php");
                }
            }
        }
    }   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC BANK</title>
    <style>
        body{
            margin:0;
            padding:0;
            background-color: rgb(193, 195, 196);
        }
        .center{
            background:lightgrey;
            border-radius:10px;
            box-shadow:5px 5px 10px rgba(0,0,0,0.5);
            margin:10px;
            margin-bottom:60px;
            padding:3px;
        }
        .head{
            text-align:center;
            padding:20px 0;
            border-bottom:1px solid silver;
        }
        form{
            padding:0 40px;
            margin:30px 0;
        }
        .text{
            width:100%;
            padding:0 2px;
            height:30px;
            font-size:16px;
            border-top:none;
            border-left:none;
            border-right:none;
            background:none;
            outline:none; 
            margin-bottom:5px;
        }
        .button{
            font-size:16px;
            padding:10px;
            background:none;
            border:1px solid black;
            border-radius:6px;
        }
        .button:hover{
            box-shadow:5px 5px 10px rgba(0,0,0,0.2);
        }
        .red-text{
            color:red;
            margin-bottom:15px;
        }
        @media screen and (max-width:600px){
            .center{
                margin-top:135px;
            }
        }
    </style>
</head>
<body>
    <?php include("header.php"); 
    // $error = array("acc_no"=>"","fname"=>"","lname"=>"","uname"=>"","password"=>"","gender"=>"","ph_no"=>"");
    ?>
    <div class="center">
        <h1 class="head">SIGN UP</h1>
        <form formaction="signup.php" method="post">
            <label for="acc_no">ACCOUNT NO : </label>
            <input type="text" class="text" id="acc_no" name="acc_no" value="<?php echo htmlspecialchars($acc_no); ?>" required>
            <div class="red-text"><?php echo $error['acc_no']; ?></div>

            <label for="fname">FIRST NAME : </label>
            <input type="text" class="text" id="fname" name="fname" value="<?php echo htmlspecialchars($fname); ?>" required>
            <div class="red-text"><?php echo $error['fname']; ?></div>

            <label for="lname">LAST NAME : </label>
            <input type="text" class="text" id="lname" name="lname" value="<?php echo htmlspecialchars($lname); ?>">
            <div class="red-text"><?php echo $error['lname']; ?></div>

            <label for="uname">USER NAME : </label>
            <input type="text" class="text" id="uname" name="uname" value="<?php echo htmlspecialchars($uname); ?>" required>
            <div class="red-text"><?php echo $error['uname']; ?></div>
        
            <label for="password">CREATE PASSWORD : </label>
            <input type="password" class="text" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>" required>
            <div class="red-text"><?php echo $error['password']; ?></div>

            <label for="cpassword">CONFIRM PASSWORD : </label>
            <input type="password" class="text" id="cpassword" name="cpassword" value="<?php echo htmlspecialchars($cpassword); ?>" required>
            <div class="red-text"></div>

            <label>GENDER : </label>

            <br>

            <input type="radio" name="gender" id="male" value="male">
            <label for="male">MALE </label>

            <br>

            <input type="radio" name="gender" id="female" value="female">
            <label for="female">FEMALE </label>

            <div class="red-text"><?php echo $error['gender']; ?></div>

            <label for="ph_no" id="ph">PHONE NUMBER : </label>
            <input type="text" class="text" id="ph_no" name="ph_no" value="<?php echo htmlspecialchars($ph_no); ?>" required>
            <div class="red-text"><?php echo $error['ph_no']; ?></div>

            <label for="email">E-MAIL : </label>
            <input type="email" class="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            <div class="red-text"></div>


            <label for="balance" id="ph">CURRENT BALANCE : </label>
            <input type="text" class="text" id="balance" name="balance" value="<?php echo htmlspecialchars($balance); ?>" required>
            <div class="red-text"><?php echo $error['balance']; ?></div>

            <input type="submit"class="button" name="submit" value="Submit"> 
        </form>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
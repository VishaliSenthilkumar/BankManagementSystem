<?php

    session_start();

    require("conn.php");
        
    $query = "select * from accounts where acc_no = '$_SESSION[acc_no]'";
    $exec = mysqli_query($conn,$query);
    $result = mysqli_fetch_array($exec);

    $acc_no = $result['acc_no'];
    $fname = $result['fname'];
    $lname = $result['lname'];
    $uname = $result['uname'];
    $gender = $result["gender"];
    $ph_no = $result['ph_no'];
    $email = $result['email'];
    $balance = "";
    
    if(isset($_POST["balance"]))
    {
        $balance = $result['balance'];
    }

    if(isset($_POST["logout"]))
    {
        header("Location:login.php");
    }

    if(isset($_POST["delete"]))
    {
        
        $query = "delete from accounts where acc_no = '$acc_no'";
        mysqli_query($conn,$query);

        header("Location:login.php");
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
            white-space:nowrap;
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
            margin-bottom:25px;
        }
        .button{
            font-size:16px;
            padding:10px;
            background:none;
            border:1px solid black;
            border-radius:6px;
            margin:5px 10px 5px 0px;
        }
        .button:hover{
            box-shadow:5px 5px 10px rgba(0,0,0,0.2);
        }
        .blue-text{
            color:blue;
            font-size:18px;
            padding:5px;
        }

        @media screen and (max-width:720px){
            .center{
                margin-top:10px;
            }
        }
    </style>
</head>
<body>
    <?php include("userheader.php");     ?>

    <div class="center">
        <h1 class="head">PROFILE</h1>
    <form formaction="profile.php" method="post">
        <label for="acc_no">ACCOUNT NO : </label>
        <input type="text" class="text" id="acc_no" name="acc_no" value="<?php echo htmlspecialchars($acc_no); ?>"disabled>

        <label for="fname">FIRST NAME : </label>
        <input type="text" class="text" id="fname" name="fname" value="<?php echo htmlspecialchars($fname); ?>"disabled>

        <label for="lname">LAST NAME : </label>
        <input type="text" class="text" id="lname" name="lname" value="<?php echo htmlspecialchars($lname); ?>" disabled>

        <label for="uname">USER NAME : </label>
        <input type="text" class="text" id="uname" name="uname" value="<?php echo htmlspecialchars($uname); ?>"disabled>
       
        <label for="gender">GENDER : </label>
        <input type="text" class="text" id="gender" name="gender" value="<?php echo htmlspecialchars($gender); ?>"disabled>
    

        <label for="ph_no" id="ph">PHONE NUMBER : </label>
        <input type="text" class="text" id="ph_no" name="ph_no" value="<?php echo htmlspecialchars($ph_no); ?>"disabled>

        <label for="email">E-MAIL : </label>
        <input type="email" class="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"disabled>

        <input type="submit" class="button" name="balance" value="Show current balance"> 

        <input type="submit" class="button margin" name="logout" value="Logout"> 

        <input type="submit" class="button margin" name="delete" value="Delete"> 

        <div class="blue-text"><?php echo $balance; ?></div>

    </form>
    </div>

    <?php include("footer.php"); ?>
</body>
</html>
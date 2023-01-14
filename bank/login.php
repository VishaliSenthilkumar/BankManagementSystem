<?php

    session_start();
    require("conn.php");

    $error = "";

    if(isset($_POST["submit"]))
    {
        $query = "select * from accounts where uname = '$_POST[uname]' and password = '$_POST[password]'";
        $exec = mysqli_query($conn,$query);
        $result = mysqli_fetch_array($exec);

        if(!$result)
        {
            $error = "Username or password incorrect!"; 
        }
        else
        {
            $error="";
            $_SESSION["acc_no"] = $result["acc_no"];
            $_SESSION["fname"] = $result["fname"];
  
            $query="insert into logins(acc_no,fname,lname,ph_no) values('$result[acc_no]','$result[fname]','$result[lname]','$result[ph_no]')";
            mysqli_query($conn,$query);

            header("Location:user.php");
        }
    }
    else
    {
        $error = "";
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
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            background:lightgrey;
            border-radius:10px;
            box-shadow:5px 5px 10px rgba(0,0,0,0.5);
            width:500px;
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
            margin-bottom:25px;
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
            margin-top:10px;
        }
        .create{
            margin-left:200px;
            text-decoration:underline;
            text-decoration-color:dimgray;
            text-underline-offset:5px;
            color:black;
            font-size:18px;
            white-space:nowrap;
        }

        @media screen and (max-width:600px){
            .center{
                top:60%;
                left:50%;
            }
        }
    </style>
</head>
<body>
    <?php include("header.php"); ?>

    <div class="center">
        <h1 class="head">LOGIN</h1>
    <form formaction="login.php" method="post">
        <label for="uname">USER NAME : </label>
        <input type="text" class="text" id="uname" name="uname" required>
        <label for="password">PASSWORD : </label>
        <input type="password" class="text" id="password" name="password" required>
        <input type="submit" class="button" name="submit" value="Submit">
        <a class="create" href="signup.php">Create account</a>
        <?php echo "<h3 class='red-text'>".$error."</h3>" ;         ?> 
    </form>
    </div>

    <?php include("footer.php"); ?>
</body>
</html>
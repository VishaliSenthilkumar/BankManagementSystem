<?php

    session_start();

    require("conn.php");
    $error = "";
    $success = "";
    $money = "";

    if(isset($_POST["submit"]))
    {
        $money = floatval($_POST["money"]);
        $acc_no = $_SESSION["acc_no"];

        $query2 = "select balance from accounts where acc_no = '$acc_no'"; 
        $exec2 = mysqli_query($conn,$query2);
        $result2 = mysqli_fetch_assoc($exec2);
        $money2 = $result2["balance"];

        if($money > $money2)
        {
            $error = "Insufficient balance";
        }
        else
        {
            $money1 = $money2-$money;
            $query1 = "update accounts set balance = '$money1' where acc_no = '$acc_no'";
            $query2 = "insert into transactions(type,f_acc,amount) values('withdraw','$acc_no', '$money') ";
            mysqli_query($conn,$query1);
            mysqli_query($conn,$query2);
            $error="";
            $success = "Amount withdrawed successfully!";
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
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            background:lightgrey;
            border-radius:10px;
            box-shadow:5px 5px 10px rgba(0,0,0,0.5);
            width:600px;
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
        }
        .button:hover{
            box-shadow:5px 5px 10px rgba(0,0,0,0.2);
        }
        .red-text{
            color:red;
            margin-top:30px;
        }
        .green-text{
            color:green;
            margin-top:30px;
        }
        @media screen and (max-width:720px){
            .center{
                margin-top:135px;
            }
        }
    </style>
</head>
<body>
    <?php include("userheader.php"); ?>

    <div class="center">
        <h1 class="head">MONEY WITHDRAWAL</h1>

    <form formaction="withdraw.php" method="post">
        <label for="money">Enter the amount to withdraw :</label>
        <input type="text" class="text" name="money" id="money" required>
        <br>
        <input type="submit"  class="button" name="submit" value="Withdraw">
        <?php echo "<h3 class='red-text'>".$error."</h3>" ;         ?> 
        <?php echo "<h3 class='green-text'>".$success."</h3>" ;         ?> 
    </form>
    </div>


    <?php include("footer.php"); ?>
</body>
</html>
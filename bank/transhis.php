<?php

    include("userheader.php"); 
        
    session_start();

    require "conn.php";

    $acc_no = $_SESSION["acc_no"];

    $query = "select * from transactions where f_acc='$acc_no' or to_acc='$acc_no'";

    $exec = mysqli_query($conn,$query);

    $row = mysqli_fetch_array($exec);

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
        .head{
            text-align:center;
            padding:20px 0;
            border-bottom:1px solid silver;
            white-space:nowrap;
        }
        .trans{
            text-align:center;
            font-size:21px;
            border-radius:10px;
            box-shadow:1px 1px 1px dimgrey;
            margin:0px 10px 15px 10px;
            padding:15px;
            border:1px solid black;
        }
        .blue-text{
            color:blue;
            font-size:18px;
            padding:5px;
        }
        span{
            font-style:italic;
        }
        .empty{
            height:50px;
        }
        @media screen and (max-width:720px){
            .center{
                margin-top:10px;
            }
        }
    </style>
    
</head>
<body>

    <h1 class="head">TRANSACTION HISTORY</h1>

    <?php 
    
    if(!$row)
    {
        echo "NO TRANSACTION DONE";
    }

    while($row)
    {
        if($row["type"]=="withdraw")
        {
            echo "<div class='trans'>Withdrawed <span>$".$row['amount']."</span> at ".$row['time']."</div>";
        }
        else if($row["type"]=="transfer" && $row["f_acc"]==$acc_no)
        {
            echo "<div class='trans'>Debited <span>$". $row['amount']."</span> to account no.".$row['to_acc']." at ".$row['time']."</div>";
        }
        else
        {
            echo "<div class='trans'>Credited <span>$".$row['amount']."</span> from account no.".$row['f_acc']." at ".$row['time']."</div>";
        }
        $row = mysqli_fetch_array($exec);
    }
    ?>

    <div class="empty"></div>

    <?php include("footer.php"); ?>
</body>
</html>
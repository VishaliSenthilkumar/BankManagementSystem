<?php
    session_start();

    $acc_no = $_SESSION["acc_no"];
    $fname = $_SESSION["fname"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC BANK</title>
</head>
    <style>
        body{
            margin:0;
            padding:0;
            background-color: rgb(193, 195, 196);
        }
        .wel{
            padding:20px 0;
            border-bottom:1px solid silver;
            white-space:nowrap;
            margin:15px;
        }
        .head{
            float:left;
        }
        .date{
            float:right;
        }
        .text, label{
            font-size:16px;
            margin:30px 0px 10px 15px;
            text-align:left;
        } 
        .margin{
            margin-top:30px;
        }
        .button{
            text-align:center;
            padding:10px;
            background:none;
            border:1px solid black;
            border-radius:6px;
        }
        img{
            width:150px;
            height:150px;
        }
        .container{
            display:flex;
            justify-content:space-around;
            align-items:center;
            margin:50px 0px;
            flex-wrap:wrap;
        }
        a{
            text-decoration:none;
        }
        .card{
            border:2px solid dimgrey;
            border-radius:15px;
            padding:20px;
            margin:20px;
            width:210px;
            height:300px;
            display:flex;
            flex-direction:column;
            justify-content:space-around;
            align-items:center;
        }
    </style>

<body>
    <?php include("userheader.php"); 

    $date = date('y/m/d h:m:s');
    
    ?>

    <div class='wel'>
        <h1 class='head'>Hello, <?php echo $fname ?>!</h1>
        <p class='date'><?php echo $date ?></p>
    </div>

    <div class="margin">
        <label for="acc_no">ACCOUNT NO : </label>
        <input type="text" class="text button" id="acc_no" name="acc_no" value="<?php echo htmlspecialchars($acc_no); ?>"disabled>
    </div>

    <div class="container">
        <div class="card">
            <img src=images/mt.jpg>
            <h3 class="ser"><a href="transfer.php">Transfer Money</a></h3>
        </div>

        <div class="card">
            <img src=images/mw.jpg>
            <h3 class="ser"><a href="withdraw.php">Withdraw Money</a></h3>
        </div>

        <div class="card">
            <img src=images/th.jpg>
            <h3 class="ser"><a href="transhis.php">Transaction History</a></h3>
        </div>

        <div class="card">
            <img src=images/vp.jpg>
            <h3 class="ser"><a href="profile.php">View Profile</a></h3>
        </div>
    </div>
    




    <?php include("footer.php"); ?>
</body>
</html>
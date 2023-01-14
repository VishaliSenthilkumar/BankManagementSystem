
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        header{
            display: flex;
            justify-content:space-around;
            align-items:center;
            border:2px solid grey;
            box-shadow:2px 2px 2px gold;
            height:80px;
            background-color:silver;
            text-align:center;
        }
        .div{
            display:flex;
            justify-content:space-around;
            align-items:center;
            flex-grow:3;
        }
        .img{
            border:2px solid grey;
            box-shadow:1px 1px gold;
            height:50px;
            width:50px;
            margin-left:5px;
        }
        .h1{
            text-shadow:2px 2px gold;
            color:purple;
            white-space:nowrap;
            text-align:center;
            flex-grow:2;
        }
        ul{
            flex-grow:1;
            display:flex;
            justify-content:space-between;
            align-items:center;
            list-style:none;  
            margin-right:15px;       
        }
        li{
            border:2px solid grey;
            border-radius:10px;
            background-color:silver;
            font-size:21px;
            padding:7px;
        }
        li:hover{
            background-color:lightgray;
            transform:scale(1.01);
        }
        .a{
            text-shadow:1px 1px 1px gold;
            text-decoration:none;
            color:purple;
        }
        .bank{
            text-decoration:none;
            text-shadow:2px 2px gold;
            color:purple;
            white-space:nowrap;
            text-align:center;
        }

        @media screen and (max-width:720px){
            header{
                width:100%;
                flex-direction:column;
                justify-content:space-around;
                align-items:center;
                align-content:center;
                height:320px;
            }
            .div{
                display:flex;
                flex-direction:row;
                justify-content:space-around;
                align-items:center;
                flex-grow:2;
                width:100%;
            }
            .h1{
                flex-grow:3;
            }
            ul{
                flex-grow:5;
                width:98%;
                flex-direction:column;
                justify-content:space-around;
                align-items:center;
                align-content:center;  
                margin-right:0px;
            }
            li{
                width:100%;
            }
        }
    </style>

</head>
<body>
    <header>
        <div class="div">
            <img class="img" src="logo.jpg" alt="logo">
            <h1 class="h1"><a class="bank" href="user.php">ABC BANK</a></h1>
        </div>
        <!-- <nav> -->
            <ul>
                <li><a class="a" href="transfer.php">Transfer</a></li>
                <li><a class="a" href="withdraw.php">Withdraw</a></li>
                <li><a class="a" href="transhis.php">Transcation history</a></li>
                <li><a class="a" href="profile.php">Profile</a></li>
            </ul>
        <!-- </nav> -->
    </header>

</body>
</html>
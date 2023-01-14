
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
            border:2px solid grey;
            box-shadow:2px 2px 2px gold;
            height:80px;
            background-color:silver;
            
        }
        .logo{
            border:2px solid grey;
            box-shadow:1px 1px gold;
            height:50px;
            width:50px;
            margin-top:15px;
            margin-left:10px;
            margin-bottom:10px;
        }
        .h1{
            text-shadow:2px 2px gold;
            text-align:center;
            position:absolute;
            left:41%;
            top:20px;
            color:purple;
            white-space:nowrap;
        }
        ul{
            list-style:none;
            float:right;
            margin:25px;           
        }
        li{
            display:inline-block;
            margin-right:20px;;
            margin-left:5px;;
            font-size:21px;
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

        @media screen and (max-width:620px){
            ul{
                border:2px solid grey;
                clear:both;
                width:100%;
                text-align:center;
                background-color:silver;
                margin:0px auto;
            }
            li{
                margin:0px auto;
                font-size:25px;
                padding:15px;
                color:white;
                display : block;
            }
            .bord{
                border-bottom:1px solid grey; 
            }
        }
    </style>
</head>
<body>
    <header>
        <img class="logo" src="images/logo.jpg" alt="logo">
        <h1 class="h1"><a class="bank" href="index.php">ABC BANK</a></h1>
        <ul>
            <li class="bord"><a class="a" href="login.php">login</a></li>
            <li><a class="a" href="signup.php">sign up</a></li>
        </ul>
    </header>

</body>
</html>
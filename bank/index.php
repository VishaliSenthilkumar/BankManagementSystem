<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANK</title>

    <style>
        body{
            margin:0;
            padding:0;
            background-color: rgb(193, 195, 196);
        }
        .container{
            display:flex;
            justify-content:space-around;
            align-items:center;
            margin:45px 0px;
            flex-wrap:wrap;
        }
        a{
            text-decoration:none;
        }
        .card{
            padding:20px;
            margin:20px;
            width:45%;
            display:flex;
            flex-direction:column;
            justify-content:space-around;
            align-items:center;
        }
        .intro{
            margin: 25px;
            text-align:center;
            padding: 21px;
        }
        .head
        {
            margin: 25px;
            font-size: 27px;
            margin-bottom: 30px;
            color: rgb(34, 26, 41);
        }
        .start
        {
            font-size: 24px;
            text-shadow:1px 1px 1px gold;
            color:purple;
            margin-top:30px;
            padding:10px;
        }
        .img{
            width:95%;
            border-radius:10px;
            opacity:0.9;
        }
        p{
            padding:15px;
            line-height:30px;
        }
        h6{
            font-size:15px;
            padding:7px;
        }
        /* .border{
            border:2px double dimgrey;
        } */

        @media screen and (max-width:620px){
            .container
            {
                margin:150px 0px 50px 0px;
            }

        }
        @media screen and (max-width:1000px){
            .card{
                width:95%;
            }

        }
    </style>

</head>
<body>
    <?php include "header.php" ?>

    <div class="container">
        <div class="card intro">
            <h3 class="head">Simplified banking</h3>
            <p>Everyday access and checking provides convenience and fast access</p>
            <p class="start"><a href="login.php">Start Now :)</a></p>
        </div>

        <div class="card">
            <img class="img" src="images/bank.jpg">
        </div>

        <div class="card border">
            <h3 class="head">About Us</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus, assumenda. Debitis cumque rem cupiditate, unde sint minus ipsum incidunt fuga dicta quia pariatur dolorem repudiandae, officiis molestiae error earum quidem exercitationem deserunt animi reiciendis veritatis ratione? Minima quidem sit doloribus est deleniti reprehenderit possimus, architecto illo perspiciatis dignissimos neque quo.</p>
        </div>

        <div class="card border">
            <h3 class="head">Contact </h3>
            <h6>Phone : 7834836232</h6>
            <h6>E-mail : abc@gmail.com</h6>
            <p>Reach out to our nearest branch for more info..!</p>
        </div>
    </div>


    <?php include "footer.php" ?>
</body>
</html>
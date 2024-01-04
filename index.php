<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Project</title>
    <style>
        h1{text-align:center; background-color: black; color: white; padding: 10px;}
        div{display: flex; justify-content: center; align-items: center;}
        div.one{background-color: lightblue; height: 100px; }
        div.two{background-color: yellow; height:100px;}
        div.three{background-color:#dc3545; height:100px;}
        a:hover{background-color: black; color: white;}
        div.homepage{
            margin-top: 5em;
        }
        div.homepage a{
            text-decoration: none;
            font-weight: bold;
            font-size: large;
            color: white;
        }
        body{
            background: url("q.jpg");
            
        }
    </style>
</head>
<body>
    <?php
    echo <<<HTML
                <h1> Registration and Login for Shopping Online </h1>
                <br/><br/><br/>
                <div style="width:100%; font-size: 20px;">
                    <div class="one" style="float:left; width:33.33%;">
                        Not Registered Yet- 
                        <a href="signup.php"> Signup Here </a>
                    </div>
                    <div class="two" style="float:left; width:33.33%;">
                        Already Registered-
                        <a href="userlogin.php">Login Here </a>
                    </div>
                    <div class="three" style="float:left; width:33.33%;">
                        Admin Panel-
                        <a href="admin"> Login Here</a>
                    </div>
                    
                </div>
                <div class="homepage">
                        <a href="../new/first.php">Back to Homepage</a>
                </div>
                    <p align="center">First login to enter the cart.</p>
    HTML;
    ?>
    <?php
        include 'footer.php';
    ?>
</body>
</html>
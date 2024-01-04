<?php session_start(); 
    include_once('config.php');
    if (!isset($_SESSION['id'])) {
        header('location:logout.php');
        } else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        div.head{
            background-color: gray;
            height: 60px;
            line-height: 60px;
        }
        div.main{
                    background-color: gray;
                    margin-left: 0;
                    padding: 1.5em;
                    position:fixed;
                    height: 100%;
        }
        div.side{
            padding-top: 2em;
            padding-bottom: 2em;
        }
        div.display{
                    position: fixed;
                    margin-left: 12.55em;
                    height: 100%;
                    width: 75%;
                    text-align: center;
        }
        a{
            text-decoration: none;
            font-weight: bold;
            color:black;
        }
        a:hover{
            background-color: white;
            text-decoration: underline;
        }
        h1{
            text-align: center;
        }
        h1.dash{
            color: blue;
        }
    </style>
</head>
<body>
    <div class="head"><h1>Admin Panel</h1></div>
    <div class="main">
        <div class="side">
            <a href="welcome.php">
                <img src="" height="10px" width="10px"/> Dashboard
            </a>
        </div><hr/>
        <div class="side">
            <a href="manageusers.php">
                <img src="users.png" height="20px" width="15px"/> Manage Users
            </a>
        </div><hr/>
        <div class="side">
            <a href="logout.php">
                <img src="logout.png" height="20px" width="15px"/> Logout
            </a>
        </div>
    </div>
    <div class="display">
        <br/><br/><br/>
        <?php } ?>
        <?php
            user();
        ?>
    </div>
</body>
</html>
<?php
    function user()
    {
        $connection = mysqli_connect("localhost","root","","signup");
        
        if(!$connection) 
        {
            die("Can not connect to the database server ". mysqli_connect_error());
        }
        
        $query=mysqli_query($connection,"select register_no from register");
        $totalusers=mysqli_num_rows($query);
        {
            echo "<br/><br/><h1 style='background-color:red; color:white;'>Total Registered Users: $totalusers";
            
        }
        mysqli_close($connection);
    }
?>
<?php include 'footer.php';?>
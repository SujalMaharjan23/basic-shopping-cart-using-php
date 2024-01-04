<?php session_start(); 
    include_once('config.php');
    if (!isset($_SESSION['register_no'])) {
        header('location:logout.php');
        } else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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
    <div class="head"><h1>Dashboard</h1></div>
    <div class="main">
        <div class="side">
            <a href="profile.php">
                <img src="user.png" height="10px" width="10px"/> Profile
            </a>
        </div>
        <div class="side">
            <a href="changepassword.php">
                <img src="key.png" height="10px" width="10px"/> Change Password
            </a>
        </div>
        <div class="side">
            <a href="../shopcart/index.php">
                <img src="cart.png" height="20px" width="20px"/> Cart
            </a>
        </div>
        <div class="side">
            <a href="logout.php">
                <img src="logout.png" height="10px" width="10px"/> Signout
            </a>
        </div>
    </div>
    <div class="display">
        <br/><br/><br/>
        <h1>Welcome</h1>
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
        $register_no=$_SESSION['register_no'];
        $query=mysqli_query($connection,"select * from register where register_no='$register_no'");
        while($result=mysqli_fetch_array($query))
        {
            echo $result['fname']." ".$result['lname'];
            
        }
        mysqli_close($connection);
    }

?>

<?php include 'footer.php';?>

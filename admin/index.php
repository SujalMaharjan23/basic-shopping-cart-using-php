<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        div.box{background-color: white; height: 400px; width:500px; 
                margin-left: auto; margin-right: auto; margin-top: 55px;
                border-radius: 5px;}
        input{height: 30px;}
        .m{margin-left: 10px;}
        button{background-color:#10a3f2;color: white;}
    </style>
</head>
<body bgcolor="#10a3f2">
<?php
    if(isset($_POST['login']))
    {
        check();
        showform();
    }
    else
    {
        showForm();
    }
    ?>
    <?php
        include 'footer.php';
    ?>
</body>
</html>
<?php
function showForm()
    {
        echo<<<H
    <div class="box">
        <h1 align="center">My Online Shop</h1>
        <hr/>
        <h2 align="center">Admin Login</h2>
        
        <form action="$_SERVER[PHP_SELF]" method="post">
            <div class="m">Username:</div>
            <div class="m">
                <input type="text" name="username" placeholder="Enter your username." size="62"/>
            </div><br/>
            <div class="m">Password:</div>
            <div class="m">
                <input type="password" name="password" placeholder="Password." size="62"/>
            </div><br/>
            <input type="hidden" value="1" name="login"/>
            <div style="margin-left:220px">
                <button type="submit">Login</button>
            </div><br/><br/>
            
            <div style="text-align:center;"><a href="../index.php">Back to Home</a></div>
        </form>
        
    </div>
    H;
    }
    
    function check()
    {
        $connection = mysqli_connect("localhost","root","","signup");
        
        if(!$connection) 
        {
            die("Can not connect to the database server ". mysqli_connect_error());
        }
        $username=$_POST['username'];
        $password=$_POST['password'];
        $ret= mysqli_query($connection,"SELECT * FROM admins WHERE username='$username' and password='$password'");
        $num=mysqli_fetch_array($ret);
        if($num>0)
        {
            $_SESSION['id']=$num['id'];
            $_SESSION['username']=$num['username'];
            header("location:welcome.php");
        }
        else
        {
            echo "<script>alert('Invalid username or password');</script>";
        }
        mysqli_close($connection);
    }
    
?>
<?php session_start(); 
    include_once('config.php');
    if (!isset($_SESSION['register_no'])) {
        header('location:logout.php');
        } else{
?>
<?php
    $connection = mysqli_connect("localhost","root","","signup");
        
    if(!$connection) 
    {
        die("Can not connect to the database server ". mysqli_connect_error());
    }
    if(isset($_POST['update']))
    {
        if((strlen($_POST['newpassword']))>8)
        {
            if(($_POST['newpassword'])==$_POST['confirmpassword'])
            {
                $oldpassword=$_POST['currentpassword']; 
                $newpassword=$_POST['newpassword'];
                $sql=mysqli_query($connection,"SELECT password FROM register where password='$oldpassword'");
                $num=mysqli_fetch_array($sql);
                if($num>0)
                {
                    $register_no=$_SESSION['register_no'];
                    $ret=mysqli_query($connection,"update register set password='$newpassword' where register_no='$register_no'");
            
                    echo "<script>alert('Password Changed Successfully !!');</script>";
                    echo "<script type='text/javascript'> document.location = 'changepassword.php'; </script>";
                }
                else
                {
                    echo "<script>alert('Old Password not match !!');</script>";
                    echo "<script type='text/javascript'> document.location = 'changepassword.php'; </script>";
                }
            }
            else
            {
                echo "<script>alert('New Password and Confirm Password does not match !!');</script>";
                echo "<script type='text/javascript'> document.location = 'changepassword.php'; </script>";
            }
        }
        else
        {
            echo "<script>alert('Password must contain more than 8 characters !!');</script>";
            echo "<script type='text/javascript'> document.location = 'changepassword.php'; </script>";
        }
    }
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
        table {
            border: 1px solid black;
            border-collapse: collapse;
            margin-top: 5em;
            margin-left: auto;
            margin-right: auto;
            font-weight: bold;
            width:500px;
        }
        tr td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 1em;
        }
        button{
            background-color: blue; 
            color: white;
            font-size: 20px;
            height:2em;
            border-radius: 10px;
            border-color: white;
        }
    </style>
</head>
<body>
    <?php include 'welcomeheader.php'; ?>
    <div class="display">
        
        <?php
            $connection = mysqli_connect("localhost","root","","signup");
        
            if(!$connection) 
            {
                die("Can not connect to the database server ". mysqli_connect_error());
            }
            $register_no=$_SESSION['register_no'];
            $query=mysqli_query($connection,"select * from register where register_no='$register_no'");
            while($result=mysqli_fetch_array($query))
            {?>
                <h1 style="color:gray;">Change Password</h1>
                    <form method="POST">
                            <table>
                            <tr>
                                <td>Current Password</td>
                                <td><input name="currentpassword" type="password" required /></td>
                            </tr>
                            <tr>
                                <td>New Password</td>
                                <td><input name="newpassword" type="password" required /></td>
                            </tr>
                            <tr>
                                <td>Confirm Password</td>
                                <td><input name="confirmpassword" type="password" required /></td>
                            </tr>
                            </table>
                            <br/><tr>
                                <td colspan="2" style="text-align:center; "><button type="submit" name="update">Change</button></td>
                            </tr>
                    </form>
            <?php mysqli_close($connection);}
            ?>
    </div>
</body>
</html>
<?php include 'footer.php';?>
<?php } ?>
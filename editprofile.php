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
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        $contact=$_POST['contact'];
        $register_no=$_SESSION['register_no'];
        $msg=mysqli_query($connection,"update register set fname='$fname',mname='$mname',lname='$lname',contact='$contact' where register_no='$register_no'");

    if($msg)
    {
        echo "<script>alert('Profile updated successfully');</script>";
        header("location:profile.php");
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
                <h1 style="color:gray;"><?php echo $result['fname'];?>'s Profile</h1>
                    <form method="POST">
                            <table>
                            <tr>
                                <td>First Name</td>
                                <td><input name="fname" type="text" value="<?php echo $result['fname'];?>" required /></td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td><input name="mname" type="text" value="<?php echo $result['mname'];?>" /></td>
                            </tr>
                            <tr>
                               <td>Last Name</td>
                               <td><input name="lname" type="text" value="<?php echo $result['lname'];?>" required /></td>
                            </tr>
                            <tr>
                               <td>Email</td>
                               <td><?php echo $result['email'];?></td>
                            </tr>
                            <tr>
                               <td>Contact No.</td>
                               <td><input name="contact" type="text" value="<?php echo $result['contact'];?>" required /></td>
                            </tr>
                            
                            </table>
                            <br/><tr>
                                <td colspan="2" style="text-align:center; "><button type="submit" name="update">Update</button></td>
                            </tr>
                    </form>
            <?php mysqli_close($connection);}
            ?>
    </div>
</body>
</html>
<?php include 'footer.php';?>
<?php } ?>
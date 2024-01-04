<?php session_start(); 
    include_once('config.php');
    if (!isset($_SESSION['id'])) 
    {
        header('location:logout.php');
    }
    else
    {

        if(isset($_GET['id']))
        {
            $connection=mysqli_connect("localhost","root","","signup");
            if(!$connection)
            {
                die(mysqli_connect_errno());
            }
            $query="delete from register where register_no=$_GET[id]";
            $result=mysqli_query($connection,$query);
            if($result)
            {
                echo "<script>alert('Data deleted');</script>";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
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
        table{
            margin-left: auto;
            margin-right: auto;
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
                <img src="users.png" height="10px" width="10px"/> Manage Users
            </a>
        </div><hr/>
        <div class="side">
            <a href="logout.php">
                <img src="logout.png" height="10px" width="10px"/> Logout
            </a>
        </div>
    </div>
    <div class="display">
        
        <h1> Manage Users</h1>
        
        <table cellspacing="0" border="1px solid black">
            <tr class="table">
                <th>Register no.</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Contact no.</th>
                <th>Email Id</th>
                <th>Actions</th>
            </tr>
            
            
        <?php
    
            $connection = mysqli_connect("localhost","root","","signup");
    
            if(!$connection) 
            {
                die("Can not connect to the database server ". mysqli_connect_error());
            }
    
            $query= "select * from register";
            $result = mysqli_query($connection,$query);
            if(!$result)
            {
                die("Query Failed......".mysqli_error($connection));        
            }
            while($row=mysqli_fetch_array($result))
            {?>
                
                        <tr>
                            <td><?php echo $row['register_no'];?></td>
                            <td><?php echo $row['fname'];?></td>
                            <td><?php echo $row['mname'];?></td>
                            <td><?php echo $row['lname'];?></td>
                            <td><?php echo $row['contact'];?></td>
                            <td><?php echo $row['email'];?></td>
                            
                            <td>
                                <a href="<?php $_SERVER['PHP_SELF']?>?id=<?php echo $row['register_no'];?>">
                                    <img src="delete.png"/>
                                </a>
                            </td>
                        </tr>
                    
            <?php }
            mysqli_close($connection);
        ?>
        </table>
        
    </div>
</body>
</html>
<?php } ?>
<?php include 'footer.php';?>

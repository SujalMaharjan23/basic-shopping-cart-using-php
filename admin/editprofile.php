<?php session_start(); 
    
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

            
            $query=mysqli_query($connection,"select * from register where register_no='$_GET[register_no]'");
            while($result=mysqli_fetch_array($query))
            {?>
                <h1 style="color:gray;"><?php echo $result['fname'];?>'s Profile</h1>
                
                        
                            
                            <table>
                            <tr>
                                <td>First Name</td>
                                <td><?php echo $result['fname'];?></td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td><?php echo $result['mname'];?></td>
                            </tr>
                            <tr>
                               <td>Last Name</td>
                               <td><?php echo $result['lname'];?></td>
                            </tr>
                            <tr>
                               <td>Email</td>
                               <td><?php echo $result['email'];?></td>
                            </tr>
                            <tr>
                               <td>Contact No.</td>
                               <td><?php echo $result['contact'];?></td>
                            </tr>
                            </table>
                            <a href="editprofile.php" style="text-decoration:underline; color:red;">Edit</a>
                
            <?php }
            ?>
    </div>
</body>
</html>
<?php include 'footer.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
    <style>
        div.box{background-color: white; height: 500px; width:555px; 
                margin-left: auto; margin-right: auto; margin-top: 30px;
                border-radius: 5px;}
        input{height: 25px;}
        .m{margin-left: 6px;}
        button{background-color:#10a3f2;color: white;}
    </style>
</head>
<body bgcolor="#10a3f2">
    <?php
    if(isset($_POST['create']))
    {
        if($error = validate())
        {
            Errors($error);
            echo "<a href='signup.php'>Back to Form</a>";
        }
        else
        {
            save();
            display();
            echo "<a href='index.php'>Back to Home</a>";
        }
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
        <h1 align="center">Registration and Login for Online Shopping</h1>
        <hr/>
        <h2 align="center">Create Account</h2>
        <form action="$_SERVER[PHP_SELF]" method="post">
            <input type="text" name="fname" class="m" placeholder="Enter your first name"/>
            <input name="mname" type="text" placeholder="Enter your middle name" />
            <input name="lname" type="text" placeholder="Enter your last name" /><br/><br/>
            <input type="text" name="contact" class="m" placeholder="Contact Number" size="72"/><br/><br/>
            <input type="email" name="email" class="m" placeholder="Email Address" size="72"/><br/><br/>
            <input type="password" name="password" class="m" placeholder="Password" size="33"/>
            <input type="password" name="cpassword" placeholder="Confirm Password" size="33"/><br/><br/>
            <input type="hidden" value="1" name="create"/>
            <div style="display:grid; margin-left:6px; margin-right:8px;">
                <button type="submit">Create Account</button>
            </div><br/><br/>
            <div style="text-align:center;"><a href="userlogin.php">Have an account? Go to login</a></div>
            <div style="text-align:center;"><a href="index.php">Back to Home</a></div>
        </form>
    </div>
    H;
    }
    function validate()
    {
        $errors = array();
        if(empty($_POST['fname']))
        {
            $errors[]="First Name is compulsory.";
        }
        if(empty($_POST['lname']))
        {
            $errors[]="Last Name is compulsory.";
        }
        if(empty($_POST['contact']))
        {
            $errors[]="Contact number is compulsory.";
        }
        if(empty($_POST['email']))
        {
            $errors[]="Email is compulsory.";
        }
        if((empty($_POST['password']))||((strlen($_POST['password']))<8))
        {
            $errors[]="Password is compulsory and must contain more than 8 characters.";
        }
        if((($_POST['password'])!=($_POST['cpassword'])))
        {
            $errors[]="Password and Confirm Password doesn't match.";
        }
        return $errors;
    }
    function Errors($errors){
        echo <<< ERROR_TEXT
        <h2>Plese Correct These Errors</h2>
        <ul>
        ERROR_TEXT;
        foreach($errors as $error) 
        {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
    function display()
    {
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        echo"
            <h1 align='center'>Data you have submitted.</h1>
            <table align='center'>
            <tr><td>First Name:</td> <td>$fname</td><tr/>
            <tr><td>Middlle Name:</td> <td>$mname</td><tr/>
            <tr><td>Last Name:</td> <td>$lname</td><tr/>
            <tr><td>Contact Number:</td> <td>$contact</td><tr/>
            <tr><td>Email:</td> <td>$email</td><tr/>
            <tr><td>Password:</td> <td>$password</td></tr>
            </table>
        ";
    }
    function save() 
    {
        $connection = mysqli_connect("localhost","root","","signup");
        
        if(!$connection) 
        {
            die("Can not connect to the database server ". mysqli_connect_error());
        }
        
        $quer="select register_no from register where email='$_POST[email]'";
        $sql= mysqli_query($connection,$quer);

        $row=mysqli_num_rows($sql);
        if($row>0)
        {
            echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
        } 
        else
        {
            $query = "insert into register (fname, mname, lname, contact, email, password)
            values ('$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$_POST[contact]', '$_POST[email]','$_POST[password]')
            ";
            $query = mysqli_query($connection, $query);

            if(!$query) 
            {
                die("Can not perform query". mysqli_error($connection));
            }
            else
            {
                echo "<script>alert('Registered successfully');</script>";
                echo "<script type='text/javascript'> document.location = 'userlogin.php'; </script>";
            }
        }   
        mysqli_close($connection);
    }
    
?>

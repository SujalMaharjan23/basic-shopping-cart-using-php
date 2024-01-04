<?php
    
            $connection = mysqli_connect("localhost","root","","signup");
    
            if(!$connection) 
            {
                die("Can not connect to the database server ". mysqli_connect_error());
            }
?>
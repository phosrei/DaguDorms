<?php 

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "dagudorms_userdb";
    $conn = "";

    $con = mysqli_connect($db_server, 
                            $db_user, 
                            $db_pass, 
                            $db_name);
?>
<?php
    $db_server="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="jobportal";
    $conn="";

    $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);

    if($conn==false)
    {
        echo "Database is not Connected!";
    }
?>
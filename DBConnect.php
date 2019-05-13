<?php
    #1. Database ìnormation
    $server = "localhost";
    $account = "root";
    $password = "";
    $database = "dbstudent";
    
    #2. Declare Connection String
    $conn = mysqli_connect($server, $account, $password, $database);
    
    #3. Test Connection
    if($conn == null){
        die("Error: Connection Fails");
    }else{
       // echo ("Congratulation!");
    }
?>
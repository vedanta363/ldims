<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password']; 
    // Database Connection
    $host = "localhost";
    $dbusername = "reicom_dbuser";
    $dbpassword = "P@ssw0rd965";
    $dbname = "reicom_auth";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

    if ($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
    
    // validate Login authentication
    $query = "SELECT *FROM login WHERE username='$username' AND password='$password";
    $result = $conn->query($query);
    if($result->num_rows == 1){
        // Login success
        header("Location: success.html");
        exit();
    }
    else{
        // Login failed
        header("Location: error.html");
        exit();
    }
    $conn->close();


}    


?>
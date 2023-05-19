<?php
    if(isset ($_POST['submit-btn']) || isset($_SESSION['name'])) {

        //Database information
        $servername = "localhost:3306";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "voting_system";

        // Create and check database connection
        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
        
        // TODO initiate create database
        if($conn -> connect_error) {
            die("Connection failed: " . $conn -> connect_error);
        }
    }
    else {
        echo "Access denied";
    }
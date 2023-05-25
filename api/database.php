<?php
    class Connect {
        public function connect() {
            $servername = "localhost:3306";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "voting_system";

            // Create and check database connection
            $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
            if ($conn -> connect_error) {
                die("Connection failed: " . $conn -> connect_error);
            }
            return $conn;
        }
    }
?>
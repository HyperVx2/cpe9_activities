<?php
    class Connect {
        public function connect() {
            $servername = "127.0.0.1:3306";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "voting_system";

            // Create and check database connection
            $conn = new mysqli($servername, $dbName, $dbPassword, $dbName);
            if ($conn -> connect_error) {
                die("Connection failed: " . $conn -> connect_error);
            }
            return $conn;
        }
    }
?>
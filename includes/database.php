<?php
if (isset($_POST['submit-btn']) || isset($_SESSION['name'])) {

    // Database information
    $servername = "localhost:3306";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "voting_system";

    // Create and check database connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the database exists
    $sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbName'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // Database doesn't exist, run the SQL script to create it
        $script = file_get_contents('../database/users.sql');
        if ($conn->multi_query($script)) {
            echo "Database created successfully.";

            $conn->close();

            // Reload connection with the updated database name
            $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        } else {
            echo "Error creating database: " . $conn->error;
        }
    }

} else {
    echo "Access denied";
}
?>

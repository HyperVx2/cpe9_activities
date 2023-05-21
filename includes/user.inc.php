<?php
    if(isset($_POST['submit-btn'])) {
        //Include database file
        require 'database.php';

        //Variables from panel
        $username = $_POST['username'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $password = $_POST['password'];
        $program = $_POST['inputProgram'];
        $level = $_POST['inputLevel'];

        //Error handlers
        if(empty($username) || empty($firstName) || empty($lastName) || empty($password) || empty($program) || empty($level)) {
            header("Location: ../panel.php?error=emptyfield");
            exit();
        }
        else {
            $sql = "SELECT username FROM voting_system.users WHERE username=?";
            $stmt = $conn -> stmt_init();
            if(!$stmt -> prepare($sql)) {
                //SQL error
                header("Location: ../panel.php?error=sqlerror");
                exit();
            }
            else {
                $stmt -> bind_param("s", $username);
                $stmt -> execute();
                $stmt -> store_result();
                $result = $stmt -> num_rows();
                if($result > 0) {
                    header("Location: ../panel.php?error=usernametaken");
                    exit();
                }
                else {
                    $sql = "INSERT INTO voting_system.users (username, firstName, lastName, password, program, yearLevel) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $conn -> stmt_init();
                    if(!$stmt -> prepare($sql)) {
                        //SQL error
                        header("Location: ../panel.php?error=sqlerror");
                        exit();
                    }
                    else {
                        $hashed = password_hash($password, PASSWORD_DEFAULT);
                        $stmt -> bind_param("ssssss", $username, $firstName, $lastName, $hashed, $program, $level);
                        $stmt -> execute();
                        header("Location: ../panel.php?success=200&user=$username");
                        exit();
                    }
                }
            }
        }
    }
    else {
        header("Location: ../panel.php");
        exit();
    }
<?php
if (isset($_POST['submit-btn'])) {
    session_start();
    // Include database file
    require 'database.php';

    // Variables
    $username = $_SESSION['userID'];
    $yearLevel = $_SESSION['level'];
    $president = $_POST['president'];
    $vicePresident = $_POST['vice-president'];
    $representatives = $_POST['representatives'];

    // Checking if the user already casted a vote
    $sql = "SELECT * FROM voting_system.votes WHERE username=?";
    $stmt = $conn->stmt_init();
    if (!$stmt->prepare($sql)) {
        header("Location: ../vote.php?error=sqlerror");
        exit();
    } else {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $result = $stmt->num_rows();
        if ($result > 0) {
            header("Location: ../vote.php?error=casted");
            exit();
        } else {
            $numRepresentatives = count($representatives);
            if ($numRepresentatives > 5) {
                header("Location: ../vote.php?error=exceeded_limit");
                exit();
            }

            // Insert vote into database
            $sql = "INSERT INTO voting_system.votes (username, yearLevel, president, vPresident, rep) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->stmt_init();
            if (!$stmt->prepare($sql)) {
                header("Location: ../index.php?error=sqlerror");
                exit();
            } else {
                $stmt->bind_param("sssss", $username, $yearLevel, $president, $vicePresident, implode(",", $representatives));
                $stmt->execute();

                // Update database voted column to 1
                $sql = "UPDATE voting_system.users SET voted=1 WHERE username=? AND yearLevel=?";
                $stmt = $conn->stmt_init();
                if (!$stmt->prepare($sql)) {
                    header("Location: ../vote.php?error=sqlerror");
                    exit();
                } else {
                    $stmt->bind_param("ss", $username, $yearLevel);
                    $stmt->execute();
                    header("Location: ../vote.php?success=200");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../index.php?error=access_denied");
    exit();
}

<?php
    require 'database.php';

    class API {
        function select() {
            $database = new Connect;
            $database = $database->connect();

            // Fetch votes data
            $votesSql = "SELECT * FROM voting_system.votes";
            $votesResult = $database->query($votesSql);

            $votesData = array();

            if ($votesResult->num_rows > 0) {
                while ($row = $votesResult->fetch_assoc()) {
                    $votesData[$row['id'] - 1] = array(
                        'id' => $row['id'],
                        'username' => $row['username'],
                        'program' => $row['program'],
                        'yearLevel' => $row['yearLevel'],
                        'president' => $row['president'],
                        'vpresident' => $row['vpresident'],
                        'rep' => $row['rep']
                    );
                }
            }

            // Fetch candidates data
            $candidatesSql = "SELECT * FROM voting_system.candidates";
            $candidatesResult = $database->query($candidatesSql);

            $candidatesData = array();

            if ($candidatesResult->num_rows > 0) {
                while ($row = $candidatesResult->fetch_assoc()) {
                    $candidatesData[$row['id'] - 1] = array(
                        'id' => $row['id'],
                        'name' => $row['name'],
                        'party' => $row['party'],
                        'program' => $row['program'],
                        'position' => $row['position']
                    );
                }
            }

            $responseData = array(
                'votes' => $votesData,
                'candidates' => $candidatesData
            );

            $res = json_encode($responseData);
            return $res;
        }
    }

    $api = new API;
    $json = $api->select();
    header("Content-Type: application/json");
    echo $json;
?>

<?php
    require 'database.php';

    class API {
        function select() {
            $database = new Connect;
            $database = $database -> connect();
            
            $sql = "SELECT * FROM voting_system.votes";
            $result = $database -> query($sql);

            $num = $result -> num_rows;
            $data = array();


            
            if ($num > 0) {
                while($row = $result -> fetch_assoc()) {
                    $data[$row['id'] - 1] = array(
                        'id' => $row['id'],
                        'username' => $row['username'],
                        'department' => $row['department'],
                        'program' => $row['program'],
                        'level' => $row['level']
                    );
                }
                $res = json_encode($data);
            }
            else {
                $res = "No result.";
            }

            return $res;
        }
    }

    $api = new API;
    $json = $api -> select();
    header("Content-Type: application/json");
    echo $json;
?>
<?php
    require 'database.php';

    class API {
        function select() {
            $database = new Connect;
            $database = $database -> connect();
            
            $sql = "SELECT * FROM votes";
            $result = $database -> query($sql);

            $num = $result -> num_rows;
            $data = array();


            // TODO what data we holding?
            if ($num > 0) {
                while($row = $result -> fetch_assoc()) {
                    $data[$row['id'] - 1] = array(
                        'id' => $row['id']
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
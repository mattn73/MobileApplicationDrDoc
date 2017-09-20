<?php

$database = 'DocDatabase';
$user = 'root';
$password = '';
$conn = new mysqli('127.0.0.1', $user, $password, $database);
$sender = $_REQUEST['sender'];
$msg = $_REQUEST['msg'];

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$msg = strtolower($msg);
$text = explode(" ", $msg);


if ($text[1] != 'stop' && $text[0] == 'doc') {

    $firstText = explode(".", $text[1]);
    if (count($firstText) > 1) {//step One
        $step = $firstText[0];
        $id = $firstText[1];

        if (is_numeric($id) && (strlen($id) == 4)) {//step 2 to 3
            switch ($step) {
                case '1':




                    
                    

                    break;
                case '2':





                    break;

                default:
                    break;
            }
        } else {
            
            
        }
    } else {

        $searchText = [];

        for ($x = 1; $x < count($text); $x++) {
            array_push($searchText, $text[$x]);
        }
        $key = implode(" ", $searchText);
        $sql = "select name from dummytable where name Like '%" . $key . "%'";
        $result = fetch_table($sql);

        if (is_null($result)) {
            echo("Error No result found");
            exit(1);
        }

        $msg = '<table>';
        while ($row = $result->fetch_assoc()) {
            $msg .= '<tr><td>' . $row['name'] . '</td><td> 1.' . $row['id'] . '</td></tr>';
        }
        $msg .= '</table>';
        echo $msg;
    }
}else{
    
    
    
}

function fetch_table($query) {


    $result = $conn->query($query);
    $arr = [];
    if ($result->num_rows > 0) {

        return $result;
    }
    $result = null;
    return $result;
}

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // MySQL 設定
    $mysql = mysqli_connect('HOSTNAME', 'USERNAME', 'PASSWORD', 'DATABASE');
    mysqli_query($mysql, "SET NAMES UTF8");

    $mode = $_POST['mode'];

    switch($mode) {

        case 'sendData':
            global $mysql;
            $unique = strtolower($_POST['unique']);
            $original = $_POST['original'];
            $sendDataAction = mysqli_query($mysql, "INSERT INTO url (unique_id, original_url) VALUES ('$unique', '$original')");
            if($sendDataAction) {
                echo json_encode("OK!");
            }
            else {
                echo json_encode("ERROR!");
            }
            break;

        case 'deleteUniqueId':
            global $mysql;
            $unique = strtolower($_POST['unique']);
            $deleteUniqueIdAction = mysqli_query($mysql, "DELETE FROM url WHERE unique_id = '$unique'");
            if($deleteUniqueIdAction) {
                echo json_encode("OK!");
            }
            else {
                echo json_encode("ERROR!");
            }
            break;
    }
}
else {
    http_response_code(403);
    die("You have no permission to access this page!");
}
?>

<?php

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
}
else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} 
else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

// MySQL 設定
$mysql = mysqli_connect('HOSTNAME', 'USERNAME', 'PASSWORD', 'DATABASE');
mysqli_query($mysql, "SET NAMES UTF8");

if($_GET['unique_id']) {
    $unique = strtolower($_GET['unique_id']);
    $urlSelect = mysqli_query($mysql, "SELECT * FROM url WHERE unique_id = '$unique'");
    if(!$urlSelect) {
        mysqli_close($mysql);
        die("ERROR!");
        return;
    }
    else {
        $urlData = mysqli_fetch_row($urlSelect);
        mysqli_close($mysql);
        header("Location: " . $urlData[1]);
        return;
    }
}

$allowIPAddressSelect = mysqli_query($mysql, "SELECT * FROM allow_ipaddress");

$check = 0;

if (!$allowIPAddressSelect) {
    mysqli_close($mysql); // 關閉連線
    http_response_code(403);
    die("You have no permission to access this page!");
}
else {
    while ($row = mysqli_fetch_assoc($allowIPAddressSelect)) {
        if ($row['ipaddress'] == $ip) {
            $check = 1;
            break;
        }
    }
    if ($check == 0) {
        mysqli_close($mysql); // 關閉連線
        http_response_code(403);
        die("You have no permission to access this page!");
    }
}
?>

<!DOCTYPE html>

<html>

<head>

    <!-- BootStrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Other Settings -->
    <title>ShortURL</title>

    <script>

        function copyLink(unique) {
            alert(unique.value());
        }

        function sendData() {
            $.ajax({
                type: "POST",
                url: "index.php",
                data: {
                    mode: "sendData",
                    unique: $("#unique_id").val(),
                    original: $("#original_url").val()
                },
                success: function(data) {
                    $("#unique_id").val("");
                    $("#original_url").val("");
                    alert(data);
                    location.reload();
                }
            })
        }

        function deleteUniqueId() {
            $.ajax({
                type: "POST",
                url: "index.php",
                data: {
                    mode: "deleteUniqueId",
                    unique: $("#delete_unique_id").val()
                },
                success: function(data) {
                    $("#delete_unique_id").val("");
                    alert(data);
                    location.reload();
                }
            })
        }
    </script>
</head>

<body>

    <?php

    if ($check == 1) {
        echo '
        <div class="container">
            <div class="mt-3 mb-3">
                <label for="unique_id" class="form-label">新網址代號</label>
                <input id="unique_id" name="unique_id" type="text" class="form-control" placeholder="google">
            </div>
            <div class="mb-3">
                <label for="original_url" class="form-label">原始網址</label>
                <input id="original_url" name="original_url" type="text" class="form-control" placeholder="https://google.com">
            </div>
            <div class="mb-3">
                <button id="confirmSend" name="confirmSend" type="button" class="btn btn-primary" onclick="sendData()">確認發送</button>
            </div>
            <div class="mb-3">
                <label for="delete_unique_id" class="form-label">要刪除的代號</label>
                <input id="delete_unique_id" name="delete_unique_id" type="text" class="form-control" placeholder="google">
            </div>
            <div class="mb-3">
                <button id="confirmDelete" name="confirmDelete" type="button" class="btn btn-danger" onclick="deleteUniqueId()">確認刪除</button>
            </div>';

        $urlSelect = mysqli_query($mysql, "SELECT * FROM url");
        while ($row = mysqli_fetch_assoc($urlSelect)) {
            echo $row['unique_id'] . ': ' . $row['original_url'] . ' (<a href="https://example.com/shorturl/' . $row['unique_id'] . '" target="_blank">https://example.com/shorturl/' . $row['unique_id'] . '</a>)<br>';
        }

        echo '</div>';
    }
    ?>

</body>

</html>

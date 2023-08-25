<?php
include 'header.php';
$url = "https://reqres.in/api/users/" . $_GET['id'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="card m-auto mt-5" style="width: 30rem; ">
        <div class="card-body ">
            <p>Updated item has ID: <?= $_GET['id'] ?></p>
            <p>Response code: <?= $status_code ?></p>
            <a href="get_all.php" class="btn btn-primary">Go back</a>
        </div>
    </div>
</body>
</html>

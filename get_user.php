<?php
include 'header.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, "https://reqres.in/api/users/". $_GET['id']);
$response = curl_exec($ch);
$data = json_decode($response, true);
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
<div class="card m-auto mt-4" style="width: 20rem; ">
    <img src="<?= $data['data']['avatar'] ?> " width="80px" class="card-img-top" alt="User's avatar">
    <div class="card-body ">
        <h6 class="card-title">First Name: <?= $data['data']['first_name']?></h6>
        <h6 class="card-title">Last Name: <?= $data['data']['last_name'] ?></h6>
        <h6 class="card-title"> Email: <?= $data['data']['email']?></h6>
        <a href="get_all.php" class="btn btn-primary">Go back</a>
    </div>
</div>
</body>
</html>
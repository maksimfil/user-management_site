<?php
include 'header.php';
$url = "https://reqres.in/api/users/" . $_GET['id'];

$arr = array(
    'first_name' => $_POST['first_name'] ?? 'previous first_name',
    'last_name' => $_POST['last_name'] ?? 'previous last_name',
    'email' => $_POST['email'] ?? 'previous email',
    'avatar' => $_POST['avatar'] ?? 'previous avatar',
);
$data = http_build_query($arr);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);
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
<form method="post">
    <input type="hidden" name="_method" value="patch">
    <div class="card m-auto mt-5" style="width: 30rem; ">
        <div class="card-body ">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-3 col-form-label">First Name:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="first_name"">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Last Name:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="last_name">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="email">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Avatar:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="avatar">
                </div>
            </div>
            <button type="submit" class="btn btn-success m-auto mb-5">Update!</button>
            <p><b>Updated item has ID:</b> <?= $_GET['id'] ?></p>
            <p><b>Updated first name:</b> <?= empty($_POST['first_name']) ? 'previous first name':$data['first_name'] ?></p>
            <p><b>Updated last name:</b> <?= empty($_POST['last_name']) ? 'previous last name':$data['last_name'] ?></p>
            <p><b>Updated email:</b> <?= empty($_POST['email']) ? 'previous email':$data['email'] ?></p>
            <p><b>Image of your item:</b> <?= empty($_POST['avatar']) ? 'previous avatar':$data['avatar'] ?></p>
            <p><b>Updated time:</b> <?= empty($_POST) ? 'not updated yet':$data['updatedAt'] ?></p>
            <p><b>Response code:</b> <?= empty($_POST) ? '': $status_code ?></p>
            <a href="get_all.php" class="btn btn-primary">Go back</a>

        </div>
    </div>
</form>
</body>
</html>

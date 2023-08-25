<?php
include 'header.php';
$_SESSION['login'] = $_POST['login'] ?? 'Guest';

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
    <div class="card m-auto mt-5" style="width: 30rem; ">
        <div class="card-body ">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Login:</label>
                <div class="col-sm-7">
                    <input type="text" required class="form-control" name="login"">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Password:</label>
                <div class="col-sm-7">
                    <input type="password" required class="form-control" name="password">
                </div>
            </div>

            <div class="text-center">
                <button type="submit"  class="btn btn-success ">Log in</button>
                <a href="get_all.php" class="btn btn-primary">Go next</a>
                <a href="get_all.php" class="btn btn-primary">Continue like a guest</a>
            </div>
        </div>
    </div>
</form>
</body>
</html>

<?php
include 'header.php';
$url = "https://reqres.in/api/users";
if (empty($_POST)){
    echo "";
}
$arr = array(
        'first_name' =>$_POST['first_name']?? '',
        'last_name'=> $_POST['last_name']?? '',
        'email'=>$_POST['email']?? '',
        'avatar'=>$_POST['avatar']?? ''
    );
$data = http_build_query($arr);
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_exec($ch);
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);
$data = json_decode($response,true);

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
<form method="post" action="new_user.php">
    <div class="card m-auto mt-5" style="width: 30rem; ">
        <div class="card-body ">
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">First Name: </label>
                <div class="col-sm-7">
                    <input type="text" required class="form-control" name="first_name">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Last Name: </label>
                <div class="col-sm-7">
                    <input type="text" required class="form-control" name="last_name">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Email: </label>
                <div class="col-sm-7">
                    <input type="text" required class="form-control" name="email">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Avatar: </label>
                <div class="col-sm-7">
                    <input type="text" required class="form-control" name="avatar">
                </div>
            </div>

            <button type="submit" class="btn btn-success m-auto mb-5">Create!</button>

            <p><b>Created user has ID:</b> <?= $data['id']?></p>
            <p><b>New first name:</b> <?= $data['first_name']?></p>
            <p><b>New last name :</b> <?= $data['last_name']?></p>
            <p><b>New email :</b> <?= $data['email']?></p>
            <p><b>New avatar :</b> <?= $data['avatar']?></p>
            <p><b>Created time:</b> <?= empty($_POST) ? 'not created yet':$data['createdAt'] ?></p>
            <p><b>Response code:</b> <?= empty($_POST) ? '': $status_code ?></p>
            <a href="get_all.php" class="btn btn-primary">Go back</a>
        </div>
    </div>
</form>
</body>
</html>

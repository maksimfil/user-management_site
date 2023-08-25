<?php
include 'header.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, "https://reqres.in/api/users?page=2");
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
<div class="text-center">
    <button class="btn btn-success mt-4"><a style="color: white ;text-decoration: none"
                                            href="new_user.php">Create item</a></button>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($data); $i++): ?>
        <tr>
            <td><?= $i+1 ?></td>
            <td><?= $data['data'][$i]['email'] ?></td>
            <td><?= $data['data'][$i]['first_name'] ?></td>
            <td>
                <button type="button" class="btn btn-success mt-2 "
                ">
                <a style="color: white ;text-decoration: none"
                   href="get_user.php?id=<?= $i + 1 ?>">Get</a>

                <button type="button" class="btn btn-warning mt-2 ml-2" style="margin-left: 20px">
                    <a style="color: white ;text-decoration: none"
                       href="update_user.php?id=<?= $i + 1 ?>">Update</a>

                    <button type="button" class="btn btn-info mt-2" style="margin-left: 20px">
                        <a style="color: white ;text-decoration: none"
                           href="patch_user.php?id=<?= $i + 1 ?>">Patch</a>

                        <button type="button" class="btn btn-danger mt-2" style="margin-left: 20px">
                            <a style="color: white ;text-decoration: none"
                               href="delete_user.php?id=<?= $i + 1 ?>">Delete</a>
            </td>
        </tr>
    <?php endfor; ?>
    </tbody>
</table>
</body>
</html>
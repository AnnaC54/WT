<?php
require("start.php");
session_unset();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>
<title>Logout</title>

<body>
  

    <div class="container">
        <div class="text-center p-5">
            <img src="../images/logout.png" alt="logout" class="rounded-circle" style="width: 100px;">
        </div>
        <div class="inputWidth p-3 m-3 rounded-3 bg-white justify-content-center">
            <h1 class="h1 mb-4 mt-2 fw-normal text-center">Logged out...</h1>
            <h4 class="h4 mb-4 mt-2 fw-normal text-center">See u! uWu</h1>
            <div class="m-3 text-center">
                <a href="login.php">
                    <button class="btn btn-lg btn-primary" type="button">Log in</button></a>
            </div>
        </div>
    </div>

</body>

</html>
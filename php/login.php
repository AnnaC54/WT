<?php
require("start.php");
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
<title>Profile</title>

<body>
    <!--
        <div class="heading">
        <img src="../images/chat.png" alt="chat" style="width:100px;height:100px;" class="center">
        <h1 class="h2 pd-up-down">Please sign in</h1>
    </div>
    <div class="bg-color-white pd-up-down pd-left-right login-register-mg login-register-mg-up-down">
        <div>
            <fieldset class="fieldset-login">
                
                <div class="mg-up-down">
                    <form action=".html" method="get">
                        <label for="fname" class="login-register-label">Username</label>
                        <input type="text" placeholder="Username" class="login-register-input"><br>
                        <label for="lname" class="login-register-label">Password</label>
                        <input type="password" placeholder="Password" class="login-register-input">
                    </form>
                </div>


            </fieldset>
        </div>
    </div>
    <div class="div-btn">
        <a href="register.html">
            <button class="btn-register">Register</button>
        </a>
        <a href="friends.html">
            <button class="btn">Login</button>
        </a>
    </div> 
 
    -->
    <div class="container">
        <div class="text-center p-5">
            <img src="../images/chat.png" alt="chat" class="rounded-circle" style="width: 100px;">
        </div>
        <div class="inputWidth p-3 m-3 rounded-3 bg-white justify-content-center">
            <h1 class="h1 mb-4 mt-2 fw-normal text-center">Please sign in</h1>
                <form>
                    <div class="form-floating m-1">
                        <input type="text" class="form-control" id="username" placeholder="Username">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating m-1">
                        <input type="password" class="form-control" id="password" placeholder="Username">
                        <label for="floatingInput">Password</label>
                    </div>
                </form>
            <div class="m-3 text-center">
                <a href="register.php">
                    <button class="btn btn-lg btn-secondary">Register</button></a>
                <a href="friends.php">
                    <button class="btn btn-lg btn-primary" type="submit">Sign in</button></a>
            </div>
        </div>
    </div>


</body>

</html>
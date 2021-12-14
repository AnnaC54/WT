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
    <title>Register</title>

</head>

<body>
    <div class="heading">
        <img src="../images/user.png" alt="user" style="width:100px;height:100px;" class="center">
        <h1 class="h2 pd-up-down">Register yourself</h1>
    </div>

    <div class=" pd-up-down pd-left-right login-register-mg login-register-mg-up-down">
        <fieldset class="fieldset-login">
            <legend></legend>
            <div class="mg-up-down">
                <form id="registrationForm" name="myForm" action="friends.php" method="">
                    <div class="bg-color-white pd-outer mg-up-down register-form-inner">

                        <!-- username -->
                        <div class="username">
                            <label for="fname" class="login-register-label">Username</label>
                            <input name="fname" id="username" type="text" placeholder="Username"
                                class="login-register-input"><br>
                        </div>

                        <!-- password I -->
                        <div class="passwordOne">
                            <label for="pword" class="login-register-label">Password</label>
                            <input name="password" id="password" type="password" placeholder="Password"
                                class="login-register-input" onchange="passwordCheck()"><br>
                        </div>

                        <!-- password II -->
                        <div class="passwordTwo">
                            <label for="cpword" class="login-register-label">Confirm Password</label>
                            <input name="passwordConfirmation" id="password-rep" type="password"
                                placeholder="Confirm Password" class="login-register-input"
                                onchange="passwordCheck()"><span id='message'></span>
                        </div>
                    </div>
                    <div class="div-btn">
                        <button class="btn btn-register"><a href="login.php">Cancel</a></button>
                        <input id="submit" type="submit" class="btn btn-wide" value="Create Account"></input>
                    </div>
                </form>


            </div>
        </fieldset>
    </div>
    <script src="../js/script.js"></script>
</body>

</html>
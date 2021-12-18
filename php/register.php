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
    <div class="container">
        <div class="text-center p-5">
            <img src="../images/user.png" alt="user" class="rounded-circle" style="width: 100px;">
            <h1 class="h1 mb-4 mt-2 fw-normal text-center">Register yourself</h1>
        </div>

<!-- <<<<<<< Updated upstream:php/register.php  -->
    <div class="d-flex justify-content-center">
        <fieldset class="fieldset-login">
         <!-- <legend></legend> -->
            <div class="mg-up-down">
                <form id="registrationForm" name="myForm" action="friends.php" method="">
                    <div class="bg-color-white pd-outer mg-up-down register-form-inner">
<!-- =======  -->
        <div class="d-flex justify-content-center">
            <fieldset class="fieldset-login">
               
                <div class="mg-up-down ">
                    <form id="registrationForm" name="myForm" action="friends.html" method="" class="was-validated" style>
                        <div class="bg-color-white pd-outer mg-up-down register-form-inner">
<!-- >>>>>>> Stashed changes:html/register.html  -->

                            <!-- username -->
                            <div class="username d-flex justify-content-center">
                                <label for="fname" class="login-register-label"></label>
                                <input name="fname" id="username" type="text" placeholder="Username"
                                    class="form-control"><br>
                            </div>

                            <!-- password I -->
                            <div class="passwordOne d-flex justify-content-center">
                                <label for="pword" class="login-register-label"></label>
                                <input name="up" id="password" type="password" placeholder="Password"
                                    class="form-control" onchange="passwordCheck()"><br>
                            </div>

                            <!-- password II -->
                            <div class="passwordTwo d-flex justify-content-center">
                                <label for="cpword" class="login-register-label"></label>
                                <input name="up2" id="password-rep" type="password"
                                    placeholder="Confirm Password" class="form-control" onchange="passwordCheck()"><span
                                    id='message'></span>
                            </div>
                        </div>
<!--- <<<<<<< Updated upstream:php/register.php  -->
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-secondary"><a class="btn-link link-light" href="login.php">Cancel</a></button>
                        <input id="submit" type="submit" class="btn btn-primary" value="Create Account"></input>
                    </div>
                </form>
  <!-- =======
                      <div class="div-btn">
                            <a href="login.html">
                                <button class="btn btn-secondary">Cancel</button></a>
                            <input id="submit" type="submit" class="btn btn-primary" value="Create Account"></input>
                        </div>

                    </form>
>>>>>>> Stashed changes:html/register.html -->


                </div>
            </fieldset>
        </div>
        <script src="../js/script.js"></script>
</body>

</html>
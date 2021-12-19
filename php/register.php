<?php

use Utils\BackendService;

require("start.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Register</title>

</head>

<body>

    <?php
    // define variables and set to empty values
    $name = $password = $passwordRep =  "";
    $nameErr = $passwordErr  = "";
    $validation = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // check firstname

        if (empty($_POST["fname"])) {
            $nameErr = "Name is required";
            $validation = false;
        } else if (strlen(($_POST["fname"])) < 3) {
            $nameErr = "user name is too short";
            $validation = false;
        } else {
            $name = test_input($_POST["fname"]);
            echo "Username: " . $name . "<br>";
        }

        // check password

        if (empty($_POST["password"]) || empty($_POST["passwordCheck"])) {
            $passwordErr = "Password is required";
            $validation = false;
        } else if (strlen(($_POST["password"])) < 8 || strlen(($_POST["passwordCheck"])) < 8) {
            $passwordErr = "Password is too short";
            $validation = false;
        } else if (($_POST["password"]) != ($_POST["passwordCheck"])) {
            $passwordErr = "Passwords do not match";
            $validation = false;
        } else {
            $password = test_input($_POST["password"]);
            $passwordCheck = test_input($_POST["passwordCheck"]);
        }

        var_dump($validation);

        // if validation was successfull => call register method

        if ($validation) {
            $username = ($_POST["fname"]);
            $password = ($_POST["password"]);

            if ($service->register($username, $password)) {
                $_SESSION["user"] = $username;
                var_dump($_SESSION["user"]);
                header("Location: friends.php");

                exit();
            } else {
                echo "Validation wrong";
            }
        }
    }

    // obvious not necessary 

    function test_input($data)
    {
        $data = trim($data); // The trim() function removes whitespace and other predefined characters from both sides of a string.
        $data = stripslashes($data); //The stripslashes() function removes backslashes added by the addslashes() function.
        $data = htmlspecialchars($data); //The htmlspecialchars() function converts some predefined characters to HTML entities.
        return $data;
    }
    ?>

    <div class="container">

        <!-- image section -->
        <section class="text-center p-5">
            <img src="../images/user.png" alt="user" class="rounded-circle" style="width: 100px;">
            <h1 class="h1 mb-4 mt-2 fw-normal text-center">Register yourself</h1>
        </section>

        <!-- form section -->
        <section class="col-lg-6 offset-lg-3 justify-content-center">
            <form id="registrationForm" name="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <!-- username -->

                <div class="mb-2 d-flex justify-content-center">
                    <label for="fname"></label>
                    <input name="fname" id="fname" type="text" placeholder="Username" class="form-control" "><br>
                    <span><?php echo $nameErr;
                            ?></span>
                </div>

                <!-- password I -->

                <div class=" mb-2 d-flex justify-content-center">
                    <label for="pword"></label>
                    <input name="password" id="password" type="password" placeholder="Password" class="form-control"><br>
                    <span><?php echo $passwordErr;
                            ?></span>
                </div>

                <!-- password II -->

                <div class="mb-2 passwordTwo d-flex justify-content-center">
                    <label for="cpword" class="login-register-label"></label>
                    <input name="passwordCheck" id="password-rep" type="password" placeholder="Confirm Password" class="form-control"><span id='message'></span>
                    <span><?php echo $passwordErr;
                            ?></span>
                </div>

                <!-- submit section -->

                <div class="btn-group d-flex">
                    <a href="#login.php"> <button class="btn btn-secondary">Go to Login</button></a>
                    <button type="submit" id="submit" class="ml-3 btn btn-primary">Create account</button>
                    <!--href="login.php"-->
                </div>
            </form>
        </section>
    </div>

    <!--  <script src="../js/script.js"></script>-->
    <script>
        window.collectionId = "<?= CHAT_SERVER_ID ?>";
        window.chatServer = "<?= CHAT_SERVER_URL ?>";
    </script>
</body>

</html>
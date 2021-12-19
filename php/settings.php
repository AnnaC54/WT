<?php
require("start.php");

use Utils\BackendService;
//User is supposed to be fetched by register
//Test User for testing
$_SESSION["user"] = new Model\User("SomeUser");
//$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);


if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
    ($service->loadUser($testuser));

    if (
        isset($_POST["firstname"]) && isset($_POST["lastname"])
        && isset($_POST["textfield"]) && isset($_POST["radio"]) && isset($_POST["drink"])
    ) {

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $textfield = $_POST["textfield"];
        $radio = $_POST["radio"];
        $drink = $_POST["drink"];
        $_SESSION["user"]->setFirstname($firstname);
        $_SESSION["user"]->setLastname($lastname);
        if ($drink == "1") {
            $_SESSION["user"]->setDrink("Coffee");
        } else {
            $_SESSION["user"]->setDrink("Tea");
        }
        $_SESSION["user"]->setTextfield($textfield);
        $_SESSION["user"]->setRadio($radio);
        //Testing:
        //Model\User::fromJson($_SESSION["user2"]);

        //$service->saveUser();
        //var_dump($service->saveUser($_SESSION["user"]->getUsername()));
    }
} else {
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Settings</title>
</head>

<body>
    <div class="container justify-content-center ">

        <form class=" offset-2 col-8 mb-5" method="post">
            <h2>Profile Settings</h2>

            <h4>Base Data</h4>
            <div class="mb-3 form-floating">
                <input aria-label="First name" name="firstname" placeholder="First Name" type="name" class="form-control" id="firstname" aria-describedby="firstname" value="<?php echo (\Model\User::fromJson($_SESSION["user"])->getFirstname())?>">
                <label for="firstname">First Name</label>

            </div>
            <div class="mb-3 form-floating">
                <input aria-label="Last name" name="lastname" placeholder="Last name" type="name" class="form-control" id="lastname" aria-describedby="lastname" value="<?php echo (\Model\User::fromJson($_SESSION["user"])->getLastname())?>">
                <label for="lastname">Last Name</label>

            </div>

            <div class=" my-4 form-floating">
                <select name="drink" class="form-select" id="floatingSelectGrid coffeetea" aria-label="Floating label select example">
                    <option value="" disabled selected hidden>Choose your favourite drink </option>
                    <option value="1">Coffee</option>
                    <option value="2">Tea</option>
                </select>
                <label for="floatingSelectGrid">Coffee or Tea</label>
            </div>

            <h4>Tell Something About You</h4>

            <div class=" mb-4 form-floating">
                <textarea name="textfield" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Short Description</label>
            </div>

            <h4>Prefered Chat Layout</h4>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio" id="flexRadioDefault1" value="oneline">
                <label class="form-check-label" for="flexRadioDefault1">
                    Username and message in one line
                </label>
            </div>
            <div class=" mb-4 form-check">
                <input class="form-check-input" type="radio" name="radio" id="flexRadioDefault2" value="seplines" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Username and message in separated lines
                </label>
            </div>

            <div class="row justify-content-center">
                <button class=" col-5 btn btn-lg btn-secondary mx-1 "><a class="btn-link" href="friends.php">Cancel</a></button>
                <button class=" col-6 btn btn-lg btn-primary ms-4" type="submit"><a class="btn-link" href="#">Save</a></button>
            </div>
        </form>
    </div>


</body>

</html>
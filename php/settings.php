<?php
require("start.php");

use Utils\BackendService;
//User is supposed to be fetched by register
//Test User for testing

//$_SESSION["user"] = $service->loadUser($testuser);

//$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
//var_dump($someuser->getFirstname());

//Initialize Session variable
//$_SESSION["user"]="sonja";
//var_dump(new Model\User($_SESSION["user"]));


$sessionuser = $_SESSION["user"];

if (isset($sessionuser) && !empty($sessionuser)) {
    $user = $service->loadUser($sessionuser);
    var_dump($user);

    if (
        isset($_POST["save"])
    ) {
        //$service->loadUser($sessionuser);
        echo $_POST["firstname"];
        echo "<hr>";
        $user->setFirstname($_POST['firstname']);
        echo $user->getFirstname();
        $user->setLastname($_POST["lastname"]);
        $user->setTextfield($_POST["textfield"]);
        $user->setRadio($_POST["radio"]);
        $user->setDrink($_POST["drink"]);

        $service->saveUser($user);
        //header("Location: settings.php"); //Load settings again to test if load user updates
        header("Location: profile.php");
        //end();
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
                <input aria-label="First name" name="firstname" placeholder="First Name" type="name" class="form-control" id="firstname" aria-describedby="firstname" value="<?php echo $user->getFirstname() ?>">
                <label for="firstname">First Name</label>

            </div>
            <div class="mb-3 form-floating">
                <input aria-label="Last name" name="lastname" placeholder="Last name" type="name" class="form-control" id="lastname" aria-describedby="lastname" value="<?php echo $user->getLastname() ?>">
                <label for="lastname">Last Name</label>

            </div>

            <div class=" my-4 form-floating">
                <select name="drink" class="form-select" id="floatingSelectGrid coffeetea" aria-label="Floating label select example">
                    <option value=disabled selected hidden>Choose your favourite drink </option>
                    <option value="1" <?= ($user->getDrink() == 1) ? "selected" : "" ?>>Coffee</option>
                    <option value="2" <?= ($user->getDrink() == 2) ? "selected" : "" ?>>Tea</option>

                </select>
                <label for="floatingSelectGrid">Coffee or Tea</label>
            </div>

            <h4>Tell Something About You</h4>

            <div class=" mb-4 form-floating">
                <textarea name="textfield" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" ><?php echo $user->getTextfield() ?></textarea>
                <label for="floatingTextarea2">Short Description</label>
            </div>

            <h4>Prefered Chat Layout</h4>

            <div class="form-check">
                <input <?= ($user->getRadio() == "oneline") ? "checked" : "" ?> class="form-check-input" type="radio" name="radio" id="flexRadioDefault1" value="oneline">
                <label class="form-check-label" for="flexRadioDefault1">
                    Username and message in one line
                </label>
            </div>
            <div class=" mb-4 form-check">
                <input <?= ($user->getRadio() == "seplines") ? "checked" : "" ?> class="form-check-input" type="radio" name="radio" id="flexRadioDefault2" value="seplines">
                <label class="form-check-label" for="flexRadioDefault2">
                    Username and message in separated lines
                </label>
            </div>

            <div class="row justify-content-center">
                <input name="cancel" class=" col-5 btn btn-lg btn-secondary mx-1 " value="Cancel">
                <input name="save" class=" col-6 btn btn-lg btn-primary ms-4" type="submit" value="Save">
            </div>
        </form>
    </div>


</body>

</html>
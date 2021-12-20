<?php
require("start.php");
// $testuser = new Model\User("testuser");
// $testuser = ($service->loadUser("testuser"));
// $testuser->setFirstname("Anna");
// $testuser->setLastname("Preiwisch");
// $testuser->setRadio("oneline");
// $testuser->setTextfield("lorem  ipsum");
// $testuser->setDrink("Coffee");

//var_dump($testuser);

if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
    //var_dump($testuser);
    //get User from Query Chat
    //$user = $service->loadUser($_GET["user"]);
    //------------------------------------------------------
    //Get username from Query Parameter
    //Actualm method to use in the end
    //$user = $service->loadUser($_GET["person"]);
    //------------------------------------------------------

    //TEST
    $user = $service->loadUser($_SESSION["user"]);

    if (isset($user) && !empty($user)) {
        if (isset($_POST["back"])) {
            header("Location: chat.php");
            //end();
        }
        if (isset($_POST["remove"])) {
            $service->friendRemove($user);
            header("Location: friends.php");
            //end();
        }
    } else {
        header("Location: friends.php");
        //end();
    }
} else {
    header('Location: login.php');
    //end();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>

<body>

    <br><br><br>
    <div class="container justify-content-center">
        <div class="offset-2 col-8 mb-5">
            <h2>Profile of <?php echo $user->getFirstname() ?></h2>
            <hr>
            <form method="post">
                <header class="btn-group">
                    <!-- <div class="d-flex justify-content-center"> -->

                    <input class="btn btn-secondary" name="back" type="submit" value="Back to Chat">
                    <input class="btn btn-secondary" name="remove" data-bs-toggle="modal" data-bs-target="#exampleModal" id="button-addon2 sendbutton" name="remove" value="Remove Friend">
            </form>
        </div>

    </div>

    </header>

    <div class="row align-items-start">
        <div class=" col-2 ">
            <div class="d-flex justify-content-center">
                <img src="../images/profile.png" alt="profile" class="rounded-circle justify-content-center" style="width: 100px;">
            </div>
            <div class="text-center">
                <p class="coffee">
                <h4>Coffee or Tea?</h4>
                <?php
                if ($user->getDrink() == 1) {
                    echo "Coffee";
                } else if ($user->getDrink() == 2) {
                    echo "Tea";
                }
                ?>
                </p>
                <p class="name">
                <h4>Name</h4>
                <?php
                echo $user->getFirstname();
                echo " ";
                echo $user->getLastname();
                ?>
                </p>
            </div>
        </div>

        <div class="col-8 ">
            <hr>
            <p class="para-one"> <?php echo $user->getTextfield()
                                    ?>
            </p>
        </div>

    </div>


    <!-- Modal section -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Remove Friend</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you really want to end your friendship?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button onclick="send()" type="button" class="btn btn-primary"><a class="btn-link  link-light" href="friends.php">Jup, skip em </a></button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
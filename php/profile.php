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
    //Actual method to use in the end
    $user = $service->loadUser($_GET["person"]);
   
    //  echo "<hr>";
    //  var_dump($service->loadUser($_GET["person"]));
    //------------------------------------------------------

    //TEST
    //$user = $service->loadUser($_SESSION["user"]);

    if (isset($user) && !empty($user)) {
        if (isset($_POST["back"])) {
            header("Location: chat.php");
            //end();
        }
        if (isset($_POST["remove"])) {
            //$service->friendRemove($user);

            header("Location: friends.php");
            exit();
        }
    } else {
        header("Location: friends.php");
        exit();
    }
} else {
    header('Location: login.php');
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
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>

<body>

    <br><br><br>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-2 d-flex justify-content-center">
                <img src="../images/profile.png" alt="profile" class="rounded-circle justify-content-center pd-" style="width: 115px; height: 115px;">
            </div>
            <div class="col-8 mb-5 offset-1">
                <h2>Profile of <?php echo htmlspecialchars($_GET["person"]) ?></h2>
                <hr>
                <form method="post">
                    <header class="btn-group">
                        <!-- <div class="d-flex justify-content-center"> -->

                        <input class="btn btn-secondary" name="back" type="submit" value="Back to Chat">
                        <input type="submit" class="btn btn-secondary" name="remove" data-bs-toggle="modal" data-bs-target="#exampleModal" id="button-addon2 sendbutton" name="remove" value="Remove Friend">
                </form>
            </div>
        </div>
    </div>


    <div class="container  d-flex justify-content-center ">
        <div class=" row border bg-light">
            <div class=" col-2 d-flex pe-5 ">

                <div class="text-center >
                    <p class=" coffee">
                    <h4>Coffee or Tea?</h4>
                    <?php
                    if ($user->getDrink() == 1) {
                        echo "Coffee";
                    } else if ($user->getDrink() == 2) {
                        echo "Tea";
                    } else{
                        echo "Neither";
                    }
                    ?>
                    </p>
                    <p class="name">
                    <h4>Name</h4>
                    <?php
                    if(!empty($user->getFirstname())){
                    echo $user->getFirstname();
                } else{
                    echo "No first name";
                }
                if(!empty($user->getLastname())){
                    echo " ";
                    echo $user->getLastname();
                } else{
                    echo "<br>";
                    echo "No last name";
                }
               
                    ?>
                    </p>
                </div>
            </div>

            <div class="col-8  mb-5 offset-1">
                <br>
                <h6> <?php  if(!empty( $user->getTextfield())){
                echo $user->getTextfield();
                } else{
                    echo "No text input given.";
                }
                        ?>
                </h6>
            </div>

        </div>
    </div>

    <!-- Modal section -->

    <div class="modal fade" id="cancelFriendshipModalProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-primary" id="cancelFriendshipProfile">Jup, skip em </button>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    document.getElementById("cancelFriendshipProfile").onclick = function() {

        const newPostForm = document.createElement("form");
        newPostForm.method = "post";
        newPostForm.action = "friends.php";
        // newPostForm.name = "myform";

        // create hidden Input Fields -> give friends.php

        const hiddenInput = document.createElement("input");
        const friendName = document.createElement("input");

        hiddenInput.type = "hidden";
        hiddenInput.name = "remove";
        hiddenInput.value = "skipfriend";

        friendName.type = "hidden";
        friendName.name = "friend";
        friendName.value = "<?= $friendname ?>";

        newPostForm.appendChild(hiddenInput);
        newPostForm.appendChild(friendName);

        document.getElementById("cancelFriendshipModalProfile").appendChild(newPostForm);
        newPostForm.submit(); // -> submit() method is provided by object , see -> https://www.javascript-coder.com/javascript-form/javascript-form-submit/
    };
</script>

</html>
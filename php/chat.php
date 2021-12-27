<?php
require("start.php");
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
    <title>Chat</title>
</head>

<body>

    <?php

    $friendname = $_GET["person"];
    //echo $friendname;
    $_SESSION["friend"] = $friendname;


    // COULDN`T MAKE THE PHP WORK :( 
    /* if(array_key_exists('button1', $_POST)) {
        button1();
    }

      
    function button1() {
        $message = $_POST["message"];
        //var_dump($message);
        $service->sendMessage($message, $_SESSION["friend"]);
   
        echo "This is Button1 that is selected";
    }*/



    if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {

        // chat-goal set 
        if (isset($_SESSION["friend"]) && !empty($_SESSION["friend"])) {
            $messageList = $service->listMessages($_SESSION["friend"]);
        } else {
            header("Location: friends.php");
            exit();
        }
    }

    // if user is not authentificated
    else {
        header("Location: login.php");
        exit();
    }
    ?>

    <div class="container col-10 offset-2 ">
        <header class="row ">
            <h2 class="offset-1">Chat with <?php echo $_SESSION["friend"] ?></h2>
            <div class="row mt-4 offset-1 ">
                <button type="submit" class=" me-3 col-1 btn btn-secondary"><a class="btn-link" href="friends.php">
                        Back</a></button>
                <form class="col-6" action="profile.php" method="get">
                    <button name="person" type="submit" class=" me-3 col-2 btn btn-secondary"><a class="btn-link" href="profile.php?person=<?= $_SESSION["friend"] ?>">
                            Show Profil</a></button>
                    <button name="removeFriend" class="me-3 col-2 btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="openModal('<?= $_SESSION["friend"] ?>')">Remove Friend</button>
                </form>
            </div>
        </header>

        <!-- Messages in chat (js) -->
        <h6 class="container mt-5 col-9 offset-1">JavaScript Version</h6>
        <div class="container overflow-scroll col-9 offset-1 my-5 bg-white px-5 " style="height: 300px" id="chat">
        </div>

        <!-- Messages in chat (php) -->
        <h6 class="mt-6 col-9 offset-1">PHP Version - not completely working :(</h6>

        <div class="container overflow-scroll col-9 offset-1 my-5 bg-white px-5 " style="height: 300px" id="chatMessages">

            <div class="row ">
                <div class="col-2">
                    <?php

                    foreach ($messageList as $value) {
                        $newVal = (array)$value;
                        echo $newVal["from"];
                        echo "<br>" . "<br>";
                    };
                    ?>

                </div>
                <div class="col-7">
                    <?php
                    foreach ($messageList as $value) {
                        $newVal = (array)$value;
                        echo $newVal["msg"];
                        echo "<br>" . "<br>";
                    };
                    ?>

                </div>
                <div class="col-3 text-right">
                    <?php
                    foreach ($messageList as $value) {
                        $newVal = (array)$value;
                        echo $newVal["time"];
                        echo "<br>" . "<br>";
                    };
                    ?></div>

            </div>


        </div>


        <section class="row input-group mt-4 offset-1">
            <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">-->
            <input name="message" class="col-8" id="message" type="text" class="form-control" placeholder="New message" aria-label="New message" aria-describedby="button-addon2">
            <button onclick="send()" name="sendButton" id="sendButton" type="input" class="col-1 btn btn-primary"><a class="btn-link">Send</a></button>
            <!--  <button id="sendButton" type="button" name="button1"  class="col-1 btn btn-primary"><a class="btn-link">Send</a></button>-->
            <!-- </form>-->
        </section>
    </div>

    <!-- Modal section -->

    <div class="modal fade" id="cancelFriendshipModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelFriendshipLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you really want to end your friendship?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="cancelFriendship">Jup, skip em.</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/chatscript.js"></script>
    <script>
        //on click -> open bootstrap modal
        var removeFriendModal = new bootstrap.Modal(document.getElementById("cancelFriendshipModal"));

        function openModal($friendname) {
            removeFriendModal.show();
            document.getElementById("cancelFriendshipLabel").innerHTML = "Remove <?= $friendname ?> as Friend";

            // -> Jup, skip em: -> create Form with two hidden input fields to give name="action"+value="remove-friend" PLUS name="friendName"+value=§friendname to friends.php

            //Shiny nice Lösung
            //document.location.href = „sometarget.php?username=…“

            document.getElementById("cancelFriendship").onclick = function() {

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

                document.getElementById("cancelFriendshipModal").appendChild(newPostForm);
                newPostForm.submit(); // -> submit() method is provided by object , see -> https://www.javascript-coder.com/javascript-form/javascript-form-submit/
            };
        }

        window.chatToken = "<?= $_SESSION['chat-token'] ?>";
        window.chatCollectionId = "<?= CHAT_SERVER_ID ?>";
        window.chatServer = "<?= CHAT_SERVER_URL ?>";
        window.chatGoal = "<?= $_SESSION['friend']; ?>";
    </script>


</html>
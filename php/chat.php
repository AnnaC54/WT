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

    <!-- Beginnen Sie mit einem PHP-Block am Anfang der Datei, welcher die Datei start.php lädt und
prüfen Sie ob die Session-Variable user gesetzt und nicht leer ist. Anschließend prüfen Sie ob
der Query-Parameter für das Chat-Ziel (z.B. friend) existiert und nicht leer ist. Stimmen Sie
dies mit der Implementierung der Freundesliste ab.
Abschließend müssen Sie über Ihre PHP-Implementierung den Server, die Collection ID und
insbesondere das aktuelle Token sowie das Chat-Ziel an die Client-Anwendung übergeben.
Gehen Sie hier analog zum abschließenden Schritt in der Freundesliste vor. -->

    <?php
    $friendname = $_GET["person"];

    if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {

    // chat-goal ? 

        if (isset($friendname) && !empty($friendname)) {
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

    <div class="container">
        <header class="row ">
            <h2 class="offset-1">Chat with <?php echo $friendname ?></h2>
            <div class="row mt-4 offset-1 ">
                <form action="profile.php" method="get">
                    <button name="goBack" type="submit" class=" me-3 col-2 btn btn-secondary "><a class="btn-link" href="friends.php">
                            &#60; Back</a></button>
                    <button name="showProfile" type="submit" class=" me-3 col-2 btn btn-secondary"><a class="btn-link" href="profile.php?person=<?= $friendname ?>">
                            Show Profil</a></button>
                    <button name="removeFriend" class="me-3 col-2 btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="openModal('<?= $friendname?>')">Remove Friend</button>
                </form>
            </div>
        </header>

        <!-- Messages in chat-->

        <div class="container overflow-scroll col-9 offset-1 my-5 bg-white pt-2 " style="height: 300px" id="chat"></div>

        <section class="row input-group mt-4 offset-1">
            <input class="col-8" id="message" type="text" class="form-control" placeholder="New message" aria-label="New message" aria-describedby="button-addon2">
            <button onclick="send()" id="sendbutton" type="button" class="col-1 btn btn-primary"><a class="btn-link">Send</a></button>
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

    <script>

        //on click -> open bootstrap modal
        var removeFriendModal = new bootstrap.Modal(document.getElementById("cancelFriendshipModal"));

        function openModal($friendname) {
            removeFriendModal.show();
            document.getElementById("cancelFriendshipLabel").innerHTML = "Remove <?= $friendname?> as Friend";

            // -> Jup, skip em: -> create Form with two hidden input fields to give name="action"+value="remove-friend" PLUS name="friendName"+value=§friendname to friends.php

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

        // where do i use them?

       
    </script>


    <script src="../js/chatscript.js"></script>
</body>

</html>
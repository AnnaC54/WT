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
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <title>Chat</title>
</head>

<body>
    <div class="container">
        <header class="row ">
            <h2 class="offset-1">Chat with Tom</h2>
            <div class="row mt-4 offset-1 ">
                <button type="button" class=" me-3 col-2 btn btn-secondary "><a class="btn-link" href="friends.php">
                        &#60; Back</a></button>
                <button type="button" class=" me-3 col-2 btn btn-secondary"><a class="btn-link" href="profile.php">
                        Show Profil</a></button>
                <button class="me-3 col-2 btn btn-danger" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModal" id="button-addon2 sendbutton">Remove Friend</button>

            </div>
        </header>

        <div class=" col-9  offset-1 my-5 chat-background" id="chat"> </div>

        <section class="row input-group mt-4 offset-1">
            <input class="col-8" id="message" type="text" class="form-control" placeholder="New message"
                aria-label="New message" aria-describedby="button-addon2">
            <button onclick="send()" id="sendbutton" type="button" class="col-1 btn btn-primary"><a class="btn-link"
                    href="friends.php">Send</a></button>
        </section>
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
                    <button onclick="send()" type="button" class="btn btn-primary"><a class="btn-link"
                            href="friends.php">Jup ,skip em </a></button>
                </div>
            </div>
        </div>
    </div>


    <script src="../js/chatscript.js"></script>
</body>

</html>

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
    $_SESSION["friend"] = $friendname;
   


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
            // if user authetificated and chat-goal is known -> load messages via BackendService
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

    <div class="container">
        <header class="row ">
            <h2 class="offset-1">Chat with <?php echo $_SESSION["friend"] ?></h2>
            <div class="row mt-4 offset-1 ">
                <form action="profile.php" method="get">
                    <button name="goBack" type="submit" class=" me-3 col-2 btn btn-secondary "><a class="btn-link" href="friends.php">
                            &#60; Back</a></button>
                    <button name="showProfile" type="submit" class=" me-3 col-2 btn btn-secondary"><a class="btn-link" href="profile.php?person=<?= $friendname ?>">
                            Show Profil</a></button>
                    <button name="removeFriend" class="me-3 col-2 btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="openModal('<?= $friendname ?>')">Remove Friend</button>
                </form>
            </div>
        </header>

        <!-- Messages in chat (js) -->
        <h6 class="container mt-5">JavaScript Version</h6>
        <div class="container overflow-scroll col-9 offset-1 my-5 bg-white pt-2 " style="height: 300px" id="chat">
        </div>
        <h6 class="mt-6">PHP Version</h6>
        <div class="container overflow-scroll col-9 offset-1 my-5 bg-white pt-2 " style="height: 300px" id="chatMessages">

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
                <div class="col-6">
                    <?php
                    foreach ($messageList as $value) {
                        $newVal = (array)$value;
                        echo $newVal["msg"];
                        echo "<br>" . "<br>";
                    };
                    ?>

                </div>
                <div class="col-4 text-right">
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




        var chatToken = "<?= $_SESSION['chat-token']; ?>";
        var chatCollectionId = "<?= CHAT_SERVER_ID; ?>";
        var chatServer = "<?= CHAT_SERVER_URL; ?>";
        var chatGoal = "<?= $_SESSION['friend']; ?>";

        window.setInterval(function() {
            getMessages();
        }, 1000);


        function getMessages() {


            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    let data = JSON.parse(xmlhttp.responseText);
                    var chat = document.getElementById("chat");
                    chat.innerHTML = "";

                    for (var i = 0; i < data.length; i++) {
                        var date = new Date(data[i].time);
                        var messagebox = document.createElement("div");
                        messagebox.classList.add("row");
                        var namebox = document.createElement("div");
                        var textbox = document.createElement("div");
                        var timebox = document.createElement("div");
                        namebox.classList.add("col-2");
                        textbox.classList.add("col-7");
                        timebox.classList.add("col-3");
                        timebox.classList.add("text-right");
                        //messagebox.classList.add("messagebox");
                        //textbox.appendChild(namebox);
                        messagebox.appendChild(namebox);
                        messagebox.appendChild(textbox);
                        messagebox.appendChild(timebox);
                        namebox.appendChild(document.createTextNode(data[i].from));
                        textbox.appendChild(document.createTextNode(data[i].msg));
                        timebox.appendChild(document.createTextNode(date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()));
                        chat.appendChild(messagebox);
                        //var userbox = document.createElement("span");

                    }
                }
            };

            xmlhttp.open("GET", chatServer + "/" + chatCollectionId + "/message/" + chatGoal, true);
            xmlhttp.setRequestHeader('Authorization', 'Bearer ' + chatToken);
            xmlhttp.send();
        }

        function send() {
            let xmlhttp1 = new XMLHttpRequest();
            xmlhttp1.onreadystatechange = function() {
                if (xmlhttp1.readyState == 4 && xmlhttp1.status == 204) {
                    console.log("done...");
                }
            };
            xmlhttp1.open("POST", chatServer + "/" + chatCollectionId + "/message", true);
            xmlhttp1.setRequestHeader('Content-type', 'application/json');
            // Add token, e. g., from Tom
            xmlhttp1.setRequestHeader('Authorization', 'Bearer ' + chatToken);
            // Create request data with message and receiver
            let message = document.getElementById('message').value; 
            console.log(message);
            let data = {
                message: message,
                to: chatGoal
            };

            document.getElementById('message').value = "";
            let jsonString = JSON.stringify(data); // Serialize as JSON
            xmlhttp1.send(jsonString); // Send JSON-data to server

        }






    </script>


</html>
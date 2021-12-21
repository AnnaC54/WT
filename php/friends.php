<?php
require("start.php");
if (empty($_SESSION["user"])) {   //if session user not set --> back to login
    header("Location: login.php");
}


// Send Friend-Request
if (isset($_POST["action"]) == "add-friend" && $_POST["friend"] != "") {
    $newFriend = new \Model\Friend($_POST["friend"]);
    var_dumP($service->friendRequest($newFriend));
}

// If user wants to end friendship in chat vieew 
if (isset($_POST["remove"]) == "skipfriend" && $_POST["friend"] != "") {
    $toBeRemovedFriend = new \Model\Friend($_POST["friend"]);
    $service->friendRemove($toBeRemovedFriend);
}

//Behavious for Friendship-Acception
if (isset($_POST["action"]) == "accept_request" && $_POST["friendName"] != "") {
    $acceptedFriend = new \Model\Friend($_POST["friendName"]);
    $service->friendAccept($acceptedFriend);
    echo ("HEY!");
}
//Behavious for Friendship-Dismission
if (isset($_POST["action"]) == "dismiss_request" && $_POST["friendName"] != "") {
    $canceledFriend = new \Model\Friend($_POST["friendName"]);
    $service->friendDismiss($canceledFriend);
}


$friendsacceptarray = array();
$friendsrequestarray = array();
$friendsarray = $service->loadFriends();
foreach ($friendsarray as $key => $value) {
    if ($value->getStatus() === "accepted") {
        $friendsacceptarray[$key] = $value;
    } else if ($value->getStatus() === "requested") {
        $friendsrequestarray[$key] = $value;
    }
    if ($friendsacceptarray !== null) {
        $friendsacceptarray = array_values($friendsacceptarray);
    }
    if ($friendsrequestarray !== null) {
        $friendsrequestarray = array_values($friendsrequestarray);
    }
    /* else{ 
$friendAntolin = new Model\Friend("Sonja");

$service->friendRequest($friendAnt); 
$friendAnt = new Model\Friend("Son");
var_dump($service->friendRequest($friendAnt));
$friendsarray = $service->loadFriends();
var_dump($friendsarray); */
    //
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .no-border {
            border: 0;
            box-shadow: none;
        }
    </style>

</head>
<title>Friends</title>

<body>

    <script src="../js/scriptFriends.js"></script>

    <div class="container justify-content-center">
        <div class="offset-2 col-8 mb-5">
            <h2>Friends</h2>
            <hr>
            <div class="btn-group">
                <a href="logout.php" class="btn btn-secondary">Logout</a>
                <a href="settings.php" class="btn btn-secondary">Edit Profile</a>
            </div>
            <hr>

            <!-- friend list-->

            <ul class="list-group">
                <form action="chat.php" method="get">
                    <?php
                    if ($friendsacceptarray === null) { ?>
                        <li class="list-group-item"> You have no friends :( </li> <?php } else {
                                                                                    foreach ($friendsacceptarray as $key => $value) {      //iterate through return of loadfriends   probably bug if only requested friends but not empty

                                                                                    ?>
                            <li class="list-group-item">
                                <input class="bg-white no-border" type="submit" name="person" value="<?= $value->getUsername() ?>"></input>
                            </li> <!-- query -->
                    <?php }
                                                                                } ?>
                </form>
            </ul>

            <!-- old chat dummies
                
            
            <li class="list-group-item d-flex align-items-center">
                        <a  href="chat.php">Tom</a>
                         <span class="badge bg-primary rounded-pill">0</span> 
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="chat.php">Marvin</a>
                        <span class="badge bg-primary rounded-pill">1</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <a  href="chat.php">Tick</a>
                         <span class="badge bg-primary rounded-pill">1</span> 
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <a  href="chat.php">Trick</a>
                         <span class="badge bg-primary rounded-pill">1</span> 
                    </li> -->

            <hr>

            <div class="modalfade" id="friendRequest" data-bs-toggle="modal" data-bs-target="#exampleModal">

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Friend request from <span id="name-span">Tom</span></div>
                        Do you wanna be his/her friend?
                    </div>
                    <span class="badge bg-primary rounded-pill">Do u?</span>
                </li>

            </div>
            <hr>


            <!-- add form (missing functions) -->

            <form id="add" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="friend" list="friendsList" id="friendsAdd" placeholder="Add to friend list" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <datalist id="friendsList"></datalist>
                    <button class="btn btn-primary" type="submit" id="friendsAddSubmit" name="action" value="add-friend">Button</button> <!-- onclick add friend php   -->
                </div>
            </form>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFriendRequestHeader"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do u wanne be his/her friend now?
                        </div>
                        <div class="modal-footer">
                            <button id="dismiss_friendship_button" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>
                            <button id="accept_friendship_button" type="button" class="btn btn-primary">Accept</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- requested list-->

            <ul class="list-group">

                <?php
                if ($friendsrequestarray == null || count($friendsrequestarray) == 0) {
                } else {
                    foreach ($friendsrequestarray as $key => $value) {     //iterate through return of loadfriends  
                        // or do nothing instead of exit?
                        //when accepted???! cant dismiss or accept 
                ?>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <!--<input type=submit> -->
                                <button type="button" onclick="openModal('<?php echo $value->getUsername() ?>')">Friend request from <?php echo $value->getUsername() ?>
                            </div>
                            Do you wanna be his/her friend?

        </div>

        </li> <!-- query -->
<?php }
                } ?>














    </div>

    </div>
    <script>
'var name = <?php echo json_encode($name); ?>;
</script>'
    <script>
        var myModal = new bootstrap.Modal(document.getElementById("exampleModal"));
        
        
        function openModal(name) {
            
            myModal.show();
        document.getElementById("modalFriendRequestHeader").innerHTML = "Friend request";
        document.getElementById("accept_friendship_button").onclick = function() {
          const form = document.createElement('form');
            form.method = "post";
            form.action = "./friends.php";
            const hiddenActionField = document.createElement('input');
            hiddenActionField.type = 'hidden';
            hiddenActionField.name = "action";
            hiddenActionField.value = "accept_request";
            form.appendChild(hiddenActionField);
            const hiddenNameField = document.createElement('input');
            hiddenNameField.type = 'hidden';
            hiddenNameField.name = "friendName";
            hiddenNameField.value = name;
            form.appendChild(hiddenNameField);
            document.getElementById("exampleModal").appendChild(form);
            form.submit();
          };
        document.getElementById("dismiss_friendship_button").onclick = function() {
          const form = document.createElement('form');
            form.method = "post";
            form.action = "./friends.php";
            const hiddenActionField = document.createElement('input');
            hiddenActionField.type = 'hidden';
            hiddenActionField.name = "action";
            hiddenActionField.value = "dismiss_request";
            form.appendChild(hiddenActionField);
            const hiddenNameField = document.createElement('input');
            hiddenNameField.type = 'hidden';
            hiddenNameField.name = "friendName";
            hiddenNameField.value = name;
            form.appendChild(hiddenNameField);
            document.getElementById("exampleModal").appendChild(form);
            form.submit();
          };
      }
      function closeModal(){
        myModal.show();
      }
      function dismiss(){
        myModal.hide();
      }
      function accept(){
        myModal.hide();
      }
</script>
</body>

</html>
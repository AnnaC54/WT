<?php
require("start.php");
/* if(empty($_SESSION["user"])){   //if session user not set --> back to login
    header("Location: login.php");
}
else{ */
    $friendsarray = $service->loadFriends();
//}
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
            <ul class="list-group">
                <?php
                foreach($friendsarray as $key => $value){      //iterate through return of loadfriends
                ?>  
                <li  class="list-group-item d-flex justify-content-between align-items-center">
                <a class="text-decoration-none" href="chat.php"> <?php if($value !== null){        //create new list element if friend not null and print out username?? missing only status accepted
                   echo $value->getUsername(); } }?>



                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a class="text-decoration-none" href="chat.php">Tom</a>
                    <!-- <span class="badge bg-primary rounded-pill">0</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a class="text-decoration-none" href="chat.php">Marvin</a>
                    <span class="badge bg-primary rounded-pill">1</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a class="text-decoration-none" href="chat.php">Tick</a>
                    <!-- <span class="badge bg-primary rounded-pill">1</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a class="text-decoration-none" href="chat.php">Trick</a>
                    <!-- <span class="badge bg-primary rounded-pill">1</span> -->
                </li>
            </ul>
            <hr>
            <ul class="list-group list-group-numbered">
                <a class="text-decoration-none" href="chat.php" id="friendRequest" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Friend request from <span id="name-span">Tom</span></div>
                            Do you wanna be his/her friend?
                        </div>
                        <span class="badge bg-primary rounded-pill">Do u?</span>
                    </li>
                </a>
            </ul>
            <hr>

            <form id="add" action>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="friend" list="friendsList" id="friendsAdd" placeholder="Add to friend list" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <datalist id="friendsList"></datalist>
                    <a href="friends.html"><button class="btn btn-primary" type="submit">Button</button></a>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>
                            <button type="button" class="btn btn-primary">Accept</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>

    <script src="../js/scriptFriendsModal.js"></script>
</body>

</html>
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
    <link rel="stylesheet" href="/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>

<body>

<br><br><br>
    <div class="container justify-content-center">
        <div class="offset-2 col-8 mb-5">
            <h2 >Profile of Tom</h2>
            <hr>
        
        <header class="btn-group">
            <!-- <div class="d-flex justify-content-center"> -->
                <a href="chat.php" class="btn btn-secondary"> Back to Chat</a>
                <a href="friends.php" class="btn btn-secondary"  data-bs-toggle="modal"
                    data-bs-target="#exampleModal" id="button-addon2 sendbutton">Remove Friend</a>
            </div>
            
</div>

        </header>

        <div class="row align-items-startrow align-items-start">
            <div class=" col-4 ">
                <div class="mg-left-right d-flex justify-content-center ">
                    <img src="../images/profile.png" alt="profile" class="rounded-circle justify-content-center" style="width: 100px;">
                </div>
                <div class="text-center">
                    <p class="coffee">
                        <h4>Coffee or Tea?</h4>
                        Tea
                    </p>
                    <p class="name">
                        <h4>Name</h4>
                        Thomas
                    </p>
                </div>
            </div>

            <div class="col-4">
                <hr>
                <p class="para-one">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni, beatae perferendis
                    modi perspiciatis, veniam repellendus ratione dolore, dolor accusamus dicta ipsam! Delectus, eaque
                    facilis sint omnis laborum dolores explicabo temporibus culpa enim! Quam voluptatibus quis nesciunt
                    libero, amet minus sint a voluptatem in iste quo praesentium dicta, ducimus nisi accusantium
                    officia.</p>
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
                    <button onclick="send()" type="button" class="btn btn-primary"><a class="btn-link  link-light"
                            href="friends.php" >Jup, skip em </a></button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
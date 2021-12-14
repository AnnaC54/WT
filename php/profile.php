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
    <div class="inner-body bg-color-lg pd-outer">
        <div class="heading">
            <h2 class=" h2 pd-up-down">Profile of Tom</h2>
        </div>
        <header class="header">
            <nav class="navigation">
                <button class="btn btn-large"><a class="white link" href="chat.php"> > Back to Chat</a></button>
                <button class="btn btn-large btn-remove"><a class="white link" href="friends.php">Remove
                        Friend</a>
                </button>
            </nav>
        </header>

        <div class="main-profile mg-up-down pd-up-down pd-left-right pd-outer">
            <div class=" cv ">
                <div class="personality-one pd-outer">
                    <img src="../images/profile.png" alt="profile" width="100" height="100">
                </div>
                <div class="personality-two pd-outer">
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

            <div class="paragraph-first pd-up-down pd-outer">
                <p class="para-one">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni, beatae perferendis
                    modi perspiciatis, veniam repellendus ratione dolore, dolor accusamus dicta ipsam! Delectus, eaque
                    facilis sint omnis laborum dolores explicabo temporibus culpa enim! Quam voluptatibus quis nesciunt
                    libero, amet minus sint a voluptatem in iste quo praesentium dicta, ducimus nisi accusantium
                    officia.</p>
            </div>

        </div>


</body>

</html>
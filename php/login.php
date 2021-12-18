<?php
require("start.php");
if(isset($_SESSION["user"])){
    header("Location: friends.php");
}
if (isset($_POST['username'])) {  //check if filled post form
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    if(BackendService::login($username, $password)){//login with variables
    $_SESSION["user"]=$username;
    echo var_dump($_SESSION["user"]);
    header("Location: friends.php");   //forward to friends like that???
}
}
?>        


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</head>
<title>Profile</title>

<body>

    <div class="container">
        <div class="text-center p-5">
            <img src="../images/chat.png" alt="chat" class="rounded-circle" style="width: 100px;">
        </div>
        <div class="inputWidth p-3 m-3 rounded-3 bg-white justify-content-center">
            <h1 class="h1 mb-4 mt-2 fw-normal text-center">Please sign in</h1>
                <form action = "login.php" method="post">                        <!-- action="</?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  -->
                    <div class="form-floating m-1">
                        <input type="text" class="form-control" name="username"  id="username" placeholder="Username">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating m-1">
                        <input type="password" class="form-control" name ="password" id="password" placeholder="Username">
                        <label for="floatingInput">Password</label>
                    </div>
                </form>
            <div class="m-3 text-center">
                <a href="register.php">
                    <button class="btn btn-lg btn-secondary">Register</button></a>
                <a href="friends.php">
                    <button class="btn btn-lg btn-primary" type="submit">Sign in</button></a>
            </div>
        </div>
    </div>


</body>

</html>
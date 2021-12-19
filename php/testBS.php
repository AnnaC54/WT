

<?php
require("start.php");

$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
//var_dump($service->test());

// register new users
var_dump($service->register("simon", "simonspwd"));
echo "<br>";
var_dump($service->register("Jan", "simonspwd"));
echo "<br>";
var_dump($service->login("Jan", "simonspwd"));


// test new friend
$friendAntolin = new Model\Friend("Sonja");
$friendAnt = new Model\Friend("Son");
// test new user

$userAnt = new Model\User("Henri");
echo "<hr>";
//var_dump($_SESSION["user"]);
//echo (\Model\User::fromJson($_SESSION["user"])->getFirstname());
//var_dump($service->saveUser($_SESSION["user"]->getUsername()));

echo "<hr>";
var_dump($_SESSION["user"]);
echo "<hr>";
var_dump($service->saveUser($_SESSION["user"]));
echo "<hr>";

// test getUsername();

echo $userAnt->getUsername();
echo "<br>";
echo $friendAnt->getUsername();
echo "<br>";

// test friendRequest();

var_dump($service->friendRequest($friendAntolin));
echo "<br>";
var_dump($service->friendRequest($friendAnt));


// test friendAccept();

echo "<br>";
var_dump($service->friendAccept($friendAnt));
echo "<br>";

// test loadFriends();

var_dump($service->loadFriends());
//$service->register("Antolin", "pwd");
//$service->login("Antolin", "pwd");
//$userAntolin = new User($_SESSION["user"]);


?>
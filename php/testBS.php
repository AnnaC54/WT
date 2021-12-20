

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


// users that does exist for sure (for testing): 

// user: maiborn pw: maibornpwd
// user: Jan pw: simonspwd
// user: simon pw: simonspwd
// user: Jn pw: simonspwd
// user: Monsieur Apel pw: webtechnologien
// user: Monsieur Riener pw: software
// user: Michael pw: michaels

// test new friend
$friendAntolin = new Model\Friend("Sonja");
$friendAnt = new Model\Friend("Son");
$friendMartin = new Model\Friend("Martin");
$MonsieurRiener= new Model\Friend("Monsieur Riener");
$MonsieurApel = new Model\Friend("Monsieur Apel");

// test new user

$userAnt = new Model\User("Henri");
<<<<<<< Updated upstream
echo "<hr>";
//var_dump($_SESSION["user"]);
//echo (\Model\User::fromJson($_SESSION["user"])->getFirstname());
//var_dump($service->saveUser($_SESSION["user"]->getUsername()));

echo "<hr>";
var_dump($_SESSION["user"]);
echo "<hr>";
echo "<hr>";
=======
>>>>>>> Stashed changes

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
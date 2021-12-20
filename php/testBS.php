

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

echo"<br> <br>";

// test send Message 

echo " <br> <br>SEND MESSAGE SIMON <br> <br> send Message: "; 

var_dump($service->sendMessage("Hello", "simon"));
var_dump($service->sendMessage("Testnachricht", "Jan"));
var_dump($service->sendMessage("Testnachricht", "Sonja"));

// test list Message s

echo " <br> <br>Simon list Messages<br> <br>"; 

var_dump($service->listMessages("simon"));

echo " <br> <br>Jan list Messages<br> <br>"; 

var_dump($service->listMessages("Jan"));

echo " <br> <br>Monsieur Riener  list Messages<br> <br>"; 

var_dump($service->listMessages("Monsieur Riener"));

echo " <br> <br>Son list Messages<br> <br>"; 

var_dump($service->listMessages("Son"));

echo " <br> <br>Sonja list Messages<br> <br>"; 

var_dump($service->listMessages("Sonja"));

// if session unset -> messages can´t be delivered

session_unset();

echo " <br> <br>SEND MESSAGE SIMON <br> <br> send Message: "; 

var_dump($service->sendMessage("Hello", "simon"));
var_dump($service->sendMessage("Testnachricht", "Jan"));
var_dump($service->sendMessage("Testnachricht", "Sonja"));

var_dump($service->listMessages("simon"));


echo " <br> <br>LOGIN MONSIEUR APEL<br> <br>"; 

var_dump($service->login("Monsieur Apel", "webtechnologien"));

echo " <br> <br>LOGIN (as MONSIEUR APEL) -> send Message to Michael<br> <br>"; 


var_dump($service->sendMessage("Testnachricht", "Michael"));

echo " <br> <br>LOGIN (as MONSIEUR APEL) -> list Messages Michael<br> <br>"; 


var_dump($service->listMessages("Michael"));

?>



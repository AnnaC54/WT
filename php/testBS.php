

<?php
require("start.php");

$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
//var_dump($service->test());


var_dump($service->register("Jan", "simonspwd"));
echo "<br>";
var_dump($service->login("Jan", "simonspwd"));

$friendAntolin = new Model\Friend("Sonja");
$friendAnt = new Model\Friend("Son");
$userAnt = new Model\User("Henri");
echo $userAnt->getUsername();
echo "<br>";
echo $friendAnt->getUsername();
echo "<br>";
var_dump($service->friendRequest($friendAntolin));
echo "<br>";
var_dump($service->friendRequest($friendAnt));
echo "<br>";
var_dump($service->friendAccept($friendAnt));
echo "<br>";
var_dump($service->loadFriends());
//$service->register("Antolin", "pwd");
//$service->login("Antolin", "pwd");
//$userAntolin = new User($_SESSION["user"]);


?>
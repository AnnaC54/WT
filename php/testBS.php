

<?php
require("start.php");

$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
//var_dump($service->test());


var_dump($service->register("Simon", "simonspwd"));
echo "<br>";
var_dump($service->login("Simon", "simonspwd"));

$friendAntolin = new Model\Friend("Sonja");
$friendAnt = new Model\Friend("Son");
echo "<br>";
var_dump($service->friendRequest($friendAntolin));
var_dump($service->friendRequest($friendAnt));
echo "<br>";
//echo ($service->loadFriends());
//$service->register("Antolin", "pwd");
//$service->login("Antolin", "pwd");
//$userAntolin = new User($_SESSION["user"]);


?>
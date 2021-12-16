

<?php
require("start.php");

$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
var_dump($service->test());


//var_dump($service->register("Simon", "simonspwd"));
//var_dump($service->login("Simon", "simonspwd"));

//$service->register("Antolin", "pwd");
//$service->login("Antolin", "pwd");
//$userAntolin = new User($_SESSION["user"]);
//$friendAntolin = new Friend($_SESSION["user"]);

?>
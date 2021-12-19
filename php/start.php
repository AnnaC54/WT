

<?php
session_start(); // Bezug Vorlesung, vgl. PHP Sessions!

//ini_set('display_errors', 1); // ?? 
// ini_set('display_startup_errors', 1); // ??
// error_reporting(E_ALL); // ? 

spl_autoload_register(function($class) {
    include str_replace('\\', '/', $class) . '.php';
});

// Define erstellt eine Konstante, die kann dann im folgenden einfach mit dem namen verwendet werden... z.B. CHAT_SERVER_URL (ohne $)
define("CHAT_SERVER_URL", "https://online-lectures-cs.thi.de/chat");
define("CHAT_SERVER_ID", "185ead53-1b4c-40a3-beff-89c5560908a2");
<<<<<<< Updated upstream
$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
=======
<<<<<<< HEAD
//$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
=======
$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
>>>>>>> acd02a1cf8ce0cebf22e2d85b56128025d11bb51
>>>>>>> Stashed changes
?>
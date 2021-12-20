<?php

namespace Utils;

use Model\User;

class BackendService
{
    private $base;
    private $collectionId;

    public function __construct($base, $collectionId)
    {
        $this->base = $base;
        $this->collectionId = $collectionId;
    }

    // dynamic

    public function register($username, $password)
    {
        try {
            // Utils Prefix nicht notwendig
            $url = "$this->base/$this->collectionId/register";
            // Fleißaufgabe, LoginData als Klasse in Model beschreiben, in Anlehnung an User, zweit Attribute, die JSON-Serialisierung usw.
            $data = array("username" => $username, "password" => $password);
            $result = HttpClient::post($url, $data);

            // Wichtig: Verzichten Sie auf "echo"-Anweisungen im BackendService!
            // Tipp: Fehler mit error_log();
            $_SESSION["chat-token"] = $result->token;
            return true; // return true?
        } catch (\Exception $e) {
            // error_log landet im XAMPP logs/php-error-log
            error_log("Authentification failed: $e");
            return false;
        }
    }

    // dynamic

    public function login($username, $password)
    {
        try {
            $url = "$this->base/$this->collectionId/login";
            $data = array("username" => $username, "password" => $password);
            $server  = HttpClient::post($url, $data);
            $_SESSION["chat-token"] = $server->token;
            return true;
        } catch (\Exception $e) {
            error_log("Authentification failed: $e");
            return false;
        }
    }

    // dynamic  

    public function exists($username)
    {
        try {
            HttpClient::get("$this->base/$this->collectionId/user/$username");
            return true;
        } catch (\Exception $e) {
            // immer aufgerufen, wenn kein HTTP-Status 200 oder 204
            error_log("Authentification failed: $e");
            return false;
        }
    }

    // dynamic

    public function loadUser($username)
    {
        try {
            $data = HttpClient::get("$this->base/$this->collectionId/user/$username", $_SESSION["chat-token"]);
            $user = User::fromJson($data);
            return $user;
        } catch (\Exception $e) {
            error_log("Authentification failed: $e");
            return false;
        }
    }

    // dynamic

    public function saveUser($username, $firstname, $lastname, $drink, $textfield, $radio)
    {
        try {
            // to do: http post aufruf mit token, instanz des users als parameter im aufruf übergeben
            // ergebnis direkt zurückgeben?
            $data = HttpClient::get("$this->base/$this->collectionId/user/$username", $_SESSION["chat-token"]);
            $user = User::fromJson($data);
            // data and user right?
            $result = HttpClient::post("$this->base/$this->collectionId/user/$username", $user);
            return $result;
            $dataArray = array (
                "firstname" => $firstname,
                "lastname" => $lastname,
                "drink" => $drink,
                "textfield" => $textfield,
                "radio" => $radio
            );
            return HttpClient::post("$this->base/$this->collectionId/user/$username",$dataArray,$_SESSION["chat-token"],);
        } catch(\Exception $e){
            error_log("Error: $e");
            return false;
        }
    }


    // http get aufruf mit token -> in lok. variable speichern
    // fromJson methode von Friend-Klasse um Methoden zu erzeugen
    // backend liefert lieste von freunden zurück -> result zurückgeben
    public function loadFriends()
    {
        /* try{
            // Wo kommt Friend Token her?
            
            $data = HttpClient::get("$this->base/$this->collectionId/user/$username");
            $data2 = \Model\Friend::fromJson($data);
            var_dump($data2);
            return $data2;
        } catch(\Exception $e){
            error_log("Error: " + $e);
            return false;
        }   */
        try {
            $data = HttpClient::get($this->base . "/" . $this->collectionId . "/friend", $_SESSION["chat-token"]);


            // var_dump($data);
            $friends = \Model\Friend::fromJson($data);
            return $friends;
        } catch (\Exception $e) {
            error_log("Error: $e");
        }
    }

    // http post aufruf mit token 
    // ergebnis direkt zurückgeben
    // parameter friend = instanz der klasse friend

    public function friendRequest($friend)
    {
        try {
            return HttpClient::post(
                $this->base . "/" . $this->collectionId . "/friend",
                array("username" => $friend->getUsername()),
                $_SESSION["chat-token"]
            );
        } catch (\Exception $e) {
            error_log("Error: $e");
        }
    }

    public function friendAccept($friend)
    {
        try {
            return HttpClient::put(
                $this->base . "/" . $this->collectionId . "/friend" . "/" . $friend->getUsername(),
                array("status"=> $friend->isAccepted()),
                $_SESSION["chat-token"]
            );
        } catch (\Exception $e) {
            error_log("Error: $e");
        }
    }

    public function friendDismiss($friend)
    {
        try {
            return HttpClient::put(
                $this->base . "/" . $this->collectionId . "/friend" . "/" . $friend->getUsername(),
                array("status"=> $friend->isDismissed()),
                $_SESSION["chat-token"]
            );
        } catch (\Exception $e) {
            error_log("Error: $e");
        }
    }

    public function friendRemove($friend)
    {
        try {
            HttpClient::delete(
                $this->base . "/" . $this->collectionId . "/friend" . "/" . $friend->getUsername(),
                $_SESSION["chat-token"]
            );
           // echo "Removed...";
        } catch (\Exception $e) {
            error_log("Error: $e");
        }
    }

    public function userExists($username)
    {
        try {
            //get token
            HttpClient::get("$this->base/$this->collectionId/user/$username");
            return true;
        } catch (\Exception $e) {
            error_log("Error: " + $e);
            return false;
        }
        // get aufruf mit token
    }

    public function getUnread()
    {
        try {
            $data = HttpClient::get(
                $this->base . "/" . $this->collectionId . "/unread" ,
                $_SESSION["chat-token"]            );
            var_dump($data);
        } catch (\Exception $e) {
            error_log("Error: " + $e);
        }
    }

    //test -> works fine
    public function test()
    {
        try {
            return HttpClient::get($this->base . '/test.json');
        } catch (\Exception $e) {
            error_log($e);
        }
        return false;
    }
}

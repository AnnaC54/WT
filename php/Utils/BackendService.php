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
            return $result->token; // return true?
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
            $data = HttpClient::get("$this->base/$this->collectionId/user/$username");
            $user = User::fromJson($data);
            return $user;
        } catch (\Exception $e) {
            error_log("Authentification failed: $e");
            return false;
        }
    }

    // dynamic

    public function saveUser($username)
    {
        try {
            // to do: http post aufruf mit token, instanz des users als parameter im aufruf übergeben
            // ergebnis direkt zurückgeben?
            $data = HttpClient::get("$this->base/$this->collectionId/user/$username");
            $user = User::fromJson($data);
            // data and user right?
            $result = HttpClient::post("$this->base/$this->collectionId/user/$username", $user);
            return $result;
        } catch (\Exception $e) {
            error_log("Authentification failed: $e");
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
            return $friends->jsonSerialize();
        } catch (\Exception $e) {
            echo "Error...";
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
            echo "Requested...";
        } catch (\Exception $e) {
            echo "Error...";
        }
    }

    public function friendAccept($friend = NULL)
    {
        try {
            HttpClient::put(
                "https://online-lectures-cs.thi.de/chat/1c4e8ce9-ddfa-4d80-8b43-b77fa5b8ba4c/friend/Jerry",
                array("status" => "accepted"),
                "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNjI5ODkzNTkwfQ.MRSZeLY8YNGp1dBWoYLUXTfs4ci1v13TkhQmke2nfII"
            );
            echo "Accepted...";
        } catch (\Exception $e) {
            echo "Error...";
        }
    }

    public function friendDismiss($friend = NULL)
    {

        try {
            HttpClient::put(
                "https://online-lectures-cs.thi.de/chat/1c4e8ce9-ddfa-4d80-8b43-b77fa5b8ba4c/friend/Jerry",
                array("status" => "accepted"),
                "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNjI5ODkzNTkwfQ.MRSZeLY8YNGp1dBWoYLUXTfs4ci1v13TkhQmke2nfII"
            );
            echo "Accepted...";
        } catch (\Exception $e) {
            echo "Error...";
        }
    }

    public function friendRemove($friend = NULL)
    {
        try {
            HttpClient::delete(
                "https://online-lectures-cs.thi.de/chat/1c4e8ce9-ddfa-4d80-8b43-b77fa5b8ba4c/friend/Jerry",
                "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNjI5ODkzNTkwfQ.MRSZeLY8YNGp1dBWoYLUXTfs4ci1v13TkhQmke2nfII"
            );
            echo "Removed...";
        } catch (\Exception $e) {
            echo "Error...";
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
                "https://online-lectures-cs.thi.de/chat/1c4e8ce9-ddfa-4d80-8b43-b77fa5b8ba4c/unread",
                "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNjI5ODkzNTkwfQ.MRSZeLY8YNGp1dBWoYLUXTfs4ci1v13TkhQmke2nfII"
            );
            var_dump($data);
        } catch (\Exception $e) {
            echo "Error...";
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

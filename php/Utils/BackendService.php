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

    public function register($username, $password)
    {
        try {
            // Utils Prefix nicht notwendig
            $url = "$this->server/$this->collectionId/register";
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
    public function login($username, $password)
    {
        try {
            $url = "$this->base/$this->collectionId/login";
            $data = array("username" => $username, "password" => $password);
            $chat_token = HttpClient::post($url, $data);

            return $chat_token->token;
        } catch (\Exception $e) {
            error_log("Authentification failed: $e");
            return false;
        }
    }
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
    }

    // http post aufruf mit token 
    // ergebnis direkt zurückgeben
    // parameter friend = instanz der klasse friend

    public function friendRequest($friend = NULL)
    {
        $friend = new User($_SESSION["user"]);
        $result = HttpClient::post("$this->base/$this->collectionId/", $friend);
        return $result;
    }

    public function friendAccept($friend = NULL)
    {
        $friend = new User($_SESSION["user"]);
        $result = HttpClient::put("$this->base/$this->collectionId/", $friend);
        return $result;
    }

    public function friendDismiss($friend = NULL)
    {
    }

    public function friendRemove($friend = NULL)
    {
    }

    public function userExists($username)
    {
        // get aufruf mit token
    }

    public function getUnread()
    {
        // get aufruf mit token
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
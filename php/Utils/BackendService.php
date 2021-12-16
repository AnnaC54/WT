<?php

require('start.php');

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
            
            return $chat_token->token; // return true?
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

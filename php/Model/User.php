<?php

namespace Model;

use JsonSerializable;


class User implements JsonSerializable
{
    private $username;
    private $firstname;
    private $lastname;
    private $textfield;
    private $radio;
    private $drink;
    // ggf. weitere Attribute, z.B. description, layout optionen...

    public function __construct($username = null)
    {
        $this->username = $username;
        $this->firstname = null;
        $this->lastname = null;
        $this->textfield = null;
        $this->radio = null;
        $this->drink = null;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setTextfield($textfield)
    {
        $this->textfield = $textfield;
    }

    public function getTextfield()
    {
        return $this->textfield;
    }

    public function setDrink($drink)
    {
        $this->drink = $drink;
    }

    public function getDrink()
    {
        return $this->drink;
    }

    public function setRadio($radio)
    {
        $this->radio = $radio;
    }

    public function getRadio()
    {
        return $this->radio;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }


    /*public static function fromJson($data){
        $arrayvalue = (array)$data;
        $user = new User($arrayvalue["username"]);
        foreach ($data as $key => $arrayvalue) { 
            if ($key != "username"){
                $user->$key = $arrayvalue;
            }
        }
        return $user;
    }
*/
    public static function fromJson($obj)
    {
        $user = new User();

        foreach ($obj as $key => $value) {
            // verwendet key als Zeichenkette
            // für den zugriff auf Attribute
            $user->{$key} = $value;
        }

        return $user;
    }

    // public function toJson() { manuell, nicht nötig...!
    //     return "{\"username\": \"$this->username\"}";
    // }


}

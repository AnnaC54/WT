<?php
namespace Model;
use JsonSerializable;


class User implements JsonSerializable {
    private $username;
    private $firstname;
    private $lastname;
    // ggf. weitere Attribute, z.B. description, layout optionen...

    public function __construct($username = null) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }
    public function setFirstname($firstname){
        $this->firstname = $firstname;
        echo $firstname;

    }
    
    public function getFirstname(){
        return $this->firstname;
    }
    
    public function setLastname($lastname){
        $this->lastname = $lastname;
        echo $lastname;
    }
    
    public function getLastname(){
        return $this->lastname;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

    
public static function fromJson($data) {
        $user = new User();

        foreach ($data as $key => $value) {
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


?>
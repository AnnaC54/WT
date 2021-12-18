<?php
namespace Model;
use JsonSerializable;


class User implements JsonSerializable {
    private $username;
    private $firstname;
    private $lastname;
    private $textfield;
    private $radio;
    private $drink;
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

    public function setTextfield($textfield){
        $this->textfield = $textfield;
        echo $textfield;

    }
    
    public function getTextfield(){
        return $this->textfield;
    }

    public function setDrink($drink){
        $this->drink = $drink;
        echo $drink;

    }
    
    public function getDrink(){
        return $this->drink;
    }

    public function setRadio($radio){
        $this->radio = $radio;
        echo $radio;

    }
    
    public function getRadio(){
        return $this->radio;
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
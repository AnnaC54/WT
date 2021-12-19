<?php

namespace Model;

use JsonSerializable;

class Friend implements JsonSerializable
{
    private $username;
    private $status;

    // ggf. weitere Attribute, z.B. description, layout optionen...

    public function __construct($username = null)
    
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public  function isAccepted()
    {
        $this->status = 'accepted';
    }

    public function isDismissed()
    {
        $this->status = 'dismissed';
    }


    public static function fromJson($data)
    {
        $user = new Friend();

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

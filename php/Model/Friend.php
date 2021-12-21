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
       return $this->status = 'accepted';
    }

    public function isDismissed()
    {
       return $this->status = 'dismissed';  //etiher return value
    }


    /*public static function fromJson($data)
    {
        $friends = [];
        $friend;
        foreach ($data as $key => $value) {
            $arrayvalue = (array)$value;
            
            if (key($arrayvalue) === "username") {
                $friend = new Friend($arrayvalue["username"]);
                //echo ($friend->__toString());
                echo "<br>";
            } else if (key($arrayvalue) === "status") {
                $friend->status = $arrayvalue["status"];
            }
            array_push($friends, $friend);
        }
        return $friends;
    }
*/
    public static function fromJson($obj)
    {
        $friends = [];

        foreach ($obj as $key => $value) {
            $friend = new Friend();
            $arrVal = (array)$value;
            foreach ($arrVal as $key => $value) {
                $friend->{$key} = $value;
            }
            array_push($friends, $friend);
        }
        return $friends;
    }



    // public function toJson() { manuell, nicht nötig...!
    //     return "{\"username\": \"$this->username\"}";
    // }
}

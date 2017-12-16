<?php

include_once("dbconnection.php");



class User
{
    private $username;
    private $type;
    private $conn;
private $user_id;
    function __construct($con)
    {
        $this->conn = $con;
    }

    function authorizeUser($username,$password)
    {
        $stmt = $this->conn->prepare("SELECT type_id,user_id,password from users where email=?");

        $stmt->bind_param('s',$username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($type,$user_id,$actualHash);
        $stmt->fetch();
        if($password!=$actualHash)
        {

            return false;
        }
        else
        {
            $this->username = $username;
            $this->type = $type;
            $this->user_id = $user_id;
            return true;
        }

    }

    function getType()
    {
        return $this->type;

    }

    function getUserName()
    {
        return $this->username;

    }
    function getUserID()
    {
      return $this->user_id;
    }
}





?>

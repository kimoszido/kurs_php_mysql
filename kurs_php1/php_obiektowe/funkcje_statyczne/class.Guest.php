<?php
require_once ("class.GuestAbstract.php");

class Guest extends GuestAbstract
{
    function __construct()
    {   
        $this->permission = PermissionInterface::READ_POST;
    }
}

?>
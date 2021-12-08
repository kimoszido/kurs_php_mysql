<?php

interface PermissionInterface
{
    const READ_POST = 1;
    const WRITE_POST = 2;
    const DELETE_POST = 4;
    const DELETE_USER = 8;

    function getPermission();
    function isPermitted($permission);

    static function checkPermission($userPermission, $permission); //statyczna klasa zawsze istnieje nie musi być instancji
}


?>
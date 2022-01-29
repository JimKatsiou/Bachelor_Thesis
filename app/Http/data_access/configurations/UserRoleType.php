<?php


namespace App\Http\data_access\configurations;

use Illuminate\Support\Facades\Auth;

class UserRoleType
{
    private static $rolesMap = [
        "admin" => 0,
        "professor" => 1,
        "student" => 2,
        "guest" => 3,
    ];

    private static $rolesKeysMap = [
        0 => "admin",
        1 => "professor",
        2 => "student",
        3 => "guest"
    ];

    public static function getRole($role)
    {
        return UserRoleType::$rolesMap[$role];
    }

    public static function getKey($roleValue)
    {
        return UserRoleType::$rolesKeysMap[$roleValue];
    }

    public static function getCurrentAuthenticatedUser()
    {
        $user = Auth::user();
        if ($user != null) {
            return $user;
        }
        return null;
    }
}
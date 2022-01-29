<?php


namespace App\Http\data_access\configurations;


use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;

class ParticipationStatusType
{
    private static $statusType = [
        "admin_reject" => 1,
        "admin_accept" => 2,
        "professor_reject" => 3,
        "professor_accept" => 4,
        "student_store" => 5,
        "student_submit" => 6,
        "admin_reedit" => 7,
        "approved" => 8,
        "rejected" => 9
    ];


    private static $statusKey = [
        1 => "admin_reject",
        2 => "admin_accept",
        3 => "professor_reject",
        4 => "professor_accept",
        5 => "student_store",
        6 => "student_submit",
        7 => "admin_reedit",
        8 => "approved",
        9 => "rejected"
    ];


    public static function getStatus($status)
    {
        return ParticipationStatusType::$statusType[$status];
    }

    public static function getKey($statusValue)
    {
        return ParticipationStatusType::$statusKey[$statusValue];
    }

    public static function isValid($status)
    {

        // if (ParticipationStatusType::$statusType[$status] == null) {
        //     throw new UnsupportedOperationException("Invalid status type for this Connection!");
        // }


        $role = UserRoleType::getRole('admin');
        if ($role == UserRoleType::getRole('admin')) {
            return true;
        }

        if ($role == UserRoleType::getRole('professor')) {
            if (
                $status == ParticipationStatusType::$statusType['professor_accept']
                || $status == ParticipationStatusType::$statusType['professor_reject']
            ) {
                return true;
            } else {
                throw new AccessDeniedException("This user is not valid for this opperation!");
            }
        }


        if ($role == UserRoleType::getRole('student')) {
            if (
                $status == ParticipationStatusType::$statusType['student_store']
                || $status == ParticipationStatusType::$statusType['student_submit']
            ) {
                return true;
            } else {
                throw new AccessDeniedException("This user is not valid for this opperation!");
            }
        }

        return false;
    }
}

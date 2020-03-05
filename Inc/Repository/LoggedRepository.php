<?php

namespace Inc\Repository;


class LoggedRepository
{
    public static function is_logged()
    {
        $roles = array('user','recruter','admin');
        if (!empty($_SESSION['login'])) {
            if (!empty($_SESSION['login']['id']) && is_numeric($_SESSION['login']['id'])) {
                if (!empty($_SESSION['login']['nom'])) {
                    if (in_array($_SESSION['login']['role'], $roles)) {
                        if (!empty($_SESSION['login']['ip'])) {
                            if (!empty($_SESSION['login']['ip']) == $_SERVER['REMOTE_ADDR']) {
                                return true;
                            }
                        }
                    }
                }
            }
        }
        return false;
    }

    public static function is_user()
    {
        if (is_logged()) {
            if ($_SESSION['login']['role'] == 'user') {
                return true;
            }
        }
        return false;
    }

    public static function is_recruter()
    {
        if (is_logged()) {
            if ($_SESSION['login']['role'] == 'recruter') {
                return true;
            }
        }
        return false;
    }


    public static function is_admin()
    {
        if (is_logged()) {
            if ($_SESSION['login']['role'] == 'admin') {
                return true;
            }
        }
        return false;
    }

}
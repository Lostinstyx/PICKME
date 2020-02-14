<?php

function clean($string)
{
    return trim(strip_tags($string));
}

function textValid($err, $value, $minl, $maxl, $key, $empty = true)
{
    if (!empty($value)) {
        if (mb_strlen($value) < $minl) {
            $err[$key] = 'Minimum ' . $minl . ' caracteres';
        } elseif (mb_strlen($value) > $maxl) {
            $err[$key] = 'Maximum ' . $maxl . ' caracteres';
        }
    } else {
        if ($empty) {
            $err[$key] = 'Veuillez renseigner ce champ';
        }
    }
    return $err;
}

function cleanMail($err, $mail, $key)
{
    if (!empty($mail)) {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $err[$key] = 'Email non valide';
        }
    } else {
        $err[$key] = 'Veuillez renseigner ce champ';
    }
    return $err;
}

function validateINT($err, $int, $key)
{
    if (!empty($int)) {
        if (!filter_var($int, FILTER_VALIDATE_INT)) {
            $err[$key] = 'Veuillez entrer une population valide';
        } elseif ($int <= 0) {
            $err['population'] = 'Ce champ doit être un entier positif';
        }
    } else {
        $err[$key] = 'Veuillez renseigner ce champ';
    }
    return $err;
}
function validateCountry($err, $string, $key)
{
    if (!empty($string)) {
        if (mb_strlen($string) != 3) {
            $err[$key] = 'Code pays incorrecte';
        }
    } else {
        $err[$key] = 'Veuillez renseigner ce champ';
    }
    return $err;
}
function spanErr($err, $key)
{
    if (!empty($err[$key])) {
        echo "<span class=\"error\">";
        echo $err[$key];
        echo "</span>";
    };
}
function random($arr)
{
    $rand = array_rand($arr, 1);
    echo $arr[$rand];
}
function pagination($nbPage)
{
    for ($i = 1; $i <= $nbPage; $i++) {
        echo " <a href=\"index.php?p=$i\">$i</a> /";
    }
}
function passwordValid($password, $err, $minl, $key)
{
    if (!empty($password)) {
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        if (!$lowercase || !$number) {
            $err[$key] = 'Votre mot de passe doit contenir au moins un chiffre';
        } elseif (mb_strlen($password) < $minl) {
            $err[$key] = 'Votre mot de passe doit faire un minimum de ' . $minl . ' caractères';
        }
    } else {
        $err[$key] = 'Veuillez remplir ce champ';
    }
    return $err;
}
;
function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function formselect($err, $select, $key)
{
    if (empty($select)) {
        $err[$key] = 'Veuillez sélectionner une option';
    }
    return $err;
}
function inputDate($err, $date, $key)
{
    if (empty($date)) {
        $err[$key] = 'Veuillez entrer une date';
    }
    return $err;
}

function is_logged()
{
    $roles = array('user', 'admin');
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

function is_admin()
{
    if (is_logged()) {
        if ($_SESSION['login']['role'] == 'admin') {
            return true;
        }
    }
    return false;
}


function emailValid($err, $mail, $key) {
    if (!empty($mail)) {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $err[$key] = 'Email non valide';
        }
    } else {
        $err[$key] = "Veuillez renseigner ce champ";
    }
    return $err;
}

function objectValid($err, $value, $minl, $maxl, $key, $empty = true)
{
    if (!empty($value)) {
        if (mb_strlen($value) < $minl) {
            $err[$key] = 'Minimum ' . $minl . ' caracteres';
        } elseif (mb_strlen($value) > $maxl) {
            $err[$key] = 'Maximum ' . $maxl . ' caracteres';
        }
    } else {
        if ($empty) {
            $err[$key] = 'Veuillez renseigner ce champ';
        }
    }
    return $err;
}



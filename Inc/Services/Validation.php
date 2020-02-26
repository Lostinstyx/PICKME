<?php


namespace Inc\Services;


class Validation
{
    public function validChamp($errors, $value, $key, $min, $max, $empty = false)
    {
        if (!empty($value)) {
            if (mb_strlen($value) < $min) {
                $errors[$key] = 'Minimum' . $min . 'caracteres';

            } elseif (mb_strlen($value) > $max) {
                $errors[$key] = 'Maximum' . $max . 'caracteres';
            }
        } else {
            if (!empty($value)){
                $errors[$key] = 'Veuillez renseigner ce champ';
            }
        }
        return $errors;
    }
}
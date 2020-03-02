<?php
namespace Inc\Service;

/**
 *
 */
class Validation
{
  public function validChamp($errors,$value,$key,$min,$max,$empty = false)
  {
    if(!empty($value)) {
      if(mb_strlen($value) < $min) {
        $errors[$key] = 'Minimum ' .$min . ' caractères';
      } elseif (mb_strlen($value) > $max) {
        $errors[$key] = 'Maximum ' .$max . ' caractères';
      }
    } else {
      if(!$empty){
        $errors[$key] = 'Veuillez renseigner ce champ';
      }
    }
    return $errors;
  }

  public function validMail($errors, $email, $key)
  {
      if(!empty($email)) {
          if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
              $errors[$key] = 'Veuillez renseigner un email valide !';
          }
      } else {
          $errors[$key] = 'Veuillez renseigner ce champ';
      }
      return $errors;

  }

  public function validPassword($errors, $password1, $password2, $key)
  {
      if (!empty($password1)) {
          if ($password1 != $password2) {
              $errors[$key] = 'Les deux mot de passe doivent être identiques';
          } elseif (mb_strlen($password1) <= 5) {
              $errors[$key] = 'min 6  caractères';
          }
      } else {
          $errors[$key] = 'Veuillez renseigner un mot de passe';
      }
      return $errors;
  }
}

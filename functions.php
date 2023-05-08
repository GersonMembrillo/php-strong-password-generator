<?php

function generatePassword($passwordLength)
{
  $password = '';
  $result = '';
  $alphabet = 'abcdefghijklmnopqrstuvwxyz';
  $numbers = '0123456789';
  $symbols = '!?&%$<>ì+-*/()[]{}@#_=';

  $allCharacters = $alphabet . strtoupper($alphabet) . $numbers . $symbols;

  if (empty($passwordLength)) {
    $result = 'Paramentro non valido';
  } else if ($passwordLength < 8 || $passwordLength > 32) {
    $result = 'La lunghezza non può essere minore di 8 caratteri ne maggiore di 32';
  } else {
    while (strlen($password) < $passwordLength) {
      $index = rand(0, strlen($allCharacters));
      $char = $allCharacters[$index];

      if (!str_contains($password, $char)) {
        $password .= $char;
      }
    }
    session_start();
    $_SESSION['password'] = $password;
    header('Location: ./success.php');
  }
  return $result;
}

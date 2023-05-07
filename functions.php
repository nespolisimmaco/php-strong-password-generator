<?php
// Generate password
function generatePassword($length, $characters_string)
{
    $password = "";
    for ($i = 0; $i < $length; $i++) {
        $symbol = substr($characters_string, rand(0, strlen($characters_string) - 1), 1);
        $password .= $symbol;
    }
    return $password;
}

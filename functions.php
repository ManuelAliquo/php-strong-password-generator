<?php 
    function generatePassword($length) {
        $lowercaseChars = "abcdefghijklmnopqrstuvwxyz";
        $uppercaseChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numericChars = "0123456789";
        $specialChars = "!@#$%^&*()-_=+[]{}|;:,.<>?";

        $allChars = $lowercaseChars . $uppercaseChars . $numericChars . $specialChars;

        $charsArray = [];
        $charsArray[] = $lowercaseChars[random_int(0, strlen($lowercaseChars) - 1)];
        $charsArray[] = $uppercaseChars[random_int(0, strlen($uppercaseChars) - 1)];
        $charsArray[] = $numericChars[random_int(0, strlen($numericChars) - 1)];
        $charsArray[] = $specialChars[random_int(0, strlen($specialChars) - 1)];

        for ($i = 4; $i < $length; $i++) 
            $charsArray[] = $allChars[random_int(0, strlen($allChars) - 1)];

        $password = str_shuffle(implode("", $charsArray));

        return $password;
        }
?>
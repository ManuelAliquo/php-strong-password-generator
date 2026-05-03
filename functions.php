<?php
    function generatePassword($length, $useLetters, $useNumbers, $useSymbols) {
        // char sets
        $lowercaseChars = "abcdefghijklmnopqrstuvwxyz";
        $uppercaseChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numericChars = "0123456789";
        $specialChars = "!@#$%^&*()-_=+[]{}|;:,.<>?";

        $allChars = "";
        $charsArray = [];

        // checks conditions
        if ($useLetters) {
            $allChars .= $lowercaseChars . $uppercaseChars;
            $charsArray[] = $lowercaseChars[random_int(0, strlen($lowercaseChars) - 1)];
            $charsArray[] = $uppercaseChars[random_int(0, strlen($uppercaseChars) - 1)];
        }
        if ($useNumbers) {
            $allChars .= $numericChars;
            $charsArray[] = $numericChars[random_int(0, strlen($numericChars) - 1)];
        }
        if ($useSymbols) {
            $allChars .= $specialChars;
            $charsArray[] = $specialChars[random_int(0, strlen($specialChars) - 1)];
        }

        // password generation
        $baseCount = count($charsArray);
        for ($i = $baseCount; $i < $length; $i++) 
            $charsArray[] = $allChars[random_int(0, strlen($allChars) - 1)];

        $password = str_shuffle(implode("", $charsArray));

        return $password;
    }
?>
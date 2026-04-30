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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Password Generator</h1>
    </header>

    <form action="">
        <label for="pass-length">Password length</label>
        <input type="number" min="8" max="20" name="pass-length" id="pass-length" required>
        <button>Submit</button>
    </form>
   
    <hr>

    <div>
        Your Password: <?php
        if (isset($_GET["pass-length"])) {
            $chosenlength = $_GET["pass-length"];
            echo generatePassword($chosenlength);
        }  ?>
    </div>
</body>
</html>
<?php
    require "functions.php"
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
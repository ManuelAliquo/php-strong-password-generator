<?php
    session_start();

    require_once "functions.php";

    $minLength = 8;
    $maxLength = 20;
    
    $errorMessage = "";

    if (isset($_GET["pass-length"])){
        $chosenlength = $_GET["pass-length"];
    
        if ($chosenlength >= $minLength && $chosenlength <= $maxLength) {
            $password = generatePassword($chosenlength);
            $_SESSION["password"] = $password;
            header("Location: result.php");
        } else $errorMessage = "Invalid length";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
</head>
<body>
    <header>
        <h1>Password Generator</h1>
    </header>
    <main>
        <form action="">
            <label for="pass-length">Password length</label>
            <input
            type="number"
            id="pass-length"
            name="pass-length"
            required
            min="<?php echo $minLength ?>"
            max="<?php echo $maxLength ?>">
            <button>Generate</button>
        </form>
        <div>
            <?php if ($errorMessage !== "") echo $errorMessage?>
        </div>
    </main>
</body>
</html>
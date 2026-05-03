<?php
    session_start();

    require_once "functions.php";

    $minLength = 8;
    $maxLength = 20;
    
    $errorMessage = "";

    if (isset($_GET["pass-length"])){
        $chosenlength = $_GET["pass-length"];
        $_SESSION["pass-length"] = $chosenlength;

        $useLetters = isset($_GET["letters"]);
        $useNumbers = isset($_GET["numbers"]);
        $useSymbols = isset($_GET["symbols"]);
        
        if (!$useLetters && !$useNumbers && !$useSymbols) {
            $errorMessage = "Select at least one character set!";
        } else if ($chosenlength >= $minLength && $chosenlength <= $maxLength) {
            $password = generatePassword($chosenlength, $useLetters, $useNumbers, $useSymbols);
            $_SESSION["password"] = $password;
            header("Location: result.php");
        } else $errorMessage = "Invalid length, (8 to 20)!";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
    crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Password Generator</title>
</head>

<body class="bg-dark">
    <div class="container mt-5 p-5">
        <div class="w-50 mx-auto card rounded-4 p-5">
            <h1 class="text-center mb-4">Password Generator</h1>
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <span class="input-group-text">Password length</span>
                    <input
                    type="number"
                    class="form-control"
                    id="pass-length"
                    name="pass-length"
                    required
                    placeholder="<?= $errorMessage !== "" ? $errorMessage : "Choose between 8 and 20" ?>">
                </div>
                <div class="d-flex justify-content-between align-items-end">
                    <!-- CHECKS -->
                    <div>
                        <h4>Use</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="letters" value="1" 
                                <?php echo (isset($_GET["letters"]) || !isset($_GET["pass-length"])) ? "checked" : ""; ?> 
                                id="letters-check">
                            <label class="form-check-label" for="letters-check">
                                Letters
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="numbers" value="1" 
                                <?php echo (isset($_GET["numbers"]) || !isset($_GET["pass-length"])) ? "checked" : ""; ?> 
                                id="numbers-check">
                            <label class="form-check-label" for="numbers-check">
                                Numbers
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="symbols" value="1" 
                                <?php echo (isset($_GET["symbols"]) || !isset($_GET["pass-length"])) ? "checked" : ""; ?> 
                                id="symbols-check">
                            <label class="form-check-label" for="symbols-check">
                                Symbols
                            </label>
                        </div>
                    </div>
                    <!-- SUBMIT -->
                    <button class="btn btn-outline-primary mt-3">Generate</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
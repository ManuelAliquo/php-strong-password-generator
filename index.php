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
        } else $errorMessage = "Invalid length, must be between 8 and 20!";
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
    <title>Password Generator</title>
</head>

<body class="bg-dark">
    <div class="container mt-5 p-5">
        <div class="w-50 mx-auto border rounded-4 p-5 bg-light">
            <h1 class="text-center mb-4">Password Generator</h1>
            <form action="">
                <div class="input-group mb-3">
                    <span class="input-group-text">Password length</span>
                    <input
                    type="number"
                    class="form-control"
                    id="pass-length"
                    name="pass-length"
                    required
                    placeholder="<?php
                    if ($errorMessage == "") echo "Must be between 8 and 20";
                    else echo $errorMessage?>">
                </div>
                <div class="d-flex justify-content-between align-items-end">
                    <!-- CHECKS -->
                    <div class="fs-5">
                        <div class="form-check">
                            <label class="form-check-label" for="letters-check">
                                Letters
                            </label>
                            <input class="form-check-input" type="checkbox" value="" id="letters-check">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="numbers-check">
                                Numbers
                            </label>
                            <input class="form-check-input" type="checkbox" value="" id="numbers-check">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="symbols-check">
                                Symbols
                            </label>
                            <input class="form-check-input" type="checkbox" value="" id="symbols-check">
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
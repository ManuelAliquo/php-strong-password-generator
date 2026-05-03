<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
    crossorigin="anonymous">
    <title>PassGen - Your Password</title>
</head>

<body class="bg-dark">
    <div class="container mt-5 p-5">
        <div class="w-50 mx-auto border rounded-4 p-5 bg-light text-center">
            <h1 class="mb-4">Your Password</h1>
    
            <div class="mb-3"> Your Password is: <b><?php echo $_SESSION["password"]?></b></div>
            <a class="btn btn-outline-secondary text-decoration-none text-black" href="index.php">Go Back</a>
        </div>
    </div>
</body>
</html>
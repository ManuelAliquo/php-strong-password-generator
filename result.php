<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Password</title>
</head>
<body>
    <header>
        <h1>Your Password</h1>
    </header>
    <main>
        <div> Your Password: <?php echo $_SESSION["password"]?></div>
        <a href="index.php">Go Back</a>
    </main>
</body>
</html>
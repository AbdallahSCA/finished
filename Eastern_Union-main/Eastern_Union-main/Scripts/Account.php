<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $us = $_SESSION['username'];
    echo "<h1>$us</h1>";
    echo "Test";
    ?>
<a href="Logout.php">Log Out</a>
</body>
</html>

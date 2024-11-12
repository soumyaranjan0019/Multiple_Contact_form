<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Step 1:</title>
</head>
<body>
    <form action="address_info.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <input type="submit" value="Next">
    </form>
</body>
</html>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Step 2:</title>
</head>
<body>
    <form action="additional_info.php" method="post">
        <label for="address">Address:</label>
        <input type="text" name="address" required>
        <br>
        <label for="city">City:</label>
        <input type="text" name="city" required>
        <br>
        <label for="state">State:</label>
        <input type="text" name="state" required>
        <br>
        <input type="hidden" name="name" value="<?php echo $_SESSION['name']; ?>">
        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
        <input type="submit" value="Next">
    </form>
</body>
</html>
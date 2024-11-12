<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['state'] = $_POST['state'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Step 3:</title>
</head>

<body>
    
    <form action="review.php" method="post">
        <label for="additional_info">Subject:</label>
        <textarea name="additional_info" required></textarea>
        <br>
        <input type="hidden" name="name" value="<?php echo $_SESSION['name']; ?>">
        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
        <input type="hidden" name="address" value="<?php echo $_SESSION['address']; ?>">
        <input type="hidden" name="city" value="<?php echo $_SESSION['city']; ?>">
        <input type="hidden" name="state" value="<?php echo $_SESSION['state']; ?>">
        <input type="submit" value="Save">
    </form>

</body>
</html>
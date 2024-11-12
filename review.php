<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['additional_info'] = $_POST['additional_info'];

    $conn = new mysqli('localhost', 'root', '', 'contact_form_db');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, address, city, state, additional_info) VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssss", $_SESSION['name'], $_SESSION['email'], $_SESSION['address'], $_SESSION['city'], $_SESSION['state'], $_SESSION['additional_info']);
    
    if ($stmt->execute()) {
        echo "Contact information submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    
    // session_unset();
    // session_destroy();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display and show</title>
</head>
<body>

    <h2>Show</h2>
    
    <p>Name: <?php echo $_SESSION['name']; ?></p>
    <p>Email: <?php echo $_SESSION['email']; ?></p>
    <p>Address: <?php echo $_SESSION['address']; ?></p>
    <p>City: <?php echo $_SESSION['city']; ?></p>
    <p>State: <?php echo $_SESSION['state']; ?></p>
    <p>Additional Information: <?php echo $_SESSION['additional_info']; ?></p>

    <form action="personal_info.php" method="post">
        <input type="submit" value="Submit Another">
    </form>

    <?php
    session_unset();
    session_destroy();
    ?>

</body>
</html>
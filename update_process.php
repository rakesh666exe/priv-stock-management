<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Prevent SQL injection
    $id = $conn->real_escape_string($id);
    $name = $conn->real_escape_string($name);
    $quantity = $conn->real_escape_string($quantity);
    $price = $conn->real_escape_string($price);
    $category = $conn->real_escape_string($category);

    $sql = "UPDATE stock SET name='$name', quantity='$quantity', price='$price', category='$category' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Error: Invalid request.";
}
?>

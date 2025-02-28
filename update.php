<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM stock WHERE id=$id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Error: Item not found.";
        exit();
    }
} else {
    echo "Error: No ID provided.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Stock</title>
</head>
<body>
    <h2>Update Stock Item</h2>
    <form action="update_process.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
        <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
        <input type="number" name="quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>" required>
        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($row['price']); ?>" required>
        <input type="text" name="category" value="<?php echo htmlspecialchars($row['category']); ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>

<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Management</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background: #007bff; color: white; }
        form { margin-top: 20px; }
        input, button { padding: 8px; margin: 5px; }
    </style>
</head>
<body>
    <h2>Stock Management</h2>

    <h3>Add Stock Item</h3>
    <form action="add.php" method="post">
        <input type="text" name="name" placeholder="Item Name" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <input type="text" name="category" placeholder="Category" required>
        <button type="submit">Add</button>
    </form>

    <h3>Stock List</h3>
    <table>
        <tr>
            <th>ID</th> <th>Name</th> <th>Quantity</th> <th>Price</th> <th>Category</th> <th>Actions</th>
        </tr>
        <?php
        $sql = "SELECT * FROM stock";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['category']}</td>
                        <td>
                            <a href='update.php?id={$row['id']}'>Edit</a> | 
                           <a href='delete.php?id={$row['id']}'>Delete</a>

                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No stock items found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

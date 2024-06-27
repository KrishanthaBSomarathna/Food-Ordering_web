<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: signin_admin.php');
    exit();
}

require 'db_connection.php';

// Fetch orders
$ordersQuery = "SELECT * FROM orders ORDER BY order_time DESC";
$ordersResult = $conn->query($ordersQuery);

// Fetch food items
$foodQuery = "SELECT * FROM food_items";
$foodResult = $conn->query($foodQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
    <script>
    // JavaScript to display delete status message
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const deleteSuccess = urlParams.get('delete_success');
        const deleteError = urlParams.get('delete_error');

        if (deleteSuccess === '1') {
            alert('Food item deleted successfully.');
        } else if (deleteError === '1') {
            alert('Failed to delete food item.');
        }
    });
    </script>
</head>
<body>

    <h1>Admin Dashboard</h1>

    <a href="create_admin.php">Add Admin</a>

    <h2>Add Food Item</h2>
    <form action="add_food.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Food Name" required>
        <textarea name="description" placeholder="Description"></textarea>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <input type="file" name="image" accept="image/*" required>
        <input type="submit" value="Add Food">
    </form>

    <h2>Food Items</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php while ($food = $foodResult->fetch_assoc()): ?>
            <tr>
                <td><?php echo $food['id']; ?></td>
                <td><?php echo $food['name']; ?></td>
                <td><?php echo $food['description']; ?></td>
                <td><?php echo $food['price']; ?></td>
                <td><img src="uploads/<?php echo $food['image']; ?>" alt="<?php echo $food['name']; ?>" width="100"></td>
                <td>
                    <!-- Delete button form -->
                    <form action="delete_food.php" method="post">
                        <input type="hidden" name="food_id" value="<?php echo $food['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Order List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Phone</th>
            <th>Food</th>
            <th>Quantity</th>
            <th>Address</th>
            <th>Message</th>
            <th>Order Time</th>
        </tr>
        <?php while ($order = $ordersResult->fetch_assoc()): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['customer_name']; ?></td>
                <td><?php echo $order['phone']; ?></td>
                <td><?php echo $order['food']; ?></td>
                <td><?php echo $order['quantity']; ?></td>
                <td><?php echo $order['address']; ?></td>
                <td><?php echo $order['message']; ?></td>
                <td><?php echo $order['order_time']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>

<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_signin.php');
    exit();
}

require 'db_connection.php';

// Check if food_id is provided and valid
if (isset($_POST['food_id'])) {
    $food_id = $_POST['food_id'];

    // Prepare SQL statement to delete food item
    $deleteQuery = "DELETE FROM food_items WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param('i', $food_id);

    // Execute delete statement
    if ($stmt->execute()) {
        // Redirect back to admin dashboard with success message
        header('Location: admin_dashboard.php?delete_success=1');
        exit();
    } else {
        // Redirect back to admin dashboard with error message
        header('Location: admin_dashboard.php?delete_error=1');
        exit();
    }
} else {
    // Redirect back to admin dashboard if food_id is not provided
    header('Location: admin_dashboard.php');
    exit();
}
?>

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customer_name = $_POST['customer_name'];
    $phone = $_POST['phone'];
    $food = $_POST['food'];
    $quantity = $_POST['quantity'];
    $order_time = $_POST['order_time'];
    $address = $_POST['address'];
    $message = $_POST['message'];

    // Validate and sanitize inputs 
    $customer_name = filter_var(trim($customer_name), FILTER_SANITIZE_STRING);
    $phone = filter_var(trim($phone), FILTER_SANITIZE_STRING);
    $food = filter_var(trim($food), FILTER_SANITIZE_STRING);
    $quantity = filter_var(trim($quantity), FILTER_SANITIZE_NUMBER_INT);
    $order_time = filter_var(trim($order_time), FILTER_SANITIZE_STRING);
    $address = filter_var(trim($address), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($message), FILTER_SANITIZE_STRING);

    // Validate data 
    if (empty($customer_name) || empty($phone) || empty($food) || empty($quantity) || empty($order_time) || empty($address)) {
        // Handle validation errors (redirect or display error messages)
        echo "Please fill all required fields.";
        exit;
    }

    // Database connection
    require 'db_connection.php';

    // Insert order into database
    $query = "INSERT INTO orders (customer_name, phone, food, quantity, order_time, address, message)
              VALUES ('$customer_name', '$phone', '$food', '$quantity', '$order_time', '$address', '$message')";

    if ($conn->query($query) === TRUE) {
        // Order placed successfully
        // Close database connection
        $conn->close();

        // Redirect to index.php with success message
        header("Location: index.php?success=1");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    // Handle cases where form is not submitted properly
    echo "Form submission error.";
}
?>

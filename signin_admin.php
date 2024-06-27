<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sign in admin</title>
<link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h2>Yestar Sign In form</h2>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
			<?php
            if(isset($_POST['btnSubmit'])) {
                require 'db_connection.php';
                $email = $_POST['txtEmail'];
                $password = $_POST['txtPassword'];

                $stmt = $conn->prepare("SELECT id, password FROM admins WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 1) {
                    $admin = $result->fetch_assoc();
                    if(password_verify($password, $admin['password'])) {
                        session_start();
                        $_SESSION['admin_id'] = $admin['id'];
                        header("Location: admin_dashboard.php");
                        exit();
                    } else {
                        echo "<p style='color: red;'>Invalid email or password. Please try again.</p>";
                    }
                } else {
                    echo "<p style='color: red;'>Invalid email or password. Please try again.</p>";
                }
            }
            ?>
            <form action="" method="post">
                <h1>Sign in</h1>
                <input type="email" name="txtEmail" placeholder="Email" />
                <input type="password" name="txtPassword" placeholder="Password" />
                <input type="submit" value="Sign In" name="btnSubmit">
                <a href="index.php">Go Home</a>
            </form>
        </div>
    </div>
</body>
</html>

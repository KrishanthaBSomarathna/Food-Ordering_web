<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create Admin</title>
<!-- Link to external CSS file for styling -->
<link rel="stylesheet" href="css/login.css">
<script>
    // JavaScript function to check if the password and confirm password fields match
    function checkPassword() {
        let pw = document.getElementById("txtPassword").value;
        let cpw = document.getElementById("txtConfimPassword").value;
        if(pw != cpw) {
            alert("Password and confirm password should be the same");
            event.preventDefault();
        }
    }
</script>
</head>
<body>
    <!-- Yestar Sign-up form -->
    <h2>Yestar Sign up form</h2>
    <div class="container" id="container">
        
        <!-- Sign-up form -->
        <div class="form-container sign-in-container">
			<?php
            // Check if the form is submitted
            if(isset($_POST['btnSubmit'])) {
                // Retrieve user input
                $name = $_POST['txtName'];
                $email = $_POST['txtEmail'];
                $password = $_POST['txtPassword'];
                $contactNo = $_POST['txtContactNo'];

                // Validate user input (example: check if required fields are filled)
                if(empty($name) || empty($email) || empty($password) || empty($contactNo)) {
                    echo "<p style='color: red;'>All fields are required.</p>";
                } else {
                    // Store user information in the database (example: insert into a users table)
                    // Your database connection and insertion logic here

                    // For demonstration, we'll just display the user information
                    echo "<p style='color: green;'>Account created successfully:</p>";
                   
                    // You can redirect the user to a different page after successful registration
                }
            }
            ?>
            
            <form action="" method="post">
                <h1>Create Account</h1>
                <!-- Input fields for user's name, email, password, confirm password, and contact number -->
                <input type="text" placeholder="Name" name="txtName" id="txtName"/>
                <input type="email" placeholder="Email" required name="txtEmail" id="txtEmail"/>
                <input type="password" placeholder="Password" id="txtPassword" name="txtPassword" required/>
                <input type="password" placeholder="Confirm Password" id="txtConfimPassword" name="txtConfimPassword"/>
                <input type="number" placeholder="Contact Number" name="txtContactNo" id="txtContactNo" pattern="[0-9]{10}" required />        
                <!-- Button to submit sign-up form, calling checkPassword() function to validate passwords -->
                <input type="submit" value="Sign Up" onClick="checkPassword()" name="btnSubmit"/>
                
                <a href="signin.html">Already have an account? <span style="color: rgb(8, 115, 255); font-style: normal,;">SIGN-IN!</span></a>
                <a href="index.html">Go Home</a>
            </form>
        </div>
        
    </div>
    
    
</body>
</html>

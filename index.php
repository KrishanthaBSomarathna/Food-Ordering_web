<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <script>
    // JavaScript to display alert if success parameter is present
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const success = urlParams.get('success');

        if (success === '1') {
            alert('Order placed successfully!');
        }
    });
    </script>
    
</head>
<body>
    
<!-- header section starts      -->

<header>
    <a href="#" class="logo"><i class="fas fa-utensils"></i>Yestar</a>
    <nav class="navbar">
        <a class="active" href="#home">Home</a>
        <a href="#menu">Menu</a>
        <a href="#about">About Us</a>
        <a href="#order">Order</a>
    </nav>
    
    <div class="icons"> <!-- Moved icons inside the container -->
        <i class="fas fa-bars" id="menu-bars"></i>
        <a href="signin_admin.php" class="fas fa-user"></a>
    </div>
   
</header>

<!-- header section ends-->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="swiper-container home-slider">

        <div class="swiper-wrapper wrapper">
            <div class="swiper-slide slide">
                <div class="content">
                    <span>Our Special Dish</span>
                    <h3>Fried Chicken</h3>
                    <p>Fried Chicken is a dish consisting of chicken pieces that have been coated with seasoned flour or batter and pan-fried, deep fried, pressure fried, or air fried.</p>
                    <a href="#" class="btn">Order Now</a>
                </div>
                <div class="image">
                    <img src="Images/fried chicken.jpg" alt="">
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

<!-- home section ends -->

<!-- menu section starts  -->

<section class="menu" id="menu">

    <h1 class="heading">YESTAR FOOD MENU </h1>

    <div class="box-container">
        <?php
        // Database connection
        require 'db_connection.php';

        // Fetch food items from the database
        $query = "SELECT * FROM food_items";
        $result = $conn->query($query);

        // Display each food item as a box
        while ($row = $result->fetch_assoc()) {
            echo '<div class="box">';
            echo '<img src="uploads/' . $row['image'] . '" alt="' . $row['name'] . '">';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<div class="stars">';
            echo '<i class="fas fa-star"></i>';
            echo '<i class="fas fa-star"></i>';
            echo '<i class="fas fa-star"></i>';
            echo '<i class="fas fa-star"></i>';
            echo '<i class="fas fa-star-half-alt"></i>';
            echo '</div>';
            echo '<span>Rs. ' . number_format($row['price'], 2) . '</span>';
            echo '</div>';
        }
        ?>
    </div>

</section>

<!-- menu section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h3 class="sub-heading"> About Us </h3>
    <h1 class="heading"> OUR RESTAURANT </h1>

    <div class="row">
        <div class="image">
            <img src="Images/restaurant.jpeg" alt="">
        </div>
        <div class="content">
            <h2>Enjoy your time in our restaurant with pleasure.</h2>
            <p>Yestar combines the perfect amounts of taste tingling cuisine, first-class dining & family friendly fun mixed together to create the ultimate culinary masterpiece! Combining the richest tastes of Chinese cuisine along with pure Indian delicacies so that you can explore tantalising taste temptations served up on every plate!
            At Yestar you can also experience exclusive catering to all private events held in elite VIP lounges, provided specially for you.</p>
        </div>
    </div>

</section>

<!-- about section ends -->

<!-- order section starts  -->

<section class="order" id="order">

    <h3 class="sub-heading"> Order Now </h3>
    <h1 class="heading"> free and fast </h1>

    <form action="place_order.php" method="post">

        <div class="inputBox">
            <div class="input">
                <span>Your Name</span>
                <input type="text" name="customer_name" placeholder="Enter your name" required>
            </div>
            <div class="input">
                <span>Your Phone Number</span>
                <input type="tel" name="phone" placeholder="Enter your phone number" required>
            </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>Food Name</span>
                <input type="text" name="food" placeholder="Enter food name" required>
            </div>
            <div class="input">
                <span>Additional Info</span>
                <input type="text" name="additional_info" placeholder="Extra with food">
            </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>Quantity</span>
                <input type="number" name="quantity" placeholder="How many orders" required>
            </div>
            <div class="input">
                <span>Order Time</span>
                <input type="datetime-local" name="order_time" required>
            </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>Your Address</span>
                <textarea name="address" placeholder="Enter your address" required></textarea>
            </div>
            <div class="input">
                <span>Your Message</span>
                <textarea name="message" placeholder="Enter your message"></textarea>
            </div>
        </div>

        <input type="submit" value="Order Now" class="btn">

    </form>

</section>

<!-- order section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">
        <div class="box">
            <h3>Locations</h3>
            <a href="#">Negombo</a>
            <a href="#">Ja-Ela</a>
            <a href="#">Kadawatha</a>
            <a href="#">Nugegoda</a>
            <a href="#">Malabe</a>
        </div>

        <div class="box">
            <h3>Quick Links</h3>
            <a href="#">Home</a>
            <a href="#">Menu</a>
            <a href="#">About Us</a>
            <a href="#">Order</a>
            <a href="#">Log-in</a>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <a href="#">+94 11 347 6145</a>
            <a href="#">+94 71 031 9319</a>
            <a href="#">yestarrestaurant@gmail.com</a>
            <a href="#">info@yestarfamilyrestaurant.lk</a>
        </div>

        <div class="box">
            <h3>Follow Us</h3>
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
            <a href="#">Linkedin</a>
        </div>
    </div>

    <div class="credit"> Copyright @ <?php echo date("Y"); ?> by <span>Miss. G.A.P.C.Gamlath</span> </div>

</section>

<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>

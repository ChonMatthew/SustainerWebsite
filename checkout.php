<?php

session_start();

if (!empty($_SESSION['cart'])) {

    //let user in


    //send user to home
} else {

    header('location: index.php');
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SUSTAINER!</title>
    <link href="assets/css/stylesheet.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/102f6b864c.js" crossorigin="anonymous"></script>



</head>

<body>

    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-custom">
        <div class="container">
            <a class="navbar-brand nav-buttons" href="index.php">
                <img src="assets/images/Index/Nav_Logo.png" width="80" height="100%">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="shop_landing.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="information.php">How-To</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sustainer Club</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>

                    <li class="nav-item">
                        <a href="login_form.php"><i class="fa-solid fa-user"></i></a>
                        <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>


    <!--Checkout-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Check Out</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" method="POST" action="server/place_order.php">

                <p class="text-center" style="color: red;">
                    <?php if (isset($_GET['message'])) {
                        echo $_GET['message'];
                    }; ?>

                    <?php if (isset($_GET['message'])) { ?>
                        <a href="login_form.php" class="btn btn-primary">Login</a>

                        <?php } ?>
                </p>


                <div class="form-group checkout-small-element">
                    <label>Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label>Email</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label>Phone</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label>City</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required>
                </div>
                <div class="form-group checkout-large-element">
                    <label>Address</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required>
                </div>
                <div class="form-group checkout-btn-container">
                    <p>Total Amount: RM <?php echo $_SESSION['total']; ?></p>
                    <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order" />
                </div>
            </form>
        </div>
    </section>


    <!--Footer-->
    <footer class="mt-5 py-4">
        <div class="row container mx-auto pt-3">
            <div class="footer-one col-lg-4 col-md-8 col-sm-16">
                <img src="assets/images/footer/Footer_Logo.png" alt="" class="footer-image">
            </div>
            <div class="footer-one col-lg-4 col-md-8 col-sm-16">
                <h3 class="pb-2">Online Shopping</h3>
                <ul class="text-uppercase">
                    <li><a href="">Our Produtcs</a></li>
                    <li><a href="">For You</a></li>
                    <li><a href="">Household</a></li>
                </ul>
            </div>

            <div class="footer-one col-lg-4 col-md-8 col-sm-16">
                <h3 class="pb-2">More About Us</h3>
                <ul class="text-uppercase">
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Sustainer Club</a></li>
                    <li><a href="">Refill Initiative</a></li>
                </ul>
            </div>
        </div>

        <hr size="8" width="100%" color="#1C5C7B">

        <div class="copyright mt-5">
            <div class="row container mx-auto">
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <img src="assets/images/footer/" alt="">
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4 mb-2">
                    <p>"Sustainable Living in a Bottle"</p>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
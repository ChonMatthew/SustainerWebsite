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
                        <a class="nav-link" href="loyalty.php">Sustainer Club</a>
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

    <!--Home Page Content-->
    <div id="Banner">
        <img class="header-image" src="assets/images/Index/Index_banner.jpg"">
    </div>
    <div class=" about-parent">
        <div class="about-child">
            <h1 class="about-head">Who Are We?</h1>
            <p>
                Sustainer is a company founded by two students in Subang Jaya, Malaysia in 2023.
                The founders, Sean Matthew Wong Su Han and Wong Jun Teng, believed that daily life can be
                more sustainable by reducing the amount of disposable plastic and bottles used.
                They founded Sustainer to allow refill of daily household and personal products with
                high quality products and a low carbon footprint.
            </p>
        </div>
        <div class="ms-child">
            <h1 class="about-head">Mission & Goal</h1>
            <p>
                Our mission is to give individuals the power to make sustainable choices by providing
                accessible refillable products which are both high quality and affordable, all while
                promoting proper waste disposal and waste reduction. <br> <br>

                Our goal is to become the main provider of sustainable containers and refillable
                products to create a community of sustainable and innovative people who are environmentally
                conscious.
            </p>
        </div>
    </div>

    <!--Home Page Bottom-->
    <div class="extra-parent">
        <div class="products-child">
            <img src="assets/images/Index/extra_products.png">
            <h3><a href="shop_landing.php">Products</a></h3>
            <p>
                Browse through our <br>
                products and find one <br>
                JUST FOR YOU!
            </p>
        </div>
        <div class="howto-child">
            <img src="assets/images/Index/extra_howto.png" alt="">
            <h3><a href="information.php">How-To</a></h3>
            <p>
                Our Refill Program <br>
                and Tips on <br>
                sustainable living.
            </p>
        </div>
        <div class="loyalty-child">
            <img src="assets/images/Index/extra_loyalty.png" alt="">
            <h3><a href="loyalty.php">Loyalty Program</a></h3>
            <p>
                BECOME A <br>
                SUSTAINER! <br>
            </p>
        </div>
        <div class="contact-child">
            <img src="assets/images/Index/extra_contact.png" alt="">
            <h3><a href="contact.php">Contact Us</a></h3>
            <p>
                Get in touch <br>
                with us! <br>
            </p>
        </div>
    </div>


    <!--Footer-->
    <footer class="mt-5 py-4">
        <div class="row container mx-auto pt-3">
            <div class="footer-one col-lg-4 col-md-8 col-sm-16">
                <img src="assets/images/footer/Footer_Logo.png" alt="" class="footer-image">
            </div>
            <div class="footer-one col-lg-4 col-md-8 col-sm-16">
                <h3 class="pb-2">Online Shopping</h3>
                <ul class="text-uppercase">
                    <li><a href="shop_landing.php">Our Produtcs</a></li>
                    <li><a href="for_you.php">For You</a></li>
                    <li><a href="household.php">Household</a></li>
                </ul>
            </div>

            <div class="footer-one col-lg-4 col-md-8 col-sm-16">
                <h3 class="pb-2">More About Us</h3>
                <ul class="text-uppercase">
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="loyalty.php">Sustainer Club</a></li>
                    <li><a href="information.php">Refill Initiative</a></li>
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
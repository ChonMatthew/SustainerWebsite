<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SUSTAINER! - Household</title>
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
                        <a href=""><i class="fa-solid fa-user"></i></a>
                        <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>



    <!--Shop Content-->
    <div class="container for-you-banner">
        <div class="row">
            <div class="col">
                <h1 class="for-you-head">HOUSEHOLD</h1>
                <p>
                CLEANER AND MORE SUSTAINABLE. Our products are made with natural, plant-based ingredients 
                that are effective at cleaning without harming the environment. Make the switch to sustainable 
                detergent, floor wash, and dish wash today and see the difference it makes for your family 
                and the planet!

                </p>
            </div>
            <div class="col">
                <img class="for-you-image" src="assets/images/Index/Household_shop.png" alt="">
            </div>
        </div>
    </div>

    <!--Products-->
    <section id="shop" class="my-5 py-5">
        <div class="row mx-auto container">

            <?php include('server/get_products_household.php'); ?>

            <?php while ($row = $products->fetch_assoc()) { ?>

                <div class="product text-center col-lg-3 col-md-4 col-sm-12"> <!--onclick="window.location.href='single_product.php'"-->
                    <img class="img-fluid mb-3" src="assets/images/Products/<?php echo $row['product_image']; ?>" alt="">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="p-name"><?php echo $row['product_name']; ?></h3>
                    <h4 class="p-price">RM <?php echo $row['product_price']; ?></h4>
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                        <button class="buy-btn">Buy Now</button></a>
                </div>

            <?php } ?>
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
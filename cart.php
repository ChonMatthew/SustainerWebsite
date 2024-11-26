<?php

session_start();

if(isset($_POST['add_to_cart'])) {

    //if user has already added to cart
    if(isset($_SESSION['cart'])) {

        $products_array_ids = array_column($_SESSION['cart'],"product_id");
        if(!in_array($_POST['$products_id'], $products_array_ids)) {

            $product_id = $POST['product_id'];

            $product_array = array(
                                'product_id' => $_POST['product_id'],
                                'product_name' => $_POST['product_name'],
                                'product_price' => $_POST['product_price'],
                                'product_image' => $_POST['product_image'],
                                'product_quantity' => $_POST['product_quantity']
            );

            $_SESSION['cart'][$product_id] = $product_array;

            //product already been added
        } else {

            echo '<script>alert("Product Was ALready Added to Bag");</script>';
        }

        //if this is the first product
    } else {

        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
                            'product_id' => $product_id,
                            'product_name' => $product_name,
                            'product_price' => $product_price,
                            'product_image' => $product_image,
                            'product_quantity' => $product_quantity
        );

        $_SESSION['cart'][$product_id] = $product_array;
        // [ 2=>[], 3=>[], 4=>[] ] Each array will have a unique value to recognize the product
    }
    //calculate cart total
    calculateTotalCart();

    //remove product from cart
} else if(isset($_POST['remove_product'])) {

    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);

    // calculate total
    calculateTotalCart();


// update product quantity
} else if(isset($_POST['edit_quantity']) ) {

    // we get the id and quantity from the form
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    // get the product array from the session
    $product_array = $_SESSION['cart'][$product_id]; 
    // update the quantity
    $product_array['product_quantity'] = $product_quantity;
    // return array back to its place in the session
    $_SESSION['cart'][$product_id] = $product_array;

    // calculate total
    calculateTotalCart();

}else {
    //header('location: shop_landing.php');
}

function calculateTotalCart() {

    $total = 0;

    foreach($_SESSION['cart'] as $key => $value) {

        $product = $_SESSION['cart'][$key];
        $price = $product['product_price'];
        $quantity = $product['product_quantity'];
        $total = $total + ($price * $quantity);
}

$_SESSION['total'] = $total;

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


    <!--cart-->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Your Cart</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php foreach($_SESSION['cart'] as $key => $value) { ?>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/images/Products/<?php echo $value['product_image']; ?>" alt="">
                        <div>
                            <p><?php echo $value['product_name']; ?></p>
                            <small><span>RM</span><?php echo $value['product_price']; ?></small>
                            <br>

                            <form method="POST" action="cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                            <input type="submit" name="remove_product" class="remove-btn" value="remove">
                            </form>
                        </div>
                    </div>
                </td>

                <td>
                    <form method="POST" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                    <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>">
                    <input type="submit" class="edit-btn" value="edit" name="edit_quantity">
                    </form>
                </td>

                <td>
                    <span>RM</span>
                    <span class="product-price"><?php echo $value['product_quantity'] * 
                    $value['product_price']; ?></span>
                </td>
            </tr>

            <?php } ?>

        
        </table>

        <div class="cart-total">
            <table>
                <tr>
                    <td>Total</td>
                    <td>RM <?php echo $_SESSION['total']; ?></td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
            <form method="POST" action="checkout.php">
            <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">
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
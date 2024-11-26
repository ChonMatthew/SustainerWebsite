<?php
session_start();
include('../server/connection.php');

if(isset($_GET['logout'])) {

  if(isset($_SESSION['logged_in'])) {
      unset($_SESSION['logged_in']);
      unset($_SESSION['user_name']);
      unset($_SESSION['email']);
      session_destroy();
      header('Location: ../login_form.php');
      exit;
    }
  }
?>

<?php 

if(isset($_GET['order_id'])) {

    $order_id = $_GET['order_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id =?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $orders = $stmt->get_result();

} else if (isset($_POST['edit_order_btn'])) {

    $order_id = $_POST['order_id'];
    $user_address = $_POST['address'];
    $user_city = $_POST['city'];
    $user_phone = $_POST['phone'];
    $order_status = $_POST['order_status'];


    $stmt = $conn->prepare("UPDATE orders SET order_status=?, user_phone=?, user_city=?, user_address=?
                              WHERE order_id =?");
    $stmt->bind_param('sissi', $order_status, $user_phone, $user_city, $user_address, $order_id);
    if($stmt->execute()) {
        header("Location: Sustainer_Dashboard.php?edit_success_message=The Order has been Updated Successfully");

    } else {
        header("Location: Sustainer_Dashboard.php?edit_failure_message=The Order has failed to Updated");
    }
    
} else {
    header('Location: Sustainer_Dashboard.php');
    exit;
}


?>


<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Sustainer Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="../assets/css/stylesheet.css">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top navbar-custom">
      <div class="container">
          <a class="navbar-brand nav-buttons" href="">
              <img src="../assets/images/Index/Nav_Logo.png" width="80" height="100%">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mb-2 mb-lg-0">
              </ul>
          </div>
      </div>
  </nav>

<div class="container-fluid">
  <div class="row">

  <!-- Sidebar -->
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="Sustainer_Dashboard.php">
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="Dashboard_Products.php">
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="Dashboard_User.php">
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="Dashboard_User.php">
                Contact Form
              </a>
            </li>
          </ul>

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
            <a class="logout nav-link d-flex align-items-center gap-2" href="Sustainer_Dashboard.php?logout=1">
                Sign out
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Sustainer Admin Dashboard</h1>
      </div>

      <h2>Orders</h2>
      <div class="table-responsive small">
        
        <div class="mx-auto container">
            <form id="edit-form" method="POST" action="edit_order.php">
                <p style="color: red;" ><?php if(isset($_GET['error'])) { echo $_GET['error'];} ?></p>
                <div class="form-group mt-2">

                <?php foreach($orders as $order) { ?>

                    <input type="hidden" name="order_id" value="<?php echo $order['order_id'];?>">

                    <label>User Address</label>
                    <input type="text" class="form-control" id="user_address" value="<?php echo $order['user_address']; ?>" name="address" placeholder="User Address" required>
                </div>
                <div class="form-group mt-2">
                    <label>User City</label>
                    <input type="text" class="form-control" id="user_city" value="<?php echo $order['user_city']; ?>" name="city" placeholder="User City" required>
                </div>
                <div class="form-group mt-2">
                    <label>User Phone (+60)</label>
                    <input type="int" class="form-control" id="user_phone" value="<?php echo $order['user_phone']; ?>" name="phone" placeholder="User Phone" required>
                </div>
                <div class="form-group mt-2">
                    <label>Order Status</label>
                    <select class="form-select" required name="order_status">
                        <option value="on_hold">On Hold</option>
                        <option value="paid">Paid</option>
                        <option value="delivere">Delivered</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" name="edit_order_btn" value="Edit">
                </div>

                <?php } ?>

            </form>
        </div>
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>

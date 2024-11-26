<?php

session_start();
include('../server/connection.php');

if (isset($_GET['logout'])) {

  if (isset($_SESSION['logged_in'])) {
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

$stmt = $conn->prepare("SELECT * FROM orders");

$stmt->execute();

$orders = $stmt->get_result();

?>


<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Sustainer Admin</title>

  <link href="../assets/css/stylesheet.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
  <nav class="navbar navbar-expand-lg sticky-top navbar-custom">
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
                <a class="nav-link d-flex align-items-center gap-2" href="Dashboard_Contact.php">
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
        <?php if (isset($_GET['edit_success_message'])) { ?>
          <p class="text-center" style="color: green;"><?php echo $_GET['edit_success_message']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['edit_failure_message'])) { ?>
          <p class="text-center" style="color: red;"><?php echo $_GET['edit_failure_message']; ?></p>
        <?php } ?>
        <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Order Status</th>
                <th scope="col">User ID</th>
                <th scope="col">Order Date</th>
                <th scope="col">User Phone</th>
                <th scope="col">User City</th>
                <th scope="col">User Address</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($orders as $order) { ?>
                <tr>
                  <td><?php echo $order['order_id']; ?></td>
                  <td><?php echo $order['order_status']; ?></td>
                  <td><?php echo $order['user_id']; ?></td>
                  <td><?php echo $order['order_date']; ?></td>
                  <td><?php echo $order['user_phone']; ?></td>
                  <td><?php echo $order['user_city']; ?></td>
                  <td><?php echo $order['user_address']; ?></td>

                  <td><a class="btn btn-primary" href="edit_order.php?order_id=<?php echo $order['order_id']; ?>">Edit</a></td>
                </tr>

              <?php } ?>

            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>
<?php

session_start();

if(!isset($_SESSION['logged_in'])) {
    header('Location: login_form.php');
    exit;
}

if(isset($_GET['logout'])) {

    if(isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_name']);
        unset($_SESSION['email']);
        unset($_SESSION['user_id']);
        session_destroy();
        header('Location: login_form.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile Page</title>

  <!-- Link to CSS -->
  <link rel="stylesheet" href="assets/css/stylesheet_jay.css">
  <script src="https://kit.fontawesome.com/102f6b864c.js" crossorigin="anonymous"></script>
  
</head>

<body>

  <div class="nav_menu">
    <!-- Link to the home page -->
    <a class="home" href="index.php">HOME</a>

    <!-- Link to the logout script -->
    <a class="logout" href="account.php?logout=1">LOGOUT</a>
  </div>

  <div class="content-container">
    <div class="content">
      <div class="centered-group">
        <div class="profile-container">
          <img src="assets/images/account/user.png" class="profile-pic">
          <div class="user-info">
            <p class="user"><?php if(isset($_SESSION['user_name'])) {echo $_SESSION['user_name'];} ?></p>
            <p class="user"><?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];}?></p>
          </div>
        </div>

        <div class="points-container">
          <img src="assets/images/account/sustainer.png" class="profile-pic">
          <div class="points-info">
            <p class="points-amount"> POINTS: 587 pts</p>
            <hr>
            <p class="vouchers-label">Cash Vouchers:</p>
            <span class="vouchers-amount">10</span>
            <p class="tier-label">TIER 1 &gt;</p>
          </div>
        </div>
      </div>

      <a type="submit" class="edit-button" href="server/edit_profile.php">Edit Profile</a>



      <div class="rest-container">
        <hr>
        <ul class="tier-list">
          <li class="active" onclick="showSection('1-section')">TIER 1</li>
          <li onclick="showSection('2-section')">TIER 2</li>
          <li onclick="showSection('3-section')">TIER 3</li>
        </ul>
        <hr>

        <div class="description" id="1-section">
          <div class="offer-container">
            <h2>Become a super sustainer when you order more products of sustainable sustainers!</h2>
            <div class="benefit">
              <img src="assets/images/account/free.png">
              <div class="benefit-info">
                <h3>FREEBIES</h3>
                <p>Enjoy 1x complementary shopping bag made out of recycle materials</p>
              </div>
            </div>

            <div class="benefit">
              <img src="assets/images/account/cvoucher.png">
              <div class="benefit-info">
                <h3>CASH VOUCHERS</h3>
                <p>Enjoy up to 10% cash vouchers</p>
              </div>
            </div>
          </div>
        </div>

        <div class="description" id="2-section">
          <div class="offer-container">
            <h2>Become a super sustainer when you order more products of sustainable sustainers!</h2>
            <div class="benefit">
              <img src="assets/images/account/free.png">
              <div class="benefit-info">
                <h3>FREEBIES</h3>
                <p>Enjoy 1x complementary shopping bag made out of recycle materials</p>
              </div>
            </div>

            <div class="benefit">
              <img src="assets/images/account/cvoucher.png">
              <div class="benefit-info">
                <h3>CASH VOUCHERS</h3>
                <p>Enjoy up to 20% cash vouchers</p>
              </div>
            </div>

            <div class="benefit">
              <img src="assets/images/account/points.png">
              <div class="benefit-info">
                <h3>SUSTAINER POINTS</h3>
                <p>Earn 2x SUSTAINER Point for every RM1 spent</p>
              </div>
            </div>

            <div class="benefit">
              <img src="assets/images/account/birthday.png">
              <div class="benefit-info">
                <h3>BIRTHDAY DISCOUNTS</h3>
                <p>Buy 1 Free 1 a SUSTAINER product on your special day!</p>
              </div>
            </div>

          </div>
        </div>

        <div class="description" id="3-section">
          <div class="offer-container">
            <h2>Become a super sustainer when you order more products of sustainable sustainers!</h2>
            <div class="benefit">
              <img src="assets/images/account/free.png">
              <div class="benefit-info">
                <h3>FREEBIES</h3>
                <p>Enjoy 1x complementary shopping bag made out of recycle materials</p>
              </div>
            </div>

            <div class="benefit">
              <img src="assets/images/account/cvoucher.png">
              <div class="benefit-info">
                <h3>CASH VOUCHERS</h3>
                <p>Enjoy up to 20% cash vouchers</p>
              </div>
            </div>

            <div class="benefit">
              <img src="assets/images/account/points.png">
              <div class="benefit-info">
                <h3>SUSTAINER POINTS</h3>
                <p>Earn 2x SUSTAINER Point for every RM1 spent</p>
              </div>
            </div>

            <div class="benefit">
              <img src="assets/images/account/birthday.png">
              <div class="benefit-info">
                <h3>BIRTHDAY DISCOUNTS</h3>
                <p>Buy 1 Free 1 a SUSTAINER product on your special day!</p>
              </div>
            </div>

            <div class="benefit">
              <img src="assets/images/account/vip.png">
              <div class="benefit-info">
                <h3>VIP Access</h3>
                <p>Exclusive invitations to Grand Launch events!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script>
  function makeActive(event) {
    // Remove the 'active' class from all list items
    var items = document.querySelectorAll('.tier-list li');
    items.forEach(function(item) {
      item.classList.remove('active');
    });

    // Add the 'active' class to the clicked list item
    event.target.classList.add('active');
  }

  // Function to show a section and highlight the active list item
  function showSection(sectionId) {
    // Hide all sections
    var sections = document.querySelectorAll('.description');
    sections.forEach(function(section) {
      section.style.display = 'none';
    });

    // Remove the 'active' class from all list items
    var items = document.querySelectorAll('.tier-list li');
    items.forEach(function(item) {
      item.classList.remove('active');
    });

    // Show the selected section and add 'active' class to the clicked list item
    document.getElementById(sectionId).style.display = 'block';
    document.querySelector('.tier-list li[onclick="showSection(\'' + sectionId + '\')"]').classList.add('active');
  }

  // Call showSection for 'freebies-section' when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    showSection('1-section');
  });
</script>

</body>

</html>
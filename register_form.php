<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('server/connection.php');
 

if(isset($_POST['register'])) {

    $emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = ($_POST['password']);
    $confirm_password = ($_POST['confirm_password']);

    // if passwords dont match
    if($password !== $confirm_password) {
        header('location: register_form.php?error=passwords do not match');
    

    // if password is less than 6 character
    } else if(strlen($password) < 6) {
        header('location: register_form.php?error=password must be at least 6 characters');
    

        // if Email Address is in a wrong format
    } else if(!preg_match($emailPattern, $email)) {
        header('location: register_form.php?error=Email should be in "user@email.com" format');
    

    // if there is no format error
    } else {
            $stmt1 = $conn->prepare("SELECT count(*) FROM user_form WHERE email=?");
            $stmt1->bind_param('s', $email);
            $stmt1->execute();
            $stmt1->bind_result($num_rows);
            $stmt1->store_result();
            $stmt1->fetch();

         if($num_rows != 0) {
            header('location: register_form.php?error=User with this email already exists');
        
        } else {
                $stmt = $conn->prepare("INSERT INTO user_form (user_name, email, user_password) 
                        VALUES (?,?,?)");

                $stmt->bind_param('sss', $name, $email, md5($password));

                if ($stmt->execute()) {
                    $user_id = $stmt->insert_id;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['email'] = $email;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['logged_in'] = true;
                    header('location: account.php?register=You Registered Successfully');
        
                } else {
                    header('location: register_form.php?error=Could Not Register');
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>

    <script src="https://kit.fontawesome.com/102f6b864c.js" crossorigin="anonymous"></script>

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="assets/css/userstyle.css">
</head>
<body>

    <div class="form-container">
        <form action="register_form.php" method="POST" enctype="multipart/form-data">
            <div class="header-container">
            <header>REGISTER AN ACCOUNT</header>
            <a href="index.php"><i class="fa fa-close"></i></a>
            </div>


            <!-- Form -->
            <label class="subheading">FULL NAME</label>
            <input type="text" name="name" required placeholder="Full Name">

            <label class="subheading">EMAIL</label>
            <input type="email" name="email" required placeholder="Email">

            <label class="subheading">PASSWORD</label>
            <input type="password" name="password" required placeholder="Password">

            <label class="subheading">CONFIRM PASSWORD</label>
            <input type="password" name="confirm_password" required placeholder="Repeat Password">

            <input type="submit" name="register" value="REGISTER NOW" class="form-btn">
                        
            <!-- Show Error -->
                        <?php
            if(isset($_GET['error'])) { echo $_GET['error']; }
            
            ?>
            
            <p>Already have an account? <a href="login_form.php">Login now</a></p>
        </form>
    </div>
</body>
</html>

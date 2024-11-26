<?php
session_start();
include('server/connection.php');

if(isset($_SESSION['logged_in'])) {
    header('Location: account.php');
    exit;
}

if(isset($_POST['login_btn'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $select = " SELECT * FROM user_form WHERE email = '$email' && user_password = '$password'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['logged_in'] = true;
            header('Location: admin/Sustainer_Dashboard.php');

        }else if($row['user_type'] == 'user'){

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['logged_in'] = true;
            header('Location: account.php');

        }
    }else{
        $error[] = "Incorrect email or password!";
    }
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <script src="https://kit.fontawesome.com/102f6b864c.js" crossorigin="anonymous"></script>

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="assets/css/userstyle.css">

</head>

<body>
    
    <div class="form-container">
        <form action="login_form.php" method="POST">
            <div class="header-container">
            <header>LOGIN</header>
            <a href="index.php"><i class="fa fa-close"></i></a>
            </div>
    
            <div class="login-form">
                <label class="subheading">EMAIL</label>
                <input type="email" name="email" required placeholder="Email">

                <label class="subheading">PASSWORD</label>
                <input type="password" name="password" required placeholder="Password">

                <input type="submit" name="login_btn" value="LOGIN NOW" class="form-btn">
                
            <?php 
            if(isset($_GET['error'])) { echo $_GET['error'];}
            
            // if(isset($error)){
            //     foreach($error as $error){
            //         echo '<span class="error-msg">'.$error.'</span>';
            //     };
            // };

            ?>
                <p>Don't have an account? <a href="register_form.php">Register now</a></p>
            </form>
    </div>
    </div>


</body>
</html>
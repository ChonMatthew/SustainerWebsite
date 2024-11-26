<?php 
session_start();
include('../server/connection.php');

      if(isset($_GET['user_id'])){
            $user_id = $_GET['user_id'];
            $stmt = $conn->prepare("DELETE FROM user_form WHERE user_id=?");
            $stmt->bind_param('i', $user_id);

        if($stmt->execute()){
            header('location: Dashboard_User.php?deleted_successfully=Successfully Deleted User!');
        }else{
            header('location: Dashboard_User.php?deleted_failure=Could not delete user.');
        }
    }
?>  

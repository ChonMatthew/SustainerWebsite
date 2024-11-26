<?php 

session_start();
include('../server/connection.php');


?>

<?php

      if(isset($_GET['product_id'])){
            $product_id = $_GET['product_id'];
            $stmt = $conn->prepare("DELETE FROM products WHERE product_id=?");
            $stmt->bind_param('i', $product_id);

        if($stmt->execute()){
            header('location: Dashboard_Products.php?deleted_successfully=Successfully Resolved Form!');
        }else{
            header('location: Dashboard_Products.php?deleted_failure=Error Happened!.');
        }
    }
?>  

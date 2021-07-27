<?php
include ('connections.php');
  if(isset($_GET['id'])){
      $id=$_GET['id'];
    $sql="DELETE FROM product WHERE product_id=$id";
    
    if(mysqli_query($conn, $sql)){
        header("location:http://localhost/foodmall/components/viewproduct.php");
    }
}

?>
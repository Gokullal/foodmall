<?php
session_start();
include ('connections.php');
  if(isset($_GET['pid'])){
      $pid=$_GET['pid'];
      $table=$_SESSION['table'];
      $username=$_SESSION["username"];

      $id=$_SESSION['shop_id'];
      $ownername=$_SESSION['ownername'];
      $name=$_SESSION['shop_name'];

    $sql="UPDATE $table SET status=0,booked_id=0 where sl_no=$pid";
    if(mysqli_query($conn, $sql)){
        header("location:http://localhost/foodmall/components/viewtable.php");   
    }
  
}

?>
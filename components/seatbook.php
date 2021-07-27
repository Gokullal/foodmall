<?php
session_start();
include ('connections.php');
  if(isset($_GET['pid'])){
      $pid=$_GET['pid'];
      $table=$_GET['table'];
      $username=$_GET['username'];

      $id=$_SESSION['shopid'];
      $ownername=$_SESSION['ownername'];
      $name=$_SESSION['name'];

    $sql="UPDATE $table SET status=1,booked_id='$username' where sl_no=$pid";
    if(mysqli_query($conn, $sql)){
        header("location:http://localhost/foodmall/components/userseatbooking.php?id=$id&name=$name&ownername=$ownername");   
    }
  
}

?>
<?php
 // Create connection
 $conn = new mysqli("localhost", "root", "", "foodmall");
 if(!$conn){
 die('Could not connect: '.mysqli_connect_error());
 }

?>
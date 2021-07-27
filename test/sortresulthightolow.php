<?php
session_start();
$conn=mysqli_connect('localhost','root','root123456','zebodo');
$search=$_SESSION["search"];
$sql = "SELECT * FROM product WHERE category like '%{$search}%' || name like '%{$search}%' ORDER BY quantity DESC";
$result = mysqli_query($conn,$sql);

while($rows = mysqli_fetch_assoc($result))
{       
    print $rows['name'].$rows['quantity'] ."<br>";
}

?>
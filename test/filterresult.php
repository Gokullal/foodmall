<?php
session_start();
$conn=mysqli_connect('localhost','root','root123456','zebodo');
$search=$_SESSION["search"];
$pricelow=$_SESSION["pricelow"];
$sql = "SELECT * FROM product WHERE quantity < $pricelow AND category like '%{$search}%' || name like '%{$search}%' ";
print $pricelow;
$result = mysqli_query($conn,$sql);

while($rows = mysqli_fetch_assoc($result))
{       
    print $rows['name'].$rows['quantity'] ."<br>";
}

?>
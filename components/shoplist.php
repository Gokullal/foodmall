<?php
session_start();
$userid=$_SESSION["username"];
$pincode=$_SESSION['pincode'];
include ('connections.php');
?>
<html lang="en">
<head>
    <title>Shop list</title>
    <link type="text/css" rel="stylesheet" href="http://localhost/foodmall/css/userbooking.css">
</head>
<body id="booking-body">
<?php include ('../components/headerhomepage.php'); ?>
    <div id="booking-container">
    <table id="booking-table">
        <?php
        $sql="SELECT * FROM shopreg  WHERE pincode=$pincode";
        $result=$conn->query($sql);
        if(mysqli_num_rows($result)<=0){
            ?>
                <div id="no-items" align="center">
                    <img src="http://localhost/foodmall/images/noitems.png" id="no-items-image">
                    <a href="http://localhost/foodmall/components/userlandingpage.php" id="shop-now">Shop now</a>
                </div>
            <?php
                }
                else{

        while($row=$result->fetch_assoc()){
            $id=$row['shop_id'];
            
        ?>
       
        <tr>
        
        <form method="POST">
            <td id="booking-image-td">
                <img src="<?php echo $row['picture'];?>" id="product-image">
            </td>
            <td id="booking-seller-td">
                <div id="booking-seller"><?php echo $row['name'];?></div>
            </td>
            <td id="booking-details-td"> 
                <div  id="booking-name"><?php echo $row['district'];?></div><br>
                <div id="booking-price"> <?php echo $row['locality'];?></div>
            </td>
         
            <td id="booking-cancel-td">
            <?php
               echo "<div class='product-spec1' >
                   <a href='http://localhost/foodmall/components/shopview.php?id=$id'  style='background-color: rgb(49, 49, 255);' id='cancel-book'>View shop</a>
                    </div>";
                ?>
            </td>
   
          
         
          
         
          
            </form>
            
        </tr>
        
        <?php
            }
        }
        ?>
      
    </table>
    
    </div>
    <?php include ('../components/footer.php'); ?>
        
</body>
</html>
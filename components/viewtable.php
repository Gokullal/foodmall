<?php
session_start();
include ('connections.php');
$username=$_SESSION["username"];
$password=$_SESSION["password"];
$id=$_SESSION['shop_id'];
$ownername=$_SESSION['ownername'];
$name=$_SESSION['shop_name'];
$tablename=$ownername.$id;
$_SESSION['table']=$tablename;
$sql="SELECT * FROM $tablename";
$result=$conn->query($sql);

if(mysqli_num_rows($result)<=0){
?>
    <div id="no-items" align="center">
        <img src="http://localhost/foodmall/images/noitems.png" id="no-items-image">
        <a href="http://localhost/foodmall/components/shoplandingpage.php" id="shop-now">No Registered Shops</a>
    </div>
    <?php
       }
      else{            
    ?>
<html>
    <head>
        <title>
            seatbooking
        </title>
        <link type="text/css" rel="stylesheet" href="http://localhost/foodmall/css/userseatbooking.css">
    </head>
    <body id="profile-body">
        <?php include ('../components/shopheader.php'); ?>
        <div id="labelcontainer">
          <div style=" background-color:green; margin-left:150px;" id="colorlabel">Booked</div>
          <div style=" background-color:#b2beb5;"  id="colorlabel">Not booked</div>
        </div>
     

        <div id="profile-container">
          <div id="profile-heading"><h1 id="heading-text"><?php echo $name;?></h1></div>
          <div id="profile-details">
            <br>
            <?php
            while($row=$result->fetch_assoc()){ 
              if($row['status']==0)
              {
                $pid=$row['sl_no'];
                echo '<div id="table_container" style=" background-color:#b2beb5; height:390px; margin-bottom:10px;">
                  <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:390px;">
                    <img src="'. $row['picture'] .'" alt="" class="img-responsive" id="table_picture" style="height:300px">
                    <p align="center">'. $row['Table_type'] .'</p>
                    <p align="center">No booking</p>
      
                  </div>
          
                </div>
            
                ';
              } 
              else{
             
                $pid=$row['sl_no'];
                echo "
                <a href='http://localhost/foodmall/components/seatremoval1.php?pid=$pid'>
                ";
          
                echo '<div style=" background-color: green; height:390px; margin-bottom:10px;" id="table_container" >
                  <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:390px;">
                    <img src="'. $row['picture'] .'" alt="" class="img-responsive" id="table_picture" style="height:300px">
                    <p align="center" style="text-decoration:none; color:black;">'. $row['Table_type'] .'</p>
                    <p align="center" style="text-decoration:none; color:black;">'. $row['booked_id'] .'</p>
      
                  </div>
          
                </div>
                </a>
                ';


              }
            }
            ?>
          </div>
        
        </div>
        <?php 
       
      }
        ?>
        <?php include ('../components/footer.php'); ?>
       

    </body>
  
</html>
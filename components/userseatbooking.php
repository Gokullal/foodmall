<?php
session_start();
include ('connections.php');
$username=$_SESSION["username"];
$password=$_SESSION["password"];
$id=$_GET['id'];
$_SESSION['shopid']=$id;
$ownername=$_GET['ownername'];
$_SESSION['ownername']=$ownername;
$name=$_GET['name'];
$_SESSION['name']=$name;
$tablename=$ownername.$id;
$sql="SELECT * FROM $tablename";
$result=$conn->query($sql);

if(mysqli_num_rows($result)<=0){
?>
    <div id="no-items" align="center">
        <img src="http://localhost/foodmall/images/noitems.png" id="no-items-image">
        <a href="http://localhost/foodmall/components/userlandingpage.php" id="shop-now">No Registered Shops</a>
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
        <?php include ('../components/headerhomepage.php'); ?>
        <div id="labelcontainer">
          <div id="colorlabel">Available</div>
          <div style=" background-color:green;" id="colorlabel">Booked</div>
          <div style=" background-color:#b2beb5;"  id="colorlabel">Booked by someone else</div>
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
                echo "
                <a href='http://localhost/foodmall/components/seatbook.php?pid=$pid&table=$tablename&username=$username'>
                ";
          
                echo '<div id="table_container" style="height:350px;margin-bottom:10px;">
                  <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:350px;">
                    <img src="'. $row['picture'] .'" alt="" class="img-responsive" id="table_picture" style="height:300px">
                    <p align="center"><strong><a href="#">'. $row['Table_type'] .'</a></strong></p>
      
                  </div>
          
                </div>
                </a>
                ';
              } 
              elseif ($row['status']==1 and $row['booked_id']==$username) {
             
                $pid=$row['sl_no'];
                echo "
                <a href='http://localhost/foodmall/components/seatremoval.php?pid=$pid&table=$tablename&username=$username'>
                ";
          
                echo '<div style=" background-color: green; height:350px; margin-bottom:10px;" id="table_container" >
                  <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:350px;">
                    <img src="'. $row['picture'] .'" alt="" class="img-responsive" id="table_picture" style="height:300px">
                    <p align="center"><strong><a href="#">'. $row['Table_type'] .'</a></strong></p>
      
                  </div>
          
                </div>
                </a>
                ';


              }
              else{
              
             
              
          
                echo '<div id="table_container" style=" background-color:#b2beb5; height:350px; margin-bottom:10px;">
                  <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:350px;">
                    <img src="'. $row['picture'] .'" alt="" class="img-responsive" id="table_picture" style="height:300px">
                    <p align="center"><strong><a href="#">'. $row['Table_type'] .'</a></strong></p>
      
                  </div>
          
                </div>
            
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
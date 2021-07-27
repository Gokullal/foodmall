<?php
session_start();
include ('connections.php');
$username=$_SESSION["username"];
$password=$_SESSION["password"];
$id=$_GET['id'];
$sql="SELECT * from shopreg WHERE shop_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
$row = $result->fetch_assoc();
}
else {
  echo "0 results";
}
?>
<html>
    <head>
        <title>
            Profile
        </title>
        <link type="text/css" rel="stylesheet" href="http://localhost/foodmall/css/userprofile.css">
    </head>
    <body id="profile-body">
        <?php include ('../components/headerhomepage.php'); ?>
        <div id="profile-container">
        <img src="<?php echo $row['picture'];?>" alt="" class="img-responsive"  style="height:100px; border-radius:50%; margin:0px auto; display:block;">
          <div id="profile-details">
            <br>
            <table id="profile-table">
              <tr id="profile-row">
                <td id="profile-td">
                
                  <label id="profile-label"> Name</label><br>
                <div id="profile-item"><p id="profile-text"><?php print($row['name']); ?></p></div>
                
                </td>
                <td id="profile-td">
                  
                  <label id="profile-label">Owner name</label> <br>
                  <div id="profile-item"><p id="profile-text"><?php print($row['ownername']); ?></p></div>
                
                </td>
              </tr>
              <tr id="profile-row">
                <td id="profile-td">
                  
                  <label id="profile-label"> Email</label><br>
                  <div id="profile-item"><p id="profile-text"><?php print($row['email']); ?></p></div>
                
                </td>
                <td id="profile-td">
                  
                  <label id="profile-label">Pincode</label><br>
                  <div id="profile-item"><p id="profile-text"><?php print($row['pincode']); ?></p></div>
                
                </td>
              </tr>
            </table>
            <hr>
            <div id="change-links">
                <?php
                $name=$row['name'];
                $ownername=$row['ownername'];
                echo"
            <a href='http://localhost/foodmall/search/index2.php?search=$id' id='change-pincode'>View Products </a>
            <a href='http://localhost/foodmall/components/userseatbooking.php?id=$id&name=$name&ownername=$ownername'id='change-password'>Book table</a>
            "
            ?>
            </div>
        
          </div>
        
        </div>
        <?php include ('../components/footer.php'); ?>

    </body>
</html>
<?php
session_start();
include ('connections.php');
if(isset($_POST['submitchange'])){
    $username=$_SESSION["username"];
    $password=$_POST['password'];
    $newpincode=$_POST['new'];
    
    $sql="SELECT * FROM shopreg WHERE email='$username' OR phone='$username' AND password='$password' ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $mysql="UPDATE shopreg SET pincode='$newpincode' WHERE email='$username' OR phone='$username' AND password='$password'";
        if(mysqli_query($conn,$mysql)){
            echo '<script>alert("Pincode Updated Succesfully")</script>';
        }
    }
    else{
        echo '<script>alert("Incorrect Password")</script>';
    }
}
?>
<html>
    <head>
        <title>
            Change Pincode
        </title>
        <link type="text/css" rel="stylesheet" href="http://localhost/foodmall/css/change.css">
    </head>
    <body id="change-body">
        <?php include ('../components/shopheader.php'); ?>
        <div id="change-container">
        <h1 id="change-heading">Change Your Pincode</h1>
        <form method="POST">
            <div id="change-content">
                <div id="change-details">
                    <div id="change-details-item">
                        <label>Current Password:</label><br><input type="password" name="password" id="password"><br>
                    </div>  
                    <div id="change-details-item">
                        <label>New Pincode</label>  <br><input type="text" name="new" id="password"><br>
                    </div>
                    <div id="change-details-item">
                        <input type="submit" name="submitchange" id="submit">
                    </div>
                </div>
            </div>
            </form>
        </div>
        <?php include ('../components/footer.php'); ?>
    </body>
</html>
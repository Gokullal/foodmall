<?php
session_start();
$conn=mysqli_connect('localhost','root','root123456','zebodo');
      if(!$conn){
          echo "not connected";
      }
      else{
          $search="laptop";
          $_SESSION["search"]=$search;
         $sql = "SELECT * FROM product WHERE category like '%{$search}%' || name like '%{$search}%' ";
         $result = mysqli_query($conn,$sql);

         while($rows = mysqli_fetch_assoc($result))
         {       
             print $rows['name'].$rows['quantity'] ."<br>";
         }
        }

        if(isset($_POST['lessthan'])){
            $pricelow=$_POST['pricelow'];
            $_SESSION["pricelow"]=$pricelow;

            header("Location: http://localhost/zebodo/test/filterresult.php");
        }
        
        else if(isset($_POST['lessthan'])){
            $pricehigh=$_POST['pricehigh'];
            $_SESSION["pricehigh"]=$pricehigh;

            header("Location: http://localhost/zebodo/test/filterresult.php");
            
        }
        
?>
<html>
    <head>
        <title>search</title>
    </head>
    <body>
        <h1>sort</h1>
        <a href="http://localhost/zebodo/test/sortresultlowtohigh.php">low to high</a>
        <a href="http://localhost/zebodo/test/sortresulthightolow.php">high to low</a>
        <h1>filter</h1>
        <form method="post">
        <input type="submit" name="lessthan" value="lessthan"> <input type="text" name="pricelow" ><br>
        <input type="submit" name="greaterthan" value="greaterthan"> <input type="text" name="pricehigh">
            <br>
            
    </body>
</html>

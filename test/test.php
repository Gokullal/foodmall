<?php 
session_start();

?>
<html>
  <head>
    <style>
      #mail-body{
        background-color:#ed4370;
      }
      #mail-logo{
        height: 150px;
        margin: 40px 110px;
      }
      #mail-heading-container{
        width: 80%;
        margin-left: 10%;
        text-align: center;
      }
      #mail-heading{
        color: white;
        font-size: 6rem;
        font-weight: 800;
      }
      #mail-seller-name{
        background-color: #FCD283;
        color: black;
        height: 90px;
        margin: 0 auto;
        width: 50%;
        font-size: 4rem;
        text-align: center;
      }
      #mail-offer-date{
        background-color: white;
        color: black;
      
        margin: 0 auto;
        width: 80%;
        font-size: 4rem;
        text-align: center;
      }
      #mail-image{
        height:800px;
        margin-top: 150px;
        margin-left: 30%;
      }
      #mail-offer-price{
        background-color:black;
        color: white;
        height: 90px;
        margin: 0 auto;
        width: 50%;
        margin-top: 150px;
        font-size: 4rem;
        text-align: center;
      }
    </style>
  </head>

  <body id="mail-body">
  <img src="https://photos.smugmug.com/photos/i-SK8Z6hX/0/14614e9b/S/i-SK8Z6hX-S.png" id="mail-logo">
    <div id="mail-heading-container">
      <h1 id="mail-heading">'. $_SESSION['heading'] .'</h1>
    </div>
    <div id="mail-seller-name">'. $_SESSION['name'] .'</div>
    <div id="mail-offer-date">'. echo $_SESSION['date'] .'</div>
    <img src="https://photos.smugmug.com/photos/i-f7fR4h4/0/417a0edb/S/i-f7fR4h4-S.jpg" id="mail-image">
    <div id="mail-offer-price">Just  '. $_SESSION['price'] ,'</div>

          
        </body>
 
</html>


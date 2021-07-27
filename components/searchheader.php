<?php
include ('connections.php');

if(isset($_POST['searchbutton'])){
    $search=$_POST['search'];
    $_SESSION["search"] = $search;       
    header("Location: http://localhost/foodmall/search/");
}
?>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="http://localhost/foodmall/css/searchheader.css">  
    </head>
<body>
    <div id="navbar">
        <a  href="http://localhost/foodmall/components/userlandingpage.php">
            <img src="http://localhost/foodmall/images/logo.png" id="logo">
        </a>
        <div  id="navbarNavDropdown">
            <ul class="navbar-nav" >
                <li  id="navbar-item" >
                    <a  id="nav-link" href="http://localhost/foodmall/components/userprofile.php">Profile<span class="sr-only">(current)</span></a>
                </li>
                <li id="navbar-item">
                    <a  id="nav-link" href="http://localhost/foodmall/components/userreg.php">Bookings</a>
                </li>
                <li class="nav-item" id="navbar-item">
                    <a class="nav-link" href="http://localhost/foodmall/components/shoplist.php" style="text-decoration:none; color:white;">Shops near me</a>
                </li>
                <li id="navbar-item">
                    <a id="nav-link" href="http://localhost/foodmall/components/logout.php">Logout</a>
                </li>
                
            </ul>
        </div>
        <form id="form-search" method="POST">
            <input id="form-search-input" type="search" placeholder="Search" name="search" aria-label="Search">
            <button id="form-search-button" type="submit"  name="searchbutton" id="search-button">Search</button>
        </form>
    </div>
</body>
</html>
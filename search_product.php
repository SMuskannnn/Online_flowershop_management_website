<?php
    include('includes/connect.php');
    include('functions/functions.php');
    @session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Search section </title>
    <!--bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!--CSS file-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navigation bar -->
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg custom-background">
    
        <div class="container-fluid">
          <img src="./images/logo.jpg" alt=" " class="logo"></img>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://localhost/Flowershop/index.php?#"> <b>Home</b> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./admin_login.php"><b>Admin</b></a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#"> Contact </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="#"> <b>Sign up</b> </a>
              </li>
              <?php
                if(isset($_SESSION["user_username"])){
                  echo'<li class="nav-item">
                  <a class="nav-link" href="#"> <b>log out</b> </a>
                </li>';
                }else{
                  echo'<li class="nav-item">
                  <a class="nav-link" href="user_login.php"> <b>log in</b> </a>
                </li>';
                }
              ?>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup>1</sup> <b>cart</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <b>Contact</b>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#"><i class="fa fa-envelope" aria-hidden="true"></i> flowers@Everbloom.com</i></i>
</a></li>
                  <li><a class="dropdown-item" href="#"><i class="fa fa-phone-square" aria-hidden="true"></i> 333-4444-67</a></li>
                </ul>
            </ul>
            <form class="d-flex" role="search" method="GET" action="search_product.php">
              <input class="form-control me-2 custom-padding" type="search" placeholder="Search" aria-label="Search" name="search_data">
              <button class="btn btn-outline-success" type="submit" name="search_query">Search</button>
            </form>
          </div>
        </div>
      </nav> 
<!-- Welcome division -->
      <div class="container-fluid p-0 position-relative">
      <img src="./images/welcome.jpg" alt="" class="welcome-img"></img>
        <div class="overlay-text">
          <p><b>Your everyday flowers</b></p>
        </div>
      </div>
    </div>

<!-- Category section -->
    <div class="bg-light">
      <br>
      <h3 class="text-center"> <b>SEARCHED SECTION </b></h3>
      <br>
    </div>
<!--VARIOUS LILIES-->
<div class="container">
    <div class="row">
       <?php
      search_product();
       ?>
    </div>
</div>
<!-- Footer -->
<footer>
      <div class="foot p-3 custom-background">
        <p>All rights reserved &copy; Designed by Subu Muskan,2023</p>
      </div>
    </footer>
 
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

    




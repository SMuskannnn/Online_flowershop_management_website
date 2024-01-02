<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin section</title>
    <!--bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!--CSS file-->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- navigation  bar -->
    <div class="container-fluid p-0">
        <!--FIRST CHILD -->
        <nav class="navbar navbar-expand-lg custom-background">
            <div class="container-fluid">
                <a href="http://localhost/Flowershop/index.php?#"><img src="../images/logo.jpg" alt=" " class="logo"></img></a>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <?php
                        if(isset($_SESSION["admin_username"])){
                            echo '<li class="nav-item">
                                <a href="" class="nav-link">WELCOME ' . $_SESSION["admin_username"] . '</a>
                            </li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- SECOND CHILD -->
        <div>
            <h3 class="text-center p-2"><b>Manage Details</b></h3>
        </div>
        <div class="container-fluid p-0 position-relative">
            <img src="../images/welcome.jpg" alt="" class="welcome-img"></img>
        </div>
    
        <!-- BUTTONS -->
        <div class="row" style="background-color: #f2f2f2; height: 100px;">
            <div class="col-md-12 p-3">
                <div class="button text-center">
                    <button><a href="index.php?insert_category" class="nav-link" style="background-color:#FFDAB9;">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link" style="background-color:#FFDAB9;">View Categories</a></button>
                    <button><a href="insert_product.php" class="nav-link" style="background-color:#FFDAB9;">Insert Product</a></button>
                    <button><a href="index.php?view_products" class="nav-link" style="background-color:#FFDAB9;">View Products</a></button>
                    <button><a href="" class="nav-link" style="background-color:#FFDAB9;">All Orders</a></button>
                    <button><a href="" class="nav-link" style="background-color:#FFDAB9;">All payments</a></button>
                    <button><a href="" class="nav-link" style="background-color:#FFDAB9;">List Users</a></button>
                    <button><a href="" class="nav-link" style="background-color:#FFDAB9;">Log Out</a></button>
                </div>
            </div>
        </div>
<!-- Button functionality connection using php -->
    <div class="container my-3">
        <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
        ?>
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

<?php

?>
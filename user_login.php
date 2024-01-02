<?php
    @session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Login </title>
    <!--bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!--CSS file-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navigation  bar -->
    <div class="container-fluid p-0">
        <!--FIRST CHILD -->
        <nav class="navbar navbar-expand-lg custom-background">
            <div class="container-fluid">
                <a href="http://localhost/Flowershop/index.php?#"><img src="./images/logo.jpg" alt=" " class="logo"></img></a>
            </div>
        </nav>
    </div>
    <div class="container fluid m-auto">
        <h2 class="text-center my-3"><b>User Login</b></h2>
        <div class="row">
            <div class="col-lg-12-xl-6">
                <form action="" method="post">

                    <!--username-->
                    <div class="form-outline mb-3 w-50 m-auto" >
                        <label for="user_username" class="form label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
                         autocomplete="off" required="required" name = "user_username">
                    </div>                

                    <!--password-->
                    <div class="form-outline mb-3 w-50 m-auto" >
                        <label for="password" class="form label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
                         autocomplete="off" required="required" name = "user_password">
                    </div>

                    <!-- sign up button -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <input type="submit" class="border-1 p-2 my-3" name="user_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Do not have an account? 
                            <a href="user_registration.php" class="text-danger"> Register </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</body>
</html> 

<?php
    include("./includes/connect.php");
    global $user_username,$user_password;
    $_SESSION["user_username"]=$user_username;

    if (isset($_POST["user_login"])) {
        $user_username=$_POST["user_username"];
        $user_password=$_POST["user_password"];
        

        $query1="SELECT * from site_user where username='$user_username'";
        $result1=mysqli_query($con,$query1);
        $row1=mysqli_fetch_assoc($result1);

        if(mysqli_num_rows($result1)> 0){
            if(password_verify($user_password,$row1["password"])){
                $_SESSION["user_username"]=$user_username;
                echo "<script>alert('Logged in successfully')</script>";
                echo "<script>window.location.href = 'index.php';</script>";
                exit(); 
            }else {
                echo "<script>alert('INVALID CREDENTIALS')</script>";
            }
        }else{
            echo "<script>alert('INVALID CREDENTIALS')</script>";
        }

    }
    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Registration </title>
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
        <!-- FIRST CHILD -->
        <nav class="navbar navbar-expand-lg custom-background">
            <div class="container-fluid">
                <a href="http://localhost/Flowershop/index.php?#"><img src="./images/logo.jpg" alt=" " class="logo"></img></a>
            </div>
        </nav>
    </div>
    <div class="container fluid m-auto">
        <h2 class="text-center my-3"><b>New User Registration</b></h2>
        <div class="row">
            <div class="col-lg-12-xl-6">
                <form action="" method="post">
                    <!--user full name-->
                    <div class="form-outline mb-3 w-50 m-auto" >
                        <label for="user_full_name" class="form label">Full Name</label>
                        <input type="text" id="user_full_name" class="form-control" placeholder="Enter your full name"
                         autocomplete="off" required="required" name = "full_name">
                    </div>

                    <!--username-->
                    <div class="form-outline mb-3 w-50 m-auto" >
                        <label for="user_username" class="form label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
                         autocomplete="off" required="required" name = "user_username">
                    </div>

                    <!--user email-->
                    <div class="form-outline mb-3 w-50 m-auto" >
                        <label for="user_Email" class="form label">Email Address</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email"
                         autocomplete="off" required="required" name = "user_email">
                    </div>

                    <!--user phone number-->
                    <div class="form-outline mb-3 w-50 m-auto" >
                        <label for="user_contact" class="form label">Contact</label>
                        <input type="text" id="user_phone_number" class="form-control" placeholder="Enter your phone number"
                         autocomplete="off" required="required" name = "user_phone_number">
                    </div>

                    <!--user Address-->
                    <!-- <div class="form-outline mb-3 w-50 m-auto" >
                        <label for="user_username" class="form label">Address</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
                         autocomplete="off" required="required" name = "user_username">
                    </div> -->

                    <!--password-->
                    <div class="form-outline mb-3 w-50 m-auto" >
                        <label for="password" class="form label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
                         autocomplete="off" required="required" name = "user_password">
                    </div>

                    <!-- sign up button -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <input type="submit" class="border-1 p-2 my-3" name="user_register" value="Register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? 
                            <a href="user_login.php" class="text-danger"> Login </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</body>
</html>

<!-- php code -->
<?php
    include('./includes/connect.php');
?>
<?php
    global $con, $user_full_name, $user_username, $user_email, $user_password, $user_contact;
    if (isset($_POST['user_register'])) {
        $user_full_name = $_POST['full_name'];
        $user_username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_contact = $_POST['user_phone_number'];
        $user_password = $_POST['user_password'];
        $hashed_password=password_hash($user_password, PASSWORD_DEFAULT);
        $username_count_query = "SELECT * FROM  site_user where username='$user_username'";
        $username_count=mysqli_query($con, $username_count_query);

        $email_count_query = "SELECT * FROM  site_user where email_address='$user_email'";
        $email_count=mysqli_query($con, $username_count_query);

        if(mysqli_num_rows($username_count) == 0 || mysqli_num_rows($email_count)== 0) {

        // Get the last user_id
        $query = "SELECT MAX(SUBSTRING(id, 5)) AS max_id FROM site_user";
        $result = mysqli_query($con, $query);
        if ($result === false) {
            die("Query failed: " . mysqli_error($con));
        } else {
            $row = mysqli_fetch_assoc($result);
        $max_id = $row['max_id'];

        // Increment the ID
        $new_id = $max_id + 1;

        // Format the new ID as "userXXXX"
        $formatted_id = 'USER' . str_pad($new_id, 4, '0', STR_PAD_LEFT);
        }
        

        $sql_query = "INSERT INTO site_user (id, full_name, username, password, email_address, phone_number)
                  VALUES ('$formatted_id', '$user_full_name', '$user_username', '$hashed_password', '$user_email', '$user_contact')";
        $sql_execute = mysqli_query($con, $sql_query);

        if ($sql_execute) {
            echo "<script>alert('Registered successfully')</script>";
            echo "<script>window.location.href = 'user_login.php';</script>";
            exit(); // Stop execution after redirection

        } else {
            die(mysqli_error($con));
        }

   
    }else{
        echo "<script>alert('Username OR email already in use ')</script>";
    }
    mysqli_close($con);
}

?>

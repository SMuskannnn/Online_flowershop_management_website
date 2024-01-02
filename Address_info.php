<?php
    include('./includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Address </title>
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
        <h2 class="text-center my-3"><b>Address Information</b></h2>
        <div class="row">
            <div class="col-lg-12-xl-6">
                <form action="" method="post">
                    <!--Street number-->
                    <div class="form-outline mb-3 w-50 m-auto" >
                        <label for="street_number" class="form label">Street Number</label>
                        <input type="text" id="street_number" class="form-control" placeholder="Enter the street number"
                         autocomplete="off" required="required" name = "street_number">
                    </div>

                    <!--Address line-->
                    <div class="form-outline mb-3 w-50 m-auto" >
                        <label for="Address_line" class="form label">Address Line</label>
                        <input type="text" id="address_line" class="form-control" placeholder="Enter the address"
                         autocomplete="off" required="required" name = "address_line">
                    </div>

                    <!--City-->
                    <div class="form-outline mb-3 w-50 m-auto" >
                        <label for="City" class="form label">City</label>
                        <input type="city" id="city" class="form-control" placeholder="Enter the city name"
                         autocomplete="off" required="required" name = "city">
                    </div>

                    <!--Postal Code-->
                    <div class="form-outline mb-3 w-50 m-auto" >
                        <label for="postal_code" class="form label">Postal Code</label>
                        <input type="text" id="postal_code" class="form-control" placeholder="Enter your postal code"
                         autocomplete="off" required="required" name = "postal_code">
                    </div>

                    <!--user Address-->
                    <!-- <div class="form-outline mb-3 w-50 m-auto" >
                        <label for="user_username" class="form label">Address</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
                         autocomplete="off" required="required" name = "user_username">
                    </div> -->

                    <!--state id-->
                    <div class="form-outline mb-3 w-50 m-auto ">
                        <label for="state_id" class="form-label">State</label>
                        <select name="state_id" id="" class="form-select" style="color: #999;">
                            <option value="">Select state ID</option>
                    <!-- Dynamic PHP code -->
                            <?php
                                $select_query="select * from State";
                                $result_query=mysqli_query($con,$select_query);
                                while($row=mysqli_fetch_array($result_query)){
                                    $state_id=$row["id"];
                                    $state_name=$row["state_name"];
                                    echo "<option value='$state_id '>$state_name </option>";
                                }
                            ?>
                        </select>
                    </div>

                    <!-- sign up button -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <input type="submit" class="border-1 p-2 my-3" name="add_address" value="Add Address">
                    </div>
                </form>
            </div>
        </div>
    </div>


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</body>
</html>
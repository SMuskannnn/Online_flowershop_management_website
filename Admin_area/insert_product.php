<?php
    include('../includes/connect.php');
    global $product_id;
    if(isset($_POST['insert_product'])){
       // $product_id=$_POST['product_id'];
        $category_id=$_POST['category_id'];
        $name=$_POST['product_name'];
        $description=$_POST['description'];
       // $sku=$_POST['sku'];
        $qty_in_stock=$_POST['quantity'];
        $product_image=$_POST['image_path'];
        $price=$_POST['price'];
    
    //checking empty condition
    if( $category_id== '' || $name=='' || $qty_in_stock== '' || $product_image== '' || $price== '' ){
        echo "<script>alert('Please fill all the required fields')</script>";
        exit();
    }else{

        $query_prod = "SELECT MAX(SUBSTRING(id, 5)) AS max_id FROM Product_item";
        $result_prod = mysqli_query($con, $query_prod);
        if ($result_prod === false) {
            die("Query failed: " . mysqli_error($con));
        } else {
            $row1 = mysqli_fetch_assoc($result_prod);
            $max_id1 = $row1['max_id'];

        // Increment the ID
        $new_id1 = $max_id1 + 1;

        // Format the new ID as "userXXXX"
        $product_id = 'PROD' . str_pad($new_id1, 3, '0', STR_PAD_LEFT);
        }

        $querysku = "SELECT MAX(SUBSTRING(sku, 4)) AS max_id FROM Product_item";
        $resultsku = mysqli_query($con, $querysku);
        if ($resultsku === false) {
            die("Query failed: " . mysqli_error($con));
        } else {
            $row2 = mysqli_fetch_assoc($resultsku);
            $max_id2 = $row2['max_id'];

        // Increment the ID
        $new_id2 = $max_id2 + 1;

        // Format the new ID as "userXXXX"
        $sku = 'SKU' . str_pad($new_id2, 3, '0', STR_PAD_LEFT);
        }

        $insert_products="insert into Product_item (id,category_id,name,description,sku,qty_in_stock,product_image,price)
        values ('$product_id','$category_id','$name','$description','$sku','$qty_in_stock','$product_image','$price')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Product inserted successfully')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <!--bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!--CSS file-->
    <link rel="stylesheet" href="../style.css">
</head>
<body style="background-color: #f2f2f2;">
    <!-- navigation  bar -->
    <div class="container-fluid p-0">
        <!--FIRST CHILD -->
        <nav class="navbar navbar-expand-lg custom-background">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt=" " class="logo"></img>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav link">ADMIN_NAME</a>
                        </li> 
                        <li class="nav-item">      
                        <a href="./index.php" class="nav link me-auto mb-2 px-4 mb-lg-0">Back</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- INSERT PRODUCT FORM -->
        <style>
            ::placeholder {
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                font-size: 14px;
                color: #999;
            }
        </style>
        <h2 class="text-center my-3" >INSERT PRODUCTS</h2>
        <form action="" method="post">
            <!--PRODUCT ID -->
            <!-- <div class="form-outline mb-3 w-50 m-auto ">
                <label for="product_id" class="form-label">Product ID</label>
                <input type="text" name="product_id" id = "product_id" class="form-control" 
                placeholder="PROD*** format" autocomplete="off" required="required">
            </div> -->
            <!--PRODUCT CATEGORY ID-->
            <!-- MAKE THIS A DROP DOWN WITH AVAILABLE CATEGORY AS OPTIONS -->
            <div class="form-outline mb-3 w-50 m-auto ">
                <label for="category_id" class="form-label">Product category</label>
                <select name="category_id" id="" class="form-select" 
                style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;color: #999;">
                    <option value="">Select a category</option>
                    <!-- Dynamic PHP code -->
                    <?php
                        $select_query="select * from Product_Category";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_array($result_query)){
                            $category_id=$row["id"];
                            $category_name=$row["category_name"];
                            echo "<option value='$category_id '>$category_name </option>";
                        }
                    ?>
                </select>
            </div>
            <!--PRODUCT NAME -->
            <div class="form-outline mb-3 w-50 m-auto ">
                <label for="product_name" class="form-label">Product name</label>
                <input type="text" name="product_name" id = "product_name" class="form-control" 
                placeholder="enter product name" autocomplete="off" required="required">
            </div>
            <!--PRODUCT DESCRIPTION -->
            <div class="form-outline mb-3 w-50 m-auto ">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id = "description" class="form-control" 
                placeholder="enter product description" autocomplete="off" >
            </div>
            <!--PRODUCT SKU -->
            <!-- <div class="form-outline mb-3 w-50 m-auto ">
                <label for="sku" class="form-label">Product SKU</label>
                <input type="text" name="sku" id = "sku" class="form-control" 
                placeholder="enter product SKU" autocomplete="off" required="required">
            </div> -->
            <!--PRODUCT QUANTITY -->
            <div class="form-outline mb-3 w-50 m-auto ">
                <label for="quantity" class="form-label">Product Quantity</label>
                <input type="text" name="quantity" id = "quantity" class="form-control" 
                placeholder="enter number of products" autocomplete="off" required="required">
            </div>
            <!--PRODUCT IMAGE PATH -->
            <div class="form-outline mb-3 w-50 m-auto ">
                <label for="image_path" class="form-label">Product Image path</label>
                <input type="text" name="image_path" id = "image_path" class="form-control" 
                placeholder="enter image path" autocomplete="off" required="required">
            </div>
            <!--PRODUCT PRICE -->
            <div class="form-outline mb-4 w-50 m-auto ">
                <label for="price" class="form-label">Product price</label>
                <input type="text" name="price" id = "price" class="form-control" 
                placeholder="enter product price" autocomplete="off" required="required">
            </div>

            <!-- submit button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" class="border-1 p-2 my-3" name="insert_product" value="Insert Product">
            </div>
        </form>

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
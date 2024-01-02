<?php
    include('./includes/connect.php');
    global $con;
    session_start();
    if(isset($_GET["add_to_cart"])){
        global $user_id;
        if(isset($_SESSION["user_username"])) {
            $username = $_SESSION["user_username"];
            // Fetching user_id based on the username using a prepared statement
            $user_query = "SELECT id FROM site_user WHERE username = '$username'";
            $user_result = mysqli_query($con, $user_query);
            if ($user_result) {
                $row1 = mysqli_fetch_array($user_result);
                $_SESSION["user_id"] = $row1["id"];
                $user_id = $_SESSION["user_id"];
            }else{
                echo"<script>alert('NO user id found')</script>";
            }
        }else{
            echo"<script>alert('Please log in to update the cart')</script>";
        }
    }

    function getproducts($category_id){
        global $con,$product_quantity,$sum,$product_id;
        $sum=0;
        $sql = "SELECT id, product_image, name, description, price,qty_in_stock FROM Product_Item WHERE category_id = $category_id";
            $result = mysqli_query($con, $sql);

            // Check if query was successful and fetch image paths
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['id'];
                    $imagePath = $row['product_image'];
                    $productName = '<b>' . $row['name'] . '</b>';
                    $productDescription = $row['description'];
                    $productprice = $row['price'] . '$';
                    $product_quantity = $row['qty_in_stock'];

                    //check if product is out of stock
                    if($product_quantity>0){
                    // Generate card with fetched image paths
                    echo '<div class="col-md-4 mb-3">';
                    echo '<div class="card" style="width: 18rem;">';
                    echo '<img src="' . $imagePath . '" class="card-img-top" alt="Roses Image">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $productName . '</h5>';
                    echo '<p class="card-text">' . $productDescription . '</p>';
                    echo '<p class="currency">' . $productprice . '</p>';              
                    echo "<a href='?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>";
                    echo '</div></div></div>';
                    $sum = $sum + $product_quantity;
                    }
                }
                if($sum == 0){
                    echo '<div class=" m-auto" style="width: 18rem;font-size: 40px;" >';
                    echo '<span class="out-of-stock m-auto">Out of Stock</span>';
                    echo '</div>';
                }
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
            // Close your database connection after usage
            mysqli_close($con);
    }

    function search_product(){
        global $con,$product_quantity,$sum;
        $sum=0;
        if (isset($_GET['search_query'])) {
            $search_query = $_GET['search_data'];
            $search = "SELECT id,product_image, name, description, price,qty_in_stock FROM Product_Item WHERE name LIKE '%$search_query%'";
            $result = mysqli_query($con, $search);

            // Check if query was successful and fetch image paths
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['id'];
                    $imagePath = $row['product_image'];
                    $productName = '<b>' . $row['name'] . '</b>';
                    $productDescription = $row['description'];
                    $productprice = $row['price'] . '$';
                    $product_quantity = $row['qty_in_stock'];

                    //check if product is out of stock
                    if($product_quantity>0){
                    // Generate card with fetched image paths
                    echo '<div class="col-md-4 mb-3">';
                    echo '<div class="card" style="width: 18rem;">';
                    echo '<img src="' . $imagePath . '" class="card-img-top" alt="Roses Image">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $productName . '</h5>';
                    echo '<p class="card-text">' . $productDescription . '</p>';
                    echo '<p class="currency">' . $productprice . '</p>';
                    echo "<a href='?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>";
                    echo '</div></div></div>';
                    $sum = $sum + $product_quantity;
                    }
                }
                if($sum == 0){
                    echo '<div class=" m-auto" style="width: 18rem;font-size: 40px;" >';
                    echo '<span class="out-of-stock m-auto">Out of Stock</span>';
                    echo '</div>';
                }
            } else {
                echo "Error: " . $search . "<br>" . mysqli_error($con);
            }
            // Close your database connection after usage
            mysqli_close($con);
    }
    }

   

    function cart(){
        global $con;
        if(isset($_SESSION["user_username"])) {
            $username = $_SESSION["user_username"];
            $user_id = " ";
    
            // Fetching user_id based on the username using a prepared statement
            $user_query = "SELECT id FROM site_user WHERE username = '$username'";
            $user_result = mysqli_query($con, $user_query);
            if ($user_result) {
                $row1 = mysqli_fetch_array($user_result);
                $_SESSION["user_id"] = $row1["id"];
                $user_id = $_SESSION["user_id"];

                if(isset($_GET["add_to_cart"])){
                    $check_cart=("SELECT * FROM Shopping_Cart WHERE user_id = '$user_id'");
                    $check_cart_result = mysqli_query($con,$check_cart);
                    if (mysqli_num_rows($check_cart_result)== 0) {
                        // User doesn't have a cart, create one
                        $create_cart=("INSERT INTO Shopping_Cart (user_id) VALUES ('$user_id')");
                        $create_cart_result = mysqli_query($con,$create_cart);
                    }
                    //add products
                    $get_product_id=$_GET['add_to_cart'];
                    $get_all_products_query="select * from Product_item where id=$get_product_id";
                    $result_all_product = mysqli_query($con,$get_all_products_query);
                    $row2 = mysqli_fetch_array($result_all_product);
                    if(mysqli_num_rows($result_all_product)> 0) {
                        echo"<script>alert('product is present')</script>";
                    }

    }
}
}
    }


    
?>
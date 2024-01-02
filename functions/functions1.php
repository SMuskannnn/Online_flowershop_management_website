<?php
    include('./includes/connect.php');

    function getproducts($category_id){
        global $con;
        $sql = "SELECT product_image, name, description, price,qty_in_stock FROM Product_Item WHERE category_id = $category_id"; // Assuming category_id = 1 corresponds to roses
            $result = mysqli_query($con, $sql);

            // Check if query was successful and fetch image paths
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imagePath = $row['product_image'];
                    $productName = '<b>' . $row['name'] . '</b>';
                    $productDescription = $row['description'];
                    $productprice = $row['price'] . '$';
                    $product_quantity = $row['qty_in_stock'];

                    //check if product is out of stock
                    if($product_quantity<=0){
                        $out_of_stock_message='<span class="out-of-stock">Out of Stock</span>';
                    }else{
                        $out_of_stock_message= '';
                    }
                    // Generate card with fetched image paths
                    echo '<div class="col-md-4 mb-3">';
                    echo '<div class="card" style="width: 18rem;">';
                    echo '<img src="' . $imagePath . '" class="card-img-top" alt="Roses Image">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $productName . '</h5>';
                    echo '<p class="card-text">' . $productDescription . '</p>';
                    echo '<p class="currency">' . $productprice . '</p>';
                    echo '<a href="#" class="btn btn-primary">Add to cart</a>';
                    echo '<div class="m-auto">';
                    echo '<b>' . $out_of_stock_message . '</b>';
                    echo '</div></div></div></div>';
                }
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
            // Close your database connection after usage
            mysqli_close($con);
    }
?>
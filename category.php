<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_wishlist'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   
   $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_wishlist_numbers) > 0){
       $message[] = 'already added to wishlist';
   }elseif(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{
       mysqli_query($conn, "INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
       $message[] = 'product added to wishlist';
   }

}

if(isset($_POST['add_to_cart'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{

       $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

       if(mysqli_num_rows($check_wishlist_numbers) > 0){
           mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
       }

       mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
       $message[] = 'product added to cart';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Category Page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php include 'header.php'; ?>
<section class="heading">
    <h3>Products Categories</h3>
    <p> <a href="home.php">home</a> / products </p>
</section>

<section class="products">

  <!-- <h1 class="title">Products Categories</h1>-->

   <div class="box-container">

   <?php

                $searchTerm = $_GET['category'] ?? '';

                // Prepare the base SQL query
                $sql = "SELECT id,name,category,details,price,image FROM `products` WHERE category = '$searchTerm'";

                // Prepare the statement
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                // Bind the result variables
                $stmt->bind_result($id, $name, $category, $details, $price, $image);

                // Output buffer
                ob_start();


                // Fetch the results
                while ($stmt->fetch()) {
                    // Output the card HTML using the fetched variables
                ?>
                    <form action="" class="box" method="POST">
      <div class="price">Rs<span><?php echo $price; ?></span>/-</div>
      <a href="view_page.php?pid=<?php echo $id; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?php echo $image; ?>" alt="">
      <div class="name"><?php echo $name; ?></div>
      <input type="hidden" name="product_id" value="<?php echo $id; ?>">
      <input type="hidden" name="product_name" value="<?php echo $name; ?>">
      <input type="hidden" name="product_price" value="<?php echo $price; ?>">
      <input type="hidden" name="product_image" value="<?php echo $image; ?>">
      <input type="number" min="1" value="1" name="product_quantity" class="qty">
      <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
                <?php
                }

                // Get the buffered output
                $output = ob_get_clean();

                // Close the statement
                $stmt->close();

                // Output the buffered HTML
                echo $output;

                $conn->close();
                ?>

   </div>

</section>


<!---Add footer here--->
<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>

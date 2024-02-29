<!---Add php part here--->
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
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="widt=device-width, initial-scale= 1.0">

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <link rel="stylesheet"href ="style.css"/>
        <link rel="stylesheet" href="category1.css" />
        <title>Categories Page</title>
    </head>

   
<body>
   <!--Add header page ---->
    <?php @include 'header.php'; ?>

    <div class="grid-body">

     <div class="grid">
        <div class="grid-item">
            <div class="card">
                <img class="card-img" src="images/c1.jpg" alt="flower plant image" />
                <div class="card-content">
                    <h1 class="card-header">Flower Plants</h1>
                    <p class="card-text">We provide Our customers the best flower plants.</p>
                    <button class="card-btn"><a href="flowers.php"style="text-decoration:none;">See Now</a><span>&rarr;</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid-item">
            <div class="card">
                <img class="card-img" src="images/c2.jpeg" alt="fruit plant image" />
                <div class="card-content">
                    <h1 class="card-header">Fruit Plants</h1>
                    <p class="card-text">We provide Our customers the best fruit plants.</p>
                    <button class="card-btn"><a href="fruitplants.php"style="text-decoration:none;">See Now</a><span>&rarr;</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid-item">
            <div class="card">
                <img class="card-img" src="images/c3.jpeg" alt="vegetable plant image" />
                <div class="card-content">
                    <h1 class="card-header">Vegetable Plants</h1>
                    <p class="card-text">We provide Our customers the best vegetable plants.</p>
                    <button class="card-btn"><a href="vegetableplants.php"style="text-decoration:none;">See Now</a><span>&rarr;</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid-item">
            <div class="card">
                <img class="card-img" src="images/c4.jpeg" alt="herbal plant image" />
                <div class="card-content">
                    <h1 class="card-header">Herbal Plants</h1>
                    <p class="card-text">We provide Our customers the best herbal plants.</p>
                    <button class="card-btn"><a href="herbalplants.php"style="text-decoration:none;">See Now</a><span>&rarr;</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid-item">
            <div class="card">
                <img class="card-img" src="images/c5.jpeg" alt="pots image" />
                <div class="card-content">
                    <h1 class="card-header">Pots</h1>
                    <p class="card-text">We provide Our customers the best pots to grow plants.</p>
                    <button class="card-btn"><a href="pots.php"style="text-decoration:none;">See Now</a><span>&rarr;</span>
                    </button>        
                </div>
            </div>
        </div>

        <div class="grid-item">
            <div class="card">
                <img class="card-img" src="images/c6.jpeg" alt="fetilizers image" />
                <div class="card-content">
                    <h1 class="card-header">Fertilizers</h1>
                    <p class="card-text">We provide Our customers the best fertilizers.</p>
                    <button class="card-btn"><a href="fertilizer.php"style="text-decoration:none;">See Now</a><span>&rarr;</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid-item">
            <div class="card">
                <img class="card-img" src="images/c7.jpeg" alt="ornamental plant image" />
                <div class="card-content">
                    <h1 class="card-header">Ornamental Plants</h1>
                    <p class="card-text">We provide Our customers the best Ornamental plants.</p>
                    <button class="card-btn"><a href="ornamentalplant.php"style="text-decoration:none;">See Now</a><span>&rarr;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
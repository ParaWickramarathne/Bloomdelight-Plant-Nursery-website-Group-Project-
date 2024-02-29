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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="service1.css">
</head>

<body style = "background-color:rgb(207, 231, 167);" >
<!--Add internal styling to the title --->
   
<!--Add header page ---->
<?php @include 'header.php'; ?>

    <div class='wrapper-services'>
    <h1 style="font-size:70px; color:black; padding-left: 30px;">Our Services</h1>

<section class="swiper mySwiper">

    <div class="swiper-wrapper">

        <div class="card swiper-slide">
            <div class="card_image">
                <img src="images/organicfood.webp" alt="card image" width="150" height="200">
            </div>

            <div class="card_content">
                <span class="card_title">Fresh Organic Products</span>
                <span class="card_name">Get Our Fresh Products</span>
                <p class="card_text">Organic food, ecological food, or biological food are foods and drinks produced 
                                     by methods complying with the standards of organic farming.</p>
            
            </div>
            </div>

            <div class="card swiper-slide">
                <div class="card_image">
                    <img src="images/plantselling.avif" alt="card image" height="400" width="300">
                </div>

                <div class="card_content">
                    <span class="card_title">Get Best Natural Plants</span>
                    <span class="card_name">Get Our Natural Plants</span>
                    <p class="card_text">Plants are vital natural resources. Apart from providing food and oxygen, they provide raw materials which are processed for various purposes.
                    </p>
                   <!--- <button class="card_btn">View More</button>--->
                </div>
                </div>

                <div class="card swiper-slide">
                    <div class="card_image">
                        <img src="images/delivery2.png" alt="card image">
                    </div>

                    <div class="card_content">
                        <span class="card_title">Delivery Service</span>
                        <span class="card_name">Get Our Delivery Services</span>
                        <p class="card_text">The pickup of one or more local products from a local merchant and delivery of the local products to customers.
                        </p>
                        <!--<button class="card_btn">View More</button>-->
                    </div>
                    </div>

                    <div class="card swiper-slide">
                        <div class="card_image">
                            <img src="images/pay1.avif" alt="card image">
                        </div>
        
                        <div class="card_content">
                            <span class="card_title">Easy Payments</span>
                            <span class="card_name">Get Our Easy Payment Methods</span>
                            <p class="card_text">To make a payment, your simply selects the item they require and proceeds to pay.
                            </p>
                            <!--<button class="card_btn">View More</button>-->
                        </div>
                        </div>
         
     
 

            </div>     
                                
</section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->

  


  <script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 300,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  </script>

  <!---Connect footer section to the home page--->


  </body>
</html>
<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us Page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<!---About us first section--->
<section class="heading">
    <h3>About Us</h3>
    <p> <a href="home.php">home</a> / about </p>
</section>

<section class="hero">
          <!---  <div class="heading">
                <h1>About Us</h1>
            </div>-->
         <div class="container">
             <div class="hero-content">
                 <h2>Welcome To Our Website</h2>
                 <p>Welcome to The Bloom Delight! We grow fresh, natural, non-GMO plants and flowers in culinary, medicinal, 
                     aromatic, and rare herbs. We pride ourselves on adding to our online selection of herbs each season, 
                     a direct response to our customers' suggestions and wishes for their gardening needs. 
                     Our mission is to grow robust and healthy plants and flowers using the best environmentally friendly practices.
                </p>
                <button class="cta-button">Learn More</button>
             </div>
             <div class="hero-image">
                 <img src="images/aboutus.avif"width="500"height="300">
             </div>
         </div>
        </section>
<!--About us second section start here--->
<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/about-img-1.png" alt="">
        </div>

        <div class="content">
            <h3>Why Choose Us?</h3>
            <p>We got beautiful plants and fresh flowers.Customers can buy their favourite. </p>
            <a href="shop.php" class="btn">Shop Now</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>What We Provide?</h3>
            <p>We provide you the beautiful plants and fresh flowers.Connect customers </p>
            <a href="contact.php" class="btn">contact us</a>
        </div>

        <div class="image">
            <img src="images/about-img-2.jpg" alt="">
        </div>

    </div>

    <div class="flex">

        <div class="image">
            <img src="images/about-img-3.jpg" alt="">
        </div>

        <div class="content">
            <h3>who we are?</h3>
            <p>We are team Bloomdelight which is have a best cutomer market place in Sri Lanka For Plant selling.</p>
            <a href="review.php" class="btn">clients reviews</a>
        </div>

    </div>

</section>

<!---Add footer section to the page--->

<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
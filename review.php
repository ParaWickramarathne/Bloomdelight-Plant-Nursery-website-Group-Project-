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
   <title>Review page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="review.css">
  

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>Client's Reviews</h3>
    <p> <a href="home.php">home</a> / review </p>
</section>


<!---About us first section start here--->
<section class="review1">
      <div class="container">
       <div class="container__left">
          <h1 style="text-align: left;">Read what our Customers Reviews</h1>
          <!---Add the review page here to add customer reviews--->
          <button><a href="clientreview.php">Add your review Here</a></button>
        </div>
       
</section>

    <!---Review page second section start here---->
<section class="reviews" id="reviews">

    <h1 class="title">Client's Reviews</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/Customer3.jpeg" alt="">
            <p>I recommond everyone to buy their products. They provide me the best quality products. So it's really awesome.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Mr.Perera</h3>
        </div>

        <div class="box">
           <img src="images/Customer2.jpeg" alt="">
            <p>They provide a good service for everyone. So,as a customer i reccomond everyone to buy their products.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Mr.Ajith</h3>
        </div>

        <div class="box">
            <img src="images/Customer4.jpeg" alt="">
            <p>As a good customer i prefer their service and also they got the best products.So i recommond everyone.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Mrs.Perera</h3>
        </div>

        <div class="box">
            <img src="images/Customer5.jpeg" alt="">
            <p>Best plants and flowers in one place they have a good customer base.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Mr.Kanishka</h3>
        </div>

        <div class="box">
            <img src="images/Customer1.jpeg" alt="">
            <p>Quality product for everyone. I also got the best products from them. </p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Miss.Christina</h3>
        </div>

        <div class="box">
            <img src="images/Customer6.jpeg" alt="">
            <p>They provide a good online service and everyone can contact them to buy products.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Mrs.Maheema</h3>
        </div>

    </div>

</section>
<!--Adding customer review to the page--->

<!---Show new reviews here---->
<!---Add new reviews section here--->

<section class="products">

<h1 class="title">New Client's Reviews</h1>

<div class="box-container">

   <?php
      $select_review = mysqli_query($conn, "SELECT * FROM `reviews` LIMIT 6") or die('query failed');
      if(mysqli_num_rows($select_review) > 0){
         while($fetch_review = mysqli_fetch_assoc($select_review)){
   ?>
   <form action="" method="POST" class="box">
    
      <div><img src="uploaded_img/<?php echo $fetch_review['image']; ?>" alt="" class="image"></div>
      <div class="review"><?php echo $fetch_review['review']; ?></div>
      <div class="name"><?php echo $fetch_review['name']; ?></div>
     
      <input type="hidden" name="name" value="<?php echo $fetch_review['name']; ?>">
      <input type="hidden" name="image" value="<?php echo $fetch_review['image']; ?>">
      <input type="hidden" name="review" value="<?php echo $fetch_review['review']; ?>">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

</div>
</section>


<!---Add footer section here--->

<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>


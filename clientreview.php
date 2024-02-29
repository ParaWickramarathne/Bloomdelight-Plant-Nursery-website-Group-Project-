<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}
;

if (isset($_POST['send'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $review = mysqli_real_escape_string($conn, $_POST['review']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folter = 'uploaded_img/' . $image;


    $select_review = mysqli_query($conn, "SELECT * FROM `reviews` WHERE name = '$name' AND review = '$review' AND image = '$image'") or die('query failed');

    if (mysqli_num_rows($select_review) > 0) {
        $message[] = 'Your Feedback sent already!';
    } else {
        mysqli_query($conn, "INSERT INTO `reviews`(user_id, name, review , image) VALUES('$user_id', '$name', '$review', '$image')") or die('query failed');
        $message[] = 'Your Feedback sent successfully!';
        move_uploaded_file($image_tmp_name, $image_folter);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Review Adding Page</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- custom admin css file link  -->
        <link rel="stylesheet" href="style.css">

    </head>

    <body>

        <?php @include 'header.php'; ?>

        <section class="heading">
            <h3>Client's New Reviews</h3>
            <p> <a href="home.php">home</a> / new reviews </p>
        </section>

        <section class="contact">

            <form action="" method="POST" enctype="multipart/form-data">
                <h3>Give your Feedback!</h3>
                <input type="text" name="name" placeholder="Enter your name" class="box" required>
                <input type="file" name="image" required class="box" accept="image/jpg, image/jpeg, image/png">
                <textarea name="review" class="box" placeholder="Enter your review" required cols="30"
                    rows="10"></textarea>
                <input type="submit" value="Send" name="send" class="btn">
            </form>

        </section>


        <!--Connect footer section here--->

        <?php @include 'footer.php'; ?>

        <script src="js/script.js"></script>

    </body>

</html>
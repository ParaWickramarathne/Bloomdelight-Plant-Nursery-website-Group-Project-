<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

    <div class="flex">

        <a href="home.php" class="logo">BLOOM DELIGHT</a>

        <nav class="navbar">
            <ul>
                <li><a href="home.php">home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="#">Pages +</a>
                        <ul>
                                <li><a href="shop.php">Shop</a></li>
                                <li><a href="orders.php">Orders</a></li>
                                <li><a href="services.php">Services</a></li>
                            
                            </ul>
                    </li>
                <li><a href="#">Categories +</a>
                    <ul>
                        <li><a href="flowers.php">Flowers</a></li>
                        <li><a href="fruitplants.php">Fruit Plants</a></li>
                        <li><a href="vegetableplants.php">Vegetable Plants</a></li>
                        <li><a href="herbalplants.php">Herbal Plants</a></li>
                        <li><a href="pots.php">Pots</a></li>
                        <li><a href="fertilizer.php">Fertilizer</a></li>
                        <li><a href="category1.php">Categories</a></li>
                        <li><a href="ornamentalplant.php">Ornamental Plants</a></li>
                    </ul>
                </li>
                <li><a href="review.php">Review</a></li>
                <li><a href="contact.php">Contact</a></li>
               <!-- <li><a href="shop.php">shop</a></li>
                <li><a href="orders.php">orders</a></li>-->
                <li><a href="#">Account +</a>
                    <ul>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
                $select_wishlist_count = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
                $wishlist_num_rows = mysqli_num_rows($select_wishlist_count);
            ?>
            <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?php echo $wishlist_num_rows; ?>)</span></a>
            <?php
                $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                $cart_num_rows = mysqli_num_rows($select_cart_count);
            ?>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_num_rows; ?>)</span></a>
        </div>

        <div class="account-box">
            <p>Username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">Logout</a>
        </div>

    </div>

</header>
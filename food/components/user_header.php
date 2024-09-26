<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">
         <img src="images/logo.png" alt="Cafe Shop 😋">
      </a>

      <nav class="navbar">
         <a href="home.php">HOME</a>
         <a href="product.php">MENU</a>
         <a href="orders.php">ORDER</a>

      </nav>

      <div class="icons">
         <?php
         $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $count_cart_items->execute([$user_id]);
         $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="search.php"><i class="fas fa-search "></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(
               <?= $total_cart_items; ?>)
            </span></a>
            <div id="user-btn"> <i class="fas fa-user"></i></div>
            <div id="menu-btn"> <i class="fas fa-bars"></i></div>
      </div>

      <div class="profile">
         <?php
         $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_profile->execute([$user_id]);
         if ($select_profile->rowCount() > 0) {
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <p class="name">
               <?= $fetch_profile['name']; ?>
            </p>
            <div class="flex">
               <a style="margin-left: 10px;" href="profile.php" class="btn">profile</a>
               <a href="components/user_logout.php" onclick="return confirm('logout from this website?');"
                  class="delete-btn">logout</a>
            </div>

            <?php
         } else {
            ?>
            <p class="name">please login first!</p>
            <a href="login.php" class="btn">login</a>
            <?php
         }
         ?>
      </div>

   </section>

</header>

   <style>
   /* Make the parent container a flexbox */
   .icons {
      display: flex;           /* Display icons in a row */
      align-items: center;      /* Vertically center the icons */
      gap: 10px;                /* Add some space between the icons */
   }

   /* Style the individual icons */
   .icons i {
      font-size: 24px;          /* Increase the size of the icons */
   }

   /* Adjust the size of the cart item count */
   .icons span {
      font-size: 18px;
      margin-left: 5px;         /* Add some space between the cart icon and count */
   }

   /* Optional: Add some space around the clickable divs */
   #user-btn, #menu-btn {
      cursor: pointer;
   }
</style>
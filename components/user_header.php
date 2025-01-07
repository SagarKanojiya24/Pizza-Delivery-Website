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

<section class="flex">

   <a href="home.html" class="logo"><img src="images/logo.png " width="120" height="100" alt="logo"></a>

   <nav class="navbar">
      <a href="home.php">Home</a>
      <a href="about.php">About</a>
      <a href="menu.php">Menu</a>
      <a href="orders.php">Orders</a>
      <a href="contact.php">Contact</a>
   </nav>

   <div class="h-icons">
   <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="search.php"><i class="bx bx-search-alt"></i></a>
         <a href="cart.php"><i class="bx bx-cart"></i></a>
         <div id="user-btn" ><i class="bx bxs-user"></i></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>


      <div class="profile">
      <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>

         <div class="flex">
            <a href="profile.php" class="btn">profile</a>
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         </div>
         
         <?php
            }else{
         ?>
            <p class="name">please login first!</p>
            <a href="login.php" class="btn"> User login</a>
            <a href="admin/admin_login.php" class="btn"> Admin login</a>
         <?php
          }
         ?>
      </div>

   </section>

</header>

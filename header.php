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

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <?php if(isset($_SESSION['user_name'])): ?>
            <p>Bienvenue, <span><?php echo $_SESSION['user_name']; ?></span> | <a href="logout.php">Se déconnecter</a></p>
         <?php else: ?>
            <p> nouveau <a href="login.php">connexion</a> | <a href="register.php">s'inscrire</a> </p>
         <?php endif; ?>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <div class="div-img">
            <a  href="home.php" class="logo"><img style="width: 48px; height: 48px;" src="./images/logo-KLM.png"/></a>
         </div>
        

         <nav class="navbar">
            <a href="home.php">accueil</a>
            <a href="about.php">à propos</a>
            <a href="shop.php">boutique</a>
            <a href="contact.php">contact</a>
            <a href="orders.php">commandes</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <?php if(isset($_SESSION['user_name'])): ?>
            <div class="user-box">
               <p>nom d'utilisateur : <span><?php echo $_SESSION['user_name']; ?></span></p>
               <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
               <a href="logout.php" class="delete-btn">se déconnecter</a>
            </div>
         <?php endif; ?>
      </div>
   </div>

</header>
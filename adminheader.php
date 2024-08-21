<header class="header">

   <div class="flex">

      <a href="#" class="logo"> AdminPanel</a>

      <nav class="navbar">
         <a href="admin.php">add products</a>
         <a href="products.php">view products</a>
         <a href="admin_orders.php">Orders</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="logout.php" class="cart">Logout </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>
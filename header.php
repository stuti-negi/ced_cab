<?php
session_start();
?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><i class="fas fa-car fa-lg" style="color:#bfe00ce3;"></i> GRAB YOUR <span style="color:#bfe00ce3;">CAB</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
  <ul class="navbar-nav">
     
   <?php if(!isset($_SESSION['name'])){
     echo '  
     <li class="nav-item mx-2">
       <a class="nav-link" href="#">Home </a>
     </li>
      <li class="nav-item mx-2">
     <a class="nav-link" href="login.php">LOGIN</a>
   </li>
   <li class="nav-item mx-2">
     <a class="nav-link " href="user_register.php">SIGN UP</a>
   </li>';
   }
   else
   {
     echo ' <li class="nav-item mx-2">
     <a class="nav-link" href="customer/userdashboard.php">DASHBOARD </a>
   </li><li class="nav-item mx-5 mt-2 text-white ">'.$_SESSION['name'].'
   <a href="logout.php"><button class="btn btn-outline-danger my-2 my-sm-0"  type="submit">Logout</button></a></li>';
   }
   ?>
     
    </ul>
    
  </div>
</nav>


   
    
<!--    
  </body>
</html> -->
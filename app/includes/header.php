<section class="header1">

        <div class="container">
            <div class="header2 flex">
        <h3  class="b-name text-danger mt-3"><a href="<?php echo BASE_URL . "/index.php" ?>">BLOG</a></h3>
        <div class="menu-wrap">
            <input type="checkbox" class="toggler">
            <div class="hamburger"><div></div></div>
            <div class="menu">
        <div class ="nav">
          <div>
          <div>
            <ul>
                <li><a href="<?php echo BASE_URL . "/index.php" ?>">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Services</a></li>
                <?php if(isset($_SESSION['Id'])): ?>
                <li><a href="#"><i class="fa fa-user"></i><?php echo $_SESSION['username']; ?></a></li>
                <?php if(($_SESSION['admin'])): ?>
                <li><a href="<?php echo BASE_URL . "/admin/dashboard.php" ?>">Dashboard</a></li>
                <?php endif; ?>
                <li><a href="<?php echo BASE_URL . "/logout.php" ?>">Logout</a></li>
                <?php else: ?>
                <li><a href="<?php echo BASE_URL . "/register.php" ?>">SignUp</a></li>
                <li><a href="<?php echo BASE_URL . "/login.php" ?>">Login</a></li>
                <?php endif; ?>
                  
              </ul>
        </div>
        </div>
       </div>  
      </div>
         </div>
        </div>
    </div>


    </section>
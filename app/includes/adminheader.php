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
            <?php if(isset($_SESSION['username'])): ?>
                <li><a href="#"><i class="fa fa-user"></i> <?php echo $_SESSION['username'];?> <i class="fa fa-caret-down"></i> </a>
                <div class="drop-content">
                    <ul>
                        <li><a href="<?php echo BASE_URL . "/logout.php" ?>">Logout</a></li>
                    </ul>
                </div>
                </li>
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
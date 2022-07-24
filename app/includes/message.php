<?php if(isset($_SESSION['message'])): ?>
    <div class="msg-logged <?php echo $_SESSION['type']; ?>">
    <h5> <?php echo $_SESSION['message'];?></h5>
    <?php unset($_SESSION['message']);
          unset($_SESSION['type']);
    ?>
    <?php endif; ?>
    </div>

 
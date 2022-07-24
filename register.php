<?php include("path.php") ?>
<?php include(ROOT_PATH . "/app/controllers/user.php");?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">




    <title>Register-User</title>
</head>
<body>
<?php include (ROOT_PATH . "/app/includes/header.php")?>

          


    <section class="form">
        <div class="container">
        <div class="register3">
        <h3 class="form-title">Register</h3>
        <div class="register2">
        <form action="register.php" method="post">
        <div class="div2">
        <div> <?php  include (ROOT_PATH . "/app/helpers/errors.php") ?></div>
            <div><label for="username">Username</label> <br>
            <input type="text" class="username" value = "<?php echo $username; ?>" name="username" >
              </div> <br>
           <div>
           <label for="email">Email</label> <br>
            <input type="email" class="Email" value = "<?php echo $Email; ?>" name="Email">
            </div>  <br>
            
           <div> 
           <label for="password">Password</label> <br>
            <input type="password" class="Password" value = "<?php echo $Paaword; ?>" name="Paaword">
            </div><br>

            <div>
            <label for="passwordConf">Confirm Password</label> <br>
            <input type="password" class="passwordConf" value = "<?php echo $PaawordConf; ?>" name="PaawordConf"> 
            </div><br>

            <div>
                
            <input type="Submit" class="btn btn-main" name="Register" value="Submit"><br>
            </div>
            <p>or <a href="<?php echo BASE_URL . "/login.php" ?>">Sign-in</a></p>
            </div>
            </div>
        </form>
        
        </div>
        </div>
    </section>

 
 <!--Recent posts section-->

    <script src = "assets/js/bootstrap.js"></script>  
    
</body>
</html>
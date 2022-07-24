<?php include("path.php");
 include(ROOT_PATH . "/app/controllers/user.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">




    <title>Signin-User</title>
</head>
<body>
<?php include (ROOT_PATH . "/app/includes/header.php")?>



    <section class="form">
        <div class="container">
        <div class="register3">
        <div class="form-title"><h3>Sign-in</h3></div> <br>
        <div class="register2">
        <form action="login.php" method="POST">
            <?php include (ROOT_PATH . "/app/helpers/errors.php")?>
            <div><label for="uname">Username</label> <br>
            <input type="text" class="username" value="<?php echo $username; ?>" name="username">
            </div><br>
           <div> <label for="password">Password</label><br>
            <input type="password" class="Password" value="<?php echo $Paaword; ?>" name="Paaword">
            </div><br>
            <input type="Submit" name= "login" class="btn btn-main" value="Login"><br>
            <p>or <a href="<?php echo BASE_URL . "/register.php" ?>">Sign-up</a></p>
            </div>
        </form>
        </div>
        </div> 
        </div>
    </section>

 
 <!--Recent posts section-->

    <script src = "assets/js/bootstrap.js"></script>  
    
</body>
</html>
<?php  require_once("../../path.php");
include(ROOT_PATH . "/app/controllers/user.php");
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">




    <title>Edit  User</title>
</head>
<body>
        <!--end of side contents-->

        <?php require_once(ROOT_PATH . "/app/includes/adminheader.php");?>

 
        <?php require_once(ROOT_PATH . "/app/includes/adminsidebar.php");?>

        <!--start of side contents-->
        <div class="main-contents">
            <div class="bbn-group">
                <a href="create.php" class="btn-main">Add User</a>
                <a href="index.php" class="btn-main">Manage Users</a>
            </div>


            <div class="contents2">
                <div class="register1">
                <form action="edit.php" method="post">
                <input type="hidden" name="Id" value="<?php echo $Id; ?>">   
                <div class="contents2">
                    <div class="register1">
                        <div class="form-title"><h3>Edit User</h3></div>
                        <?php include (ROOT_PATH . "/app/helpers/errors.php")?>
                        <label for="uname">Username</label> <br>
                        <input type="text" class="uname" value="<?php echo $username; ?>" name="username" > <br>
                        <label for="email">Email</label> <br>
                        <input type="email" class="Email" value="<?php echo $Email; ?>" name="Email"> <br>
                        <label for="password">Password</label> <br>
                        <input type="password" class="Password"value="<?php echo $Paaword; ?>" name="Paaword"> <br>
                        <label for="password2">Confirm Password</label> <br>
                        <input type="password" class="password2" value="<?php echo $PaawordConf; ?>" name="PaawordConf">
                        <div>
                        <?php if(isset($admin) && $admin == 1): ?>
                         <label for="Admin" class="admin">
                         <input type="checkbox" name="admin" checked> Admin</label>  
                         </div>
                        <?php else: ?>
                            <label for="Admin" class="admin">
                         <input type="checkbox" name="admin"> Admin</label>  
                         </div>
                        <?php endif; ?>
                         </div> 
                            <div>
                                <input type="submit" name="update-user" value="Add User" class="btn-submit">
                            </div>
                        </div>
            </form>
            
                    
                     </div>
            </div>
            <!--end of main contents-->
        </div>

    </div>














    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script src = "../../assets/js/bootstrap.js"></script>  
    <script src = "../../assets/js/script.js"></script>
    </body>
</html>

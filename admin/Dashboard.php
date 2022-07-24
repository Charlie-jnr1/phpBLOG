<?php
  require_once('../path.php');
    require_once(ROOT_PATH . "/app/controllers/posts.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">




    <title>Admin-Dashboard</title>
</head>
<body>
<?php require_once(ROOT_PATH . "/app/includes/adminheader.php");?>

 
<?php require_once(ROOT_PATH . "/app/includes/adminsidebar.php");?>
        <!--end of side contents-->


        <!--start of side contents-->
        <div class="main-contents">
            <div class="bbn-group">
                <a href="posts/create.php" class="btn-main">Add Posts</a>
                <a href="posts/index.php" class="btn-main">Manage Posts</a>
            </div>


            <div class="contents2">
                <h2 class="table-title">Dashboard</h2>
                <?php require_once(ROOT_PATH . "/app/includes/message.php");?>
                            </div>
            <!--end of main contents-->
        </div>

    </div>














    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script src = "../assets/js/bootstrap.js"></script>  
    <script src = "../assets/js/script.js"></script>

</body>
</html>

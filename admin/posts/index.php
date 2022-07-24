<?php  require_once('../../path.php'); 
require_once(ROOT_PATH . "/app/controllers/posts.php");

?>



<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">




    <title>Admin-Manage posts</title>
</head>
<body>
  <?php require_once(ROOT_PATH . "/app/includes/adminheader.php");?>

  <?php require_once(ROOT_PATH . "/app/includes/adminsidebar.php");?>

<!--end of side contents-->


        <!--start of side contents-->
        <div class="main-contents">
            <div class="bbn-group">
                <a href="create.php" class="btn-main">Add Post</a>
                <a href="index.php" class="btn-main">Manage Posts</a>
            </div>


            <div class="contents">
                <h2 class="table-title">Manage Posts</h2>
                <?php require_once(ROOT_PATH . "/app/includes/message.php");?>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>

                    <?php foreach ($posts as $key => $post): ?>
                            <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $post['title']; ?></td>
                            <td>Charlie</td>
                            <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
                            <td><a href="index.php?del_id=<?php echo $post['id']; ?>" class="delete">delete</a></td>
                            <?php if($post['published']): ?>
                            <td><a href="edit.php?published=0&p_id=<?php echo $post['id']; ?>" class="unpublish">unpublish</a></td>
                            <?php else: ?>
                            <td><a href="edit.php?published=1&p_id=<?php echo $post['id']; ?>" class="publish">Publish</a></td>
                            <?php  endif; ?>
                        </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <!--end of main contents-->
        </div>

    </div>

    <script src = "../../assets/js/script.js"></script>
    
</body>
</html>
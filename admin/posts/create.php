<?php
  require_once('../../path.php');
    require_once(ROOT_PATH . "/app/controllers/posts.php");
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




    <title>Create Posts</title>
</head>
<body>
<?php require_once(ROOT_PATH . "/app/includes/adminheader.php");?>

 
<?php require_once(ROOT_PATH . "/app/includes/adminsidebar.php");?>
        <!--end of side contents-->


        <!--start of side contents-->
        <div class="main-contents">
            <div class="bbn-group">
                <a href="create.php" class="btn-main">Add Posts</a>
                <a href="index.php" class="btn-main">Manage Posts</a>
            </div>


            <div class="contents2">
                <h2 class="table-title">Create Post</h2>
                <?php include (ROOT_PATH . "/app/helpers/errors.php")?>
                <form action="create.php" method="post" enctype= "multipart/form-data">
                    <div>
                    <label class="title1 post-title">Title</label> <br>
                    <input type="text" name="title" value="<?php echo $title; ?>" class="text-input">
                </div>
                     
                    <div>
                    <label class="title1 post-body">Body</label> <br>
                    <textarea name="body" value="<?php echo $body; ?>" id="body"></textarea>
                </div>
                    <div>
                        <label for="img">Add Image</label> <br>
                        <input type="file" class="post-img" name="image">
                    </div>

                    <div> <br><br>
                        <label>Topics</label> <br>
                        <select name="topic_id"   id="">
                            
                        <option value="" class="options"></option>
 
                                <?php foreach ($topics as $key => $topic): ?>
                                <?php if(!empty($topic_id) && $topic_id == $topic['id']): ?>
                                    <option  selected value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                                <?php else: ?>
                                <option  value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                   
                   
                   
                   
                             </select><br> <br>

                            <div>
                            <?php if(empty($published)): ?>
                            <label>
                             <input type="checkbox" name="published"> Publish
                             </label>
                            <?php else: ?>
                                <label>
                             <input type="checkbox" name="published" checked> Publish
                             </label>
                            <?php endif; ?>
                            
                             </div>
                   </div>


                   <div> <br>
                         <input type="submit" name="add-posts" value="Create Post" class="btn-submit">
                   </div>
                </form>
            </div>
            <!--end of main contents-->
        </div>

    </div>














    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script src = "../../assets/js/bootstrap.js"></script>  
    <script src = "../../assets/js/script.js"></script>

</body>
</html>

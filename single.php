<?php include("path.php") ?>
<?php  require_once(ROOT_PATH . "/app/controllers/posts.php");

if(isset($_GET['id'])){
  $post = selectOne('posts', ['id' => $_GET['id']]);
}

$posts = selectAll('posts', ['published' => 1]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/utilities.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">




    <title><?php echo $post['title']; ?> | Blog</title>
</head>
<body>
<?php include (ROOT_PATH . "/app/includes/header.php")?>





 
 <!--Main content section-->
<section class="recent">
  <div class="container">
    <div class="two-sections single">
        <!--start of single post section-->
        <div class="single-post">
            <div class="post-title">
                <h2><?php echo $post['title']; ?></h2>
                <div class="post-details">
                  <h5>Written by    <?php echo $post['username']; ?></h5>
                </div>

                <div class="post-body">
                        <p><?php echo html_entity_decode($post['body']); ?></p>
               
                </div>
            </div>
        </div>
        <!--end of single post section-->
        <!--side-bar section-->
          <div class="side-bar">
              <!--start of popular Post section-->

        <div class="popular-post">
            <div class="section-title"><h2>Popular</h2></div>
            <?php foreach($posts as $post): ?>
            <div class="post clearfix">
                <img src="<?php echo BASE_URL . "/assets/images/" . $post['image'];  ?>" alt="">
                <a href="single.php?id=<?php echo $post['id']; ?>" class="title"><?php echo $post['title'];  ?></a>
            </div>
            <?php endforeach; ?>
            </div>
            
        <!--end of popular Post section-->
        
            <div class="contents bg-white">
            <h3>Topics</h3>
            <div class="topics">
              <ul>
              <?php foreach ($topics as $key => $topic): ?>
                <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>

              <?php endforeach; ?>
                
            </ul>
              </div>
            </div>
          </div>
          <!--end of side-bar section-->


  </div>


  </div>
</section>

 <!--end of main-content-->

<!--start of footer-->
<?php include (ROOT_PATH . "/app/includes/footer.php")?>


<!--end of footer-->



    <script src = "assets/js/bootstrap.js"></script>  
    
</body>
</html>
<?php require_once("path.php");

require_once (ROOT_PATH . "/app/controllers/topics.php");
$posts= array();
$postTitle='Recent Posts';

if(isset($_GET['t_id'])){
  $posts= getPostsTopicById($_GET['t_id']);
  $postTitle =" Posts under  '"  . $_GET['name'] . "'";
}
 else if(isset($_POST['search-term'])){
  $postTitle ="You search for  '"  . $_POST['search-term'] . "'";
  $posts = searchPosts($_POST['search-term']);
}

else{
  $posts = getPublishedPosts();
  $pagenatedposts= getPagenatedPosts();

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/utilities.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">




    <title>BLOG</title>
</head>
<body>
    <?php require_once(ROOT_PATH . "/app/includes/header.php");?>
    <?php require_once(ROOT_PATH . "/app/includes/message.php");?>

 <section class ="background">
     <div class="container">
       <div class="carousel">
        <div class="section-title"><h1>Trending Posts</h1></div>
        <?php $i = 0; ?>
              <div id="carouselExampleCaptions" class="carousel slide mt-3" data-bs-ride="carousel"><div class="carousel-indicators">
              <?php $i = 0;
              foreach($posts as $post){
                  $actives = '';
                  if($i == 0){
                    $actives = 'active';
                  }
              ?>
               <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i; ?>" class="<?= $actives;  ?>"aria-current="true"></button>
               <?php $i++; } ?>
              </div>
            <div class="carousel-inner">
            <?php $i = 0;
              foreach($posts as $post){
                  $actives = '';
                  if($i == 0 && $i < 5){
                    $actives = 'active';
                  }
              
              ?>
              
              <div class="carousel-item <?= $actives;  ?>">
                <img src="<?php echo BASE_URL . "/assets/images/" . $post['image'];  ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-lg-block d-md-block">
                  <div class="post-topic"><h5><?php echo $post['title']; ?></h5></div>
                  <div class="post-link"> <a href="single.php?id=<?php echo $post['id']; ?>">See More <i class="fa fa-chevron-right"></i> <i class="fa fa-chevron-right"></i></a></div>
                  </div>
              </div>
              
              <?php $i++; } ?>
              </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span/fv>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
            </div>
            </div>
            </div>
            
 </section>
 <!--end of showcase and Navbar section-->

 <!--end of showcase and Navbar section-->

 <!--Recent posts section-->
<section class="recent">
  <div class="container">
    <div class="two-sections">
    <div class="post1">
      <div class="recent-post"><h4><?php echo $postTitle; ?></h4></div>
      <?php foreach($pagenatedposts['posts'] as $post): ?>
      <div class="post-item">
        <div class="post-img">
          <img src="<?php echo BASE_URL . "/assets/images/" . $post['image'];  ?>" alt="">
        </div>
        <div class="post-title">
          <h5><?php echo $post['title']; ?></h5>
          <div class="post-details">
            <div class="imp">
            <h6 class="poster-name"><i class="fa fa-user"></i><?php echo $post['username']; ?></h6> <br>
           <h6 class="post-date"><i class="fa fa-calendar-o"></i><?php echo date('F j, Y, g:i a',strtotime($post['created_at'])); ?></h6>
            </div>               
            <div class="post-body"><p><?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?></p></div>
            <div class="read-more"><a href="single.php?id=<?php echo $post['id']; ?>">Read More <i class="fa fa-chevron-right"></i></a></div>
          </div>  
        </div>
        </div>

      <?php endforeach; ?>
      </div>


    <div class="side-bar">
            <div class="search bg-white">
            <h3>Search</h3>
            <form action="index.php" method="post">
              <input type="text" name="search-term" class="serach-bar" placeholder="Search...">
            </div>
            <div class="contents bg-white">
            </form>
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


  </div>
</div>

  </div>
</section>

 <!--end of recent post styling-->

<!--start of footer-->
<?php include (ROOT_PATH . "/app/includes/footer.php")?>
<!--end of footer-->



    <script src = "assets/js/bootstrap.js"></script>  
    
</body>
</html>
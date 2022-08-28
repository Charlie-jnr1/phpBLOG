<?php
require_once(ROOT_PATH . '/app/database/db.php');
require_once(ROOT_PATH . '/app/helpers/Middleware.php');
require_once(ROOT_PATH . '/app/helpers/validatePosts.php');

$table = 'posts';

$topics = selectAll('topics');


$posts = selectAll($table);
$errors = array();
$id = '';
$title = '';
$body = '';
$topic_id = '';
$published = '';



if(isset($_GET['id'])){
    $post = selectOne($table, ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    $topic_id = $post['topic_id'];
    $published = $post['published'];

}


if(isset($_GET['del_id'])){
    adminOnly();
    
    $id = $_GET['del_id'];
    $count = delete($table,$id);
    $_SESSION['message'] = 'Post deleted successfully!';
    $_SESSION['type'] = 'msg-logged';
    header('location: ' . BASE_URL . '/admin/posts/index.php');
    exit();

}



if(isset($_GET['published']) && isset($_GET['p_id'])){
    adminOnly();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    $count = update($table, $p_id, ['published' => $published]);
    $_SESSION['message'] = 'Post state changed!';
    $_SESSION['type'] = 'msg-logged';
    header('location: ' . BASE_URL . '/admin/posts/index.php');
    exit();


}



if(isset($_POST['add-posts'])){
    adminOnly();
     $errors = validatePosts($_POST);

    if(!empty($_FILES['image']['name'])){
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if($result){
            $_POST['image'] = $image_name;
        }
        else{
            array_push($errors, "image upload failed");
        }
    }
    else{
        array_push($errors, "Post image required");
    }

     if(count($errors) === 0){
        unset($_POST['add-posts']);
        $_POST['user_id'] = $_SESSION['Id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_SESSION['message'] = 'Post created successfully!';
        $_SESSION['type'] = 'msg-logged';
        $_POST['body'] = htmlentities($_POST['body']);
        $post_id = create($table, $_POST);
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();
    
     }
     else{
         $title = $_POST['title'];
         $body = $_POST['body'];
         $topic_id = $_POST['topic_id'];
         $published = isset($_POST['published']) ? 1 : 0;;
     }
    }

    if(isset($_POST['update-post'])){
        adminOnly();
        $errors = validatePosts($_POST);

       if(!empty($_FILES['image']['name'])){
           $image_name = time() . '_' . $_FILES['image']['name'];
           $destination = ROOT_PATH . "/assets/images/" . $image_name;
   
           $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
   
           if($result){
               $_POST['image'] = $image_name;
           }
           else{
               array_push($errors, "image upload failed");
           }
       }
       else{
           array_push($errors, "Post image required");
       }
   
        if(count($errors) === 0){

            $id = $_POST['id'];
           unset($_POST['update-post'], $_POST['id']);
           $_POST['user_id'] = $_SESSION['Id'];
           $_POST['published'] = isset($_POST['published']) ? 1 : 0;
           $_SESSION['message'] = 'Post updated successfully!';
           $_SESSION['type'] = 'msg-logged';
           $_POST['body'] = htmlentities($_POST['body']);
           $post_id = update($table, $id, $_POST);
           header('location: ' . BASE_URL . '/admin/posts/index.php');
           exit();
       
        }
        else{
            $id = $_POST['id'];
            $title = $_POST['title'];
            $body = $_POST['body'];
            $topic_id = $_POST['topic_id'];
            $published = isset($_POST['published']) ? 1 : 0;
        }
    
       }
 
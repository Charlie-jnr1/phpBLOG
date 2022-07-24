<?php

 function validatePosts($post)
 {
    $errors = array();

    if(empty($post['title'])){
        array_push($errors, 'Title is required !');
    }

    if(empty($post['body'])){
        array_push($errors, 'Body is required !');
    }

    if(empty($post['topic_id'])){
        array_push($errors, 'Please select a topic!');
    }

    $existingPosts = selectOne('posts', ['title' => $post['title']]);
    if($existingPosts){
        if(isset($post['update-post']) && $existingPosts['id'] != $post['title']){
            array_push($errors, 'Post with title already exists !');
        }

        if(isset($post['add-post'])){
            array_push($errors, 'Post with title already exists !');
        }
        
    }
    
    return $errors;


 }
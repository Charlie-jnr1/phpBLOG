<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once('connect.php');


function dd($value){
    echo "<pre>", print_r($value,true) ,"</pre>";
}

function executeQuery($sql, $data){
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}




function selectALL($table, $conditions = []){

global $conn;
$sql = "SELECT * FROM $table";
if(empty($conditions)){


    $stmt = $conn ->prepare($sql);
    $stmt-> execute();
    $users= $stmt-> get_result()->fetch_all(MYSQLI_ASSOC);
    
    return $users;
} 


else{

    //return records that match conditions;

    $i = 0;

    foreach ($conditions as $key => $value){
        if($i === 0){
            $sql = $sql . " WHERE $key=?"; 
        }

        else{
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }
    $stmt = executeQuery($sql, $conditions);
    $users= $stmt-> get_result()->fetch_all(MYSQLI_ASSOC);
    
    return $users;


     }


}
function selectOne($table, $conditions){

    global $conn;
    $sql = "SELECT * FROM $table";
    
        $i = 0;
    
        foreach ($conditions as $key => $value){
            if($i === 0){
                $sql = $sql . " WHERE $key= ?"; 
            }
    
            else{ 
                $sql = $sql . " AND $key= ?";
            }
            $i++;
        }
        $sql = $sql . " LIMIT 1";
        $stmt = executeQuery($sql, $conditions);
        $users= $stmt-> get_result()->fetch_assoc();
        
        return $users;

    
    
    }

    
    function create($table, $data)
    {
        global $conn;

        $sql= "INSERT INTO $table SET ";

        $i = 0;
    
        foreach ($data as $key => $value){
            if($i === 0){
                $sql = $sql . " $key= ?"; 
            }
    
            else{ 
                $sql = $sql . ", $key= ?";
            }
            $i++;
    }

    //dd($sql);
    //dd($data);

    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;

    
}

function update($table, $id, $data)
{
    global $conn;

    $sql= "UPDATE $table SET ";

    $i = 0;

    foreach ($data as $key => $value){
        if($i === 0){
            $sql = $sql . " $key= ?"; 
        }

        else{ 
            $sql = $sql . ", $key= ?";
        }
        $i++;
}

//dd($sql);
//dd($data);
$sql = $sql . " WHERE id=?";
$data['id']= $id;
$stmt = executeQuery($sql, $data);
$id = $stmt->insert_id;
return $stmt->affected_rows;


}


function delete($table, $id)
{
    global $conn;

    $sql= "DELETE FROM $table WHERE id =? ";


//dd($sql);
//dd($data);
$stmt = executeQuery($sql, ['id' => $id]);
return $stmt->affected_rows;


}


function getPublishedPosts(){
    global $conn;
    $sql= "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published = ?";


    $stmt = executeQuery($sql, ['published' => 1]);
    $records= $stmt-> get_result()->fetch_all(MYSQLI_ASSOC);
    
    return $records;
}
    






function searchPosts($term){
    $match = '%'. $term .'%';
    global $conn;
    $sql= "SELECT 
    p.*, u.username FROM posts 
    AS p JOIN users AS 
    u ON p.user_id=u.id 
    WHERE p.published = ? 
    AND p.title LIKE ? OR
     p.body LIKE ?";


    $stmt = executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match ]);
    $records= $stmt-> get_result()->fetch_all(MYSQLI_ASSOC);
    
    return $records;
}


function getPostsTopicById($topic_id){
    global $conn;
    $sql= "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published = ? AND topic_id=?";


    $stmt = executeQuery($sql, ['published' => 1, 'topic_id' => $topic_id]);
    $records= $stmt-> get_result()->fetch_all(MYSQLI_ASSOC);
    
    return $records;
}


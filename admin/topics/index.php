<?php  require_once('../../path.php'); 

include (ROOT_PATH . "/app/controllers/topics.php");

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




    <title>Admin-Manage Topics</title>
</head>
<body>
        <?php require_once(ROOT_PATH . "/app/includes/adminheader.php");?>

 

        <!--end of side contents-->

        <?php require_once(ROOT_PATH . "/app/includes/adminsidebar.php");?>
 
        <!--start of side contents-->
        <div class="main-contents">
            <div class="bbn-group">
                <a href="create.php" class="btn-main">Add Topic</a>
                <a href="index.php" class="btn-main">Manage Topics</a>
            </div>


            <div class="contents">
                <h2 class="table-title">Manage Topics</h2>
                <?php require_once(ROOT_PATH . "/app/includes/message.php");?>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Name</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($topics as $key => $topic): ?>
                            <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $topic['name']; ?></td>
                            <td><a href="edit.php?id=<?php echo $topic['id']; ?>" class="edit">edit</a></td>
                            <td><a href="index.php?del_id=<?php echo $topic['id']; ?>" class="delete">delete</a></td>
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

<?php  require_once("../../path.php");
require_once(ROOT_PATH . "/app/controllers/user.php");
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




    <title>Admin-Manage Topics</title>
</head>
<body>
            <?php require_once(ROOT_PATH . "/app/includes/adminheader.php");?>

            
            <?php require_once(ROOT_PATH . "/app/includes/adminsidebar.php");?>

        <!--start of side contents-->
        <div class="main-contents">
            <div class="bbn-group">
                <a href="create.php" class="btn-main">Add User</a>
                <a href="index.php" class="btn-main">Manage Users</a>
            </div>


            <div class="contents">
                <h2 class="table-title">Manage Users</h2>
                <?php require_once(ROOT_PATH . "/app/includes/message.php");?>
                
                
                <table>
                <thead>
                        <th>SN</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($admin_users as $key => $user): ?>
                            <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['Email']; ?></td>
                            <td><a href="edit.php?Id=<?php echo $user['Id']; ?>" class="edit">edit</a></td>
                            <td><a href="index.php?delete_id=<?php echo $user['Id']; ?>" class="delete">delete</a></td>
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
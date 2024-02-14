<?php 
    session_start();
    require "../classes/User.php";

    $user_obj = new user;
    $all_users = $user_obj->getAllUsers();
    // print_r($all_users); //testing 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CDN Link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<!-- Fontawesome AND link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 <link rel="stylesheet" href="../assets/css/style.css">
    <title>dashboard</title>
</head>
<body>
    <!-- Navigation Area -->
    <nav class="navbar navbar-expand navbar-dark bg-dark" stayle="margin-bottom:80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The Company</h1>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['fullname']?></span>
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <main class="row justify-content-center gx-0">
        <div class="col-6">
            <h1 class="text-center"></h1>
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>ID</th>
                        <th>FIRSTNAME</th>
                        <th>LASTNAME</th>
                        <th>USERNAME</th>
                        <th>EDIT|DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($user = $all_users->fetch_assoc()){
                    ?>
                    <tr>
                        <td>
                            <?php
                            if($user['photo']){  //boolean result --> true of false
                                ?>

                                <img src="../assets/images/<?=$user['photo']?>" alt="<?= $user['photo']?>" class="d-block mx-auto dashboard-photo" style="width: 3.5rem; height: 3.5rem; object-fit: cover;">
                                <?php
                            }else{
                                ?>
                                <i class="fa-solid fa-user text-secondary d-block text-center dashboard-icon"></i>
                                <?php
                                     }
                            ?>
                        </td>
                        <td><?= $user['id']?></td>
                        <td><?= $user['first_name']?></td>
                        <td><?= $user['last_name']?></td>
                        <td><?= $user['username']?></td>
                        <td>
                            <?php
                            //this will only display to the user who is currently klogged-in
                            if($_SESSION['id']==$user['id']){
                                ?>
                             <a href="edit-user.php" class="btn btn-outline-warning" title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                             </a>
                             <a href="delete-user.php" class="btn btn-outline-danger" title="Delete">
                                <i class="fa-regular fa-trash-can"></i>
                             </a>
                             <?php
                            }
                             ?>
                        </td>

                        
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </main>
</body>
</html>
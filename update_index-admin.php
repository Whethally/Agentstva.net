<?php
session_start();
include("datebase.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <title>Агенства.нет</title>
</head>

<body>
    <?php include('header.php'); ?>

    <main class="main">
        <!-- Главная -->
        <section class="home container">
            <?php
        $item = mysqli_query($db, "SELECT * FROM `index`");
        $item = mysqli_fetch_assoc($item);
?>

            <div class="modal-posts_edit">
                <div class="modal-content">
                    <form action="admin-update-index-save.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id"
                            value="<?=$item['id_index']?>">
                        <a href="admin.php" class="icon">
                            <i class="bx bxs-x-circle"></i>
                        </a>
                        <div class="infos-posts">
                            <div class="input-group">
                                <label for="main">Содержимое на главной</label>
                                <input type="title" id="main" name="main"
                                    value="<?=$item['index_name']?>">
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="panel__login" type="submit" id="addPost" name="addPost" value="Сохранить">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
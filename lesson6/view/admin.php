<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 10.09.14
 * Time: 14:25
 */
header('Content-Type: text/html; charset=utf-8'); ?>

<!DOCTYPE html>
<html>
<head lang="en"> <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../view/style.css"/>
</head>

<body>
    <form action="../index.php" method="post" enctype="multipart/form-data">

        <header class="container">
            <div class="backgr">

                    <input type="text" name="ctrl"/>
                    <input type="text" name="action"/>
                    <input type="submit" value=" Ввод " />
                    <p> Введите номер статьи </p>
                    <input type="text" name="id"/>
                    <p> Введите текст статьи </p>
                    <textarea name="content" cols="40" rows="4"></textarea>
                    <p> Введите тему статьи </p>
                    <input type="text" name="title" />

             </div>
        </header>

    </form>

</body>
</html>
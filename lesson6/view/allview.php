<?php //header('Content-Type: text/html; charset=utf-8'); ?>

<!DOCTYPE html>
<html>
    <head lang="en"> <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../view/style1.css"/>
    </head>

<body>

<header class="container">
    <div class="backgr">
        <table>
            <?php foreach ($items as  $el):
                // foreach($el as $sub):?>
            <tr>
                <td> <?php //echo $sub; endforeach ?> </td>
                <td> <?php echo $el; ?></td>
            </tr>
            <?php endforeach ?>
        </table>
     </div>
</header>

</body>
</html>


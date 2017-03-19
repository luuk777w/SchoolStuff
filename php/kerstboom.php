<?php

    $g = $_GET['groote'];

    $g = $g ?: 10;

    $kerstboom = 'test1';

    while($i < $g){

        $kerstboom .= 'test <br>';

        $i++;
    }

?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>

        <?php echo $kerstboom ?>

    </body>
</html>
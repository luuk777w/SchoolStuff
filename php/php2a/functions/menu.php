<?php

function getMenu($db){

    $query = "SELECT * FROM `menu`";
    $result = mysqli_query($db, $query);

    $content = '';

    while($row = mysqli_fetch_assoc($result)){

        $content .= '<li><input class="menu" type="submit" name="content" value="'.$row['item'].'"></li>';

    }

    return $content;

}
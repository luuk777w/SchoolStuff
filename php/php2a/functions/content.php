<?php

function TgetContent($db, $c){

    $query = "SELECT * FROM `pages` WHERE `name` = '" . mysqli_real_escape_string($db, $c) . "'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    $content = $row['body'];

    return $content;

}
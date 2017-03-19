<?php

function getNews($db){

    $query = "SELECT * FROM `news` ORDER BY `id` DESC";
    $result = mysqli_query($db, $query);

    $content = '';

    while($row = mysqli_fetch_assoc($result)){

        $content .= "<p>".$row['body']."<strong> - ".$row['date']."</strong></p> 
        ---------------------------------------------------------------------------------------------------------------- 
        <br> ";

    }

    return $content;

}
<?php

function getContent($db){

    $content = 'Het nieuws:';
    $content .= '<br>';
    $content .= '----------------------------------------------------------------------------------------------------------------';
    $content .= getNews($db);

    return $content;

}

?>
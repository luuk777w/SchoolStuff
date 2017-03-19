<?php

function getContent($db){

    $content = 'Zoek hier op een afbeelding: <br>';
    $content .= '<form action="" method="post">';
    $content .= '<input type="text" name="input">';
    $content .= '<button name="submit2" value="submit">Verzenden</button>';
    $content .= '</form>';

    if(isset($_POST['submit2']) && !empty($_POST['input'])){
        $content .= GetImages($_POST['input']);
    }

    return $content;

}

?>
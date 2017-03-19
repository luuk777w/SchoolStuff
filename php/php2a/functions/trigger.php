<?php

function TriggerContent($c, $db){

    $c = $c ?: 'Home';

    $query = "SELECT * FROM `menu` WHERE `item` = '" . mysqli_real_escape_string($db, $c) . "'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);

    try {
        $page =  'pages/' . $c . '.php';
        if (file_exists($page) && $row['item'] == $c) {
            include $page;
            $content= getContent($db, $c);
        } else {
            throw new Exception('Deze pagina is niet gevonden (404)');
        }
    } catch (Exception $e){
        $content = 'Error: '.$e->getMessage();
    }

    return $content;

}




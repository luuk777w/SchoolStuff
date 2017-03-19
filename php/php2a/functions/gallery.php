<?php

function GetImages($search){

    $url = "https://pixabay.com/api/?key=3864986-61d803177d420095c59e7978c&q=".$search."&image_type=photo&pretty=true";
    $json_url = file_get_contents($url);
    $json = json_decode($json_url);
    $hits = $json->totalHits;

    $count = 12;
    $content = '';

    if($hits < 12){
        $count = $hits;
        if($hits == 0){
            $content .= 'Er zijn geen afbeeldingen gevonden.';
        }
    }

    for ($i = 0; $i < $count; $i++) {

        $img = $json->hits[$i]->webformatURL;
        $content .= '<img src="'.$img.'" alt="pixabay.com">';
    }

    return $content;

}
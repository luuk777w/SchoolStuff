<?php

function login($db, $usr, $pass){

    $query = "SELECT * FROM `users` WHERE `Username` = '" . mysqli_real_escape_string($db, $usr) . "'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);

    $res='Fout wachtwoord';

    if($row['Password'] == $pass && !empty($usr)){
        $res='Ingelogd';
    }

    return $res;
}
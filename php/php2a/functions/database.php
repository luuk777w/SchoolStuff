<?php

// $insel = insert of select
// $tb = de tabel
// $where = waarin moet gekeken worden
// $is = waar wil je naar kijken
// $ins = waar je in wilt inserten
// $val = de value.

function db() {

    $link = mysqli_connect("localhost", "root", "Wachtwoord12", "php2a");

    if (mysqli_connect_error()) {
        die("Database fout");
    }

    return $link;

}







<?php require_once '../core/cssJsGeneratie.php';

    $head = '
<!doctype html>
<html lang=nl>
<head>
    <meta charset="UTF-8">
    <title>MVC site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
     '. $gen->linkJs .'
    '. $gen->linkCss .'
';
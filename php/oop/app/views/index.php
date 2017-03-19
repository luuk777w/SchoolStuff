<?php require_once 'layouts/app.php'; require_once 'layouts/head.php'; ?>

    <?= $head?>

    <style>



    </style>

</head>
<body>

<div class="container">

    <?=$nav?>

    <?php

    $content = '';

    foreach (json_decode($data['content']) as $contentItem){
        $content .= $contentItem->content . '<br>';
    }

    echo $content;

    ?>

</div>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>
</html>



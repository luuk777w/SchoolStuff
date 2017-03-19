<?php require_once 'layouts/app.php'; require_once 'layouts/head.php'; ?>

<?= $head?>

<style>

input{
    margin: 5px;
}
img{
    width: 300px;
    height: 300px;
    border: solid black 1px;
    float: left;
}

</style>

</head>
<body>

<div class="container">

    <?=$nav?>


    <div>
        <form action="/gallerij/handleImages" method="post" enctype="multipart/form-data">

            <input type="file" name="file" value="file"> <br />
            <input type="submit" class="btn btn-primary" id="upload" name="upload" value="upload">

        </form>
    </div>

    <hr>

    <?php

    $images = '';

    foreach ($data['images'] as $image){
        $images .= '<img src="images/'.$image.'">';
    }

    echo $images;

    ?>

</div>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>
</html>

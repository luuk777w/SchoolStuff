<?php require_once 'layouts/head.php'; ?>

<?= $head?>

<style>

.float{
    float: right;
    margin: 5px;
}

</style>

<script src="https://use.fontawesome.com/104e182223.js"></script>

</head>
<body>

<div class="container">

    <a class="float btn btn-primary" href="/admin/logout">logout</a>
    <h1>CRUD content:</h1>

    <?php

    $content = '';

    foreach (json_decode($data['content']) as $contentItem){
        $contenth = "'".$contentItem->content."'";
        $content .= $contentItem->content . '
         <button type="button" class="btn btn-danger float" data-toggle="modal" data-target="#deleteModal" onclick="deleteContent('.$contentItem->id.')"><i class="fa fa-trash" aria-hidden="true"></i></button>   
         <button type="button" class="btn btn-info float" data-toggle="modal" data-target="#updateModal" onclick="update('.$contenth.', '.$contentItem->id.')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
         <br> <hr>';
    }

    echo $content;

    ?>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Create</button>

<hr>

<h1>Gallerij:</h1>

<?php

$images = '';

foreach ($data['images'] as $image){
    $images .= $image.'<a href="/admin/delImage/'.$image.'"> Delete</a>'.'<br>';
}

echo $images;

?>

</div>

<!--CreateModal-->

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Create content.</h4>
            </div>

            <form class="form-group" method="POST" action="/admin/create">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Content:</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="content" aria-describedby="emailHelp">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Sluiten</button>
                    <button type="submit" class="btn btn-primary">Create!</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!--UpdateModal-->

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update content</h4>
            </div>

            <form class="form-group" id="updateLink" method="POST" action="/admin/update">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="content">Content:</label>
                        <input type="text" class="form-control" id="update" name="content" aria-describedby="updatePost" value="">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Sluiten</button>
                    <button type="submit" class="btn btn-primary">Update!</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!--DeleteModal-->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete content</h4>
            </div>

            <form class="form-group" id="deleteLink" method="POST" action="/admin/delete">

                <div class="modal-body">

                    Door nu op delete te drukken, verwijder je deze content permanent. <br>
                    Are you sure?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Sluiten</button>
                    <button type="submit" class="btn btn-primary">Delete!</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>

    function update(value, id) {

        $("#update").attr("value", value);
        $("#updateLink").attr("action", "/admin/update/"+id);

    }

    function deleteContent(id) {

        $("#deleteLink").attr("action", "/admin/delete/"+id);

    }


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>
</html>
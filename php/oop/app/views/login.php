<?php require_once 'layouts/app.php'; require_once 'layouts/head.php'; ?>

<?= $head?>

    <style>



    </style>

</head>
<body>

<div class="container">

    <?=$nav?>

    <br>

    <div class="card">
        <h3 class="card-header">Login</h3>
        <div class="card-block">

            <form class="form-horizontal" role="form" method="POST" action="/login/login">

                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Email:</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="" required autofocus>

                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">Wachtwoord:</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>

                    </div>
                </div>
            </form>

        </div>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>
</html>

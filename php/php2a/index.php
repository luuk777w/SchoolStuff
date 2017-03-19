<?php

error_reporting(E_ALL);

include 'bootstrap.php';

$db = db();
$out = TriggerContent($_GET['content'], $db);
$menu = getMenu($db);

if(isset($_POST['submit']))
$login =  login($db, $_POST['username'], $_POST['password']);


?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8" />
    <title>Test</title>
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>

<div id="container">

    <header>

        <h1>PHP 2a</h1>

    </header>

    <div id="div_2">



        <aside id="menu">



            <nav id= "side_menu">

                <form action="" method="get">

                <ul>
                    <li>Menu:</li>
                    <?php echo $menu?>
                </ul>

                </form>

            </nav>

        </aside>

        <section>

            <?php

                echo $out;

            ?>

        </section>

        <aside id="side_news">

            <form method="post" action="">

                <table>

                    <tr>
                        <td> <label for="username">Username:</label> </td>
                        <td> <input class="login" type="text" name="username"> </td>
                        <td> </td>
                    </tr>

                    <tr>
                        <td> <label for="password">Password:</label> </td>
                        <td> <input class="login" type="password" name="password"> </td>
                        <td> </td>
                    </tr>

                    <tr>
                        <td> Sumbit: </td>
                        <td> <button name="submit" value="submit">Verzenden</button> </td>
                    </tr>

                    <tr>
                        <td> <?php echo $login; ?> </td>
                    </tr>

                </table>

            </form>


        </aside>

    </div>

    <footer>
        Copyright: Luuk Wuijster 2016 &copy; &reg; &trade;
    </footer>


</div>



</body>
</html>

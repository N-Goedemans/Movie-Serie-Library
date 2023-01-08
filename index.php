<!DOCmedia html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beheerders Paneel | Hoofdmenu</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <?php

        include("connection.php");

        $showsTitle = $pdo->query('SELECT title FROM media')->fetchAll();
        $showsmedia = $pdo->query('SELECT media FROM media')->fetchAll();
        $showsID = $pdo->query('SELECT id FROM media')->fetchAll();

        $filmsTitle = $pdo->query('SELECT Title FROM media')->fetchAll();
        $filmsTime = $pdo->query('SELECT length_in_minutes FROM media')->fetchAll();
        $filmsID = $pdo->query('SELECT ID FROM media')->fetchAll();

        ?>
        <div class="header1">
            <h1>Welkom op het netland beheerders paneel</h1>
        </div>
        <br>
        <div class="title">
            <h2>media</h2>
        </div>
        <div class="table1">
            <form method="get" action="details.php">
                <table>
                    <tr>
                        <td>Titel</td>
                        <td>Rating</td>
                        <td>Details</td>
                    </tr>
                    <?php
                    for ($i = 0; $i < count($showsTitle); $i++) {
                        ?>
                        <tr>
                            <td><?= $showsTitle[$i]["title"] ?></td>
                            <td><?= $showsmedia[$i]["media"] ?></td>
                            <td><button name="id" type="submit" value="<?= $showsID[$i]["id"] ?>">Bekijk details</button></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </form>
        </div>
        <div class="toevoeg_knop">
            <a href="insert.php">
                <input type="submit" value="Wil je een nieuw soort media toevoegen?">
            </a>
        </div>
    </body>
</html>

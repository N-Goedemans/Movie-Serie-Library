<?php

include("connection.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beheerderspaneel | Detailmenu - Films</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="edit.php" method="get">
            <?php
            $id = $_GET["id"];
            $showsTable = $pdo->query("SELECT * FROM media WHERE id = $id")->fetch();
            ?>
            <h1 class="header1"><?= $showsTable["title"] ?></h1>
            <br>
            <table class="table1">
                <tr>
                    <th>Informatie</th>
                    <th>Informatie</th>
                </tr>
                <?php if ($showsTable['media'] == 'film') {?>
                <tr>
                    <td>Duur</td>
                    <td><?= $showsTable["length_in_minutes"] ?></td>
                </tr>
                <?php } ?>
                <?php if ($showsTable['media'] == 'film') {?>
                <tr>
                    <td>Datum van Uitkomst</td>
                    <td><?= $showsTable["released_at"] ?></td>
                </tr>
                <?php } ?> 
                <tr>
                    <td>Awards</td>
                    <td><?= $showsTable["awards"] ?></td>
                </tr>
                <?php if ($showsTable['media'] == 'serie') {?>
                <tr>
                    <td>Seasons</td>
                    <td><?= $showsTable["seasons"] ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Country of origin</td>
                    <td><?= $showsTable["country_of_origin"] ?></td>
                </tr>
                <tr>
                    <td>Language</td>
                    <td><?= $showsTable["language"] ?></td>
                </tr>
                <?php if ($showsTable['media'] == 'serie') {?>
                <tr>
                    <td>Rating</td>
                    <td><?= $showsTable["rating"] ?></td>
                </tr>
                <?php } ?>
            </table>
            <br>
            <br>
            <h1 class="header1">Beschrijving</h1>
            <br>
            <h2><?= $showsTable["summary"] ?></h2>
            <?php if ($showsTable['media'] == 'film') {?>
            <iframe width="560" height="315" src="<?= $film["youtube_trailer_id"] ?>"></iframe>
            <?php } ?>
            <br>
            <button type="submit" name="id" value="<?= $showsTable["id"] ?>">Informatie Wijzigen</button>
        </form>
        <br>
        <a href="index.php">
            <input type="submit" value="terug naar beginpagina">
        </a>
    </body>
</html>
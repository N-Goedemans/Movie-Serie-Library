<?php

include("connection.php");

$id = $_GET['id'] ?? $_POST['id'];
if (!isset($_GET['id'])) {
    $id = $_POST['id'];
} else {
    $id = $_GET['id'];
}


if (isset($_POST["id"])) {
    $title = $_POST["title"];
    $rating = $_POST["rating"] ??= 0;
    $length_in_minutes = $_POST["length_in_minutes"] ??= 0;
    $summary = addslashes($_POST["summary"]);
    $awards = $_POST["awards"];
    $seasons = $_POST["seasons"] ??= 0;
    $released_at = $_POST["released_at"] ??= 0;
    $country_of_origin = $_POST["country_of_origin"];
    $language = $_POST["language"];
    $youtube_trailer_id = $_POST["youtube_trailer_id"] ??= 0;

    try {
        $sql = "UPDATE media SET
        `title`='$title',
        `rating`='$rating',
        `length_in_minutes`='$length_in_minutes',
        `summary`='$summary',
        `awards`='$awards',
        `seasons`='$seasons',
        `released_at`='$released_at',
        `country_of_origin`='$country_of_origin',
        `language`='$language',
        `youtube_trailer_id`='$youtube_trailer_id'

        WHERE id=$id";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        echo "records UPDATED successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Beheerderspaneel | Wijzigingsmenu</title>
    </head>

    <body>
        <?php
        $showsTable = $pdo->query("SELECT * FROM media WHERE id = $id")->fetch();
        ?>
        <form action="edit.php" method="post" style="display: flex; flex-direction: column; align-items: flex-start;">
            <input type="hidden" name="id" value="<?= $id ?>">
            <h1>Title <input type="text" name="title" value="<?= $showsTable['title'] ?>"></h1>
            <br>
            <table class="table1">
                <tr>
                    <th>Informatie</th>
                    <th>Informatie</th>
                </tr>
                <?php if ($showsTable['media'] == 'film') {?>
                <tr>
                    <td>length in minutes</td>
                    <td><input type="text" name="length_in_minutes" value="<?= $showsTable['length_in_minutes'] ?>"></td>
                </tr>
                <?php } ?>
                <?php if ($showsTable['media'] == 'film') {?>
                <tr>
                    <td>released at</td>
                    <td><input type="text" name="released_at" value="<?= $showsTable['released_at'] ?>"></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Awards</td>
                    <td><input type="number" name="awards" value="<?= $showsTable['awards'] ?>"></td>
                </tr>
                <?php if ($showsTable['media'] == 'serie') {?>
                <tr>
                    <td>Seasons</td>
                    <td><input type="number" name="seasons" value="<?= $showsTable['seasons'] ?>"></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Country_of_origin</td>
                    <td><input type="text" name="country_of_origin" value="<?= $showsTable['country_of_origin'] ?>"></td>
                </tr>
                <tr>
                    <td>Language</td>
                    <td><input type="text" name="language" value="<?= $showsTable['language'] ?>"></td>
                </tr>
                <?php if ($showsTable['media'] == 'serie') {?>
                <tr>
                    <td>Rating</td>
                    <td><input type="text" name="rating" value="<?= $showsTable['rating'] ?>"></td>
                </tr>
                <?php } ?>
            </table>
            <br>
            <?php if ($showsTable['media'] == 'film') {?>
            <h2>youtube_trailer_id met deze opbouw: 'https://youtube.com/embed/cijfers en letters'</h2>
            <br>
            <input type="text" name="youtube_trailer_id" value="<?= $showsTable['youtube_trailer_id'] ?>">
            <br>
            <?php } ?>
            <h2>Summary:</h2>
            <input type="text" name="summary" value="<?= $showsTable['summary'] ?>">
            <br>
            <input type="submit" value="wijzigen">
        </form>
        <a href="index.php">
            <input type="submit" value="Terug naar beginpagina">
        </a>
    </body>
</html>
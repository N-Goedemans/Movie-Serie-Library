<?php

include("connection.php");

$title = "";
$rating = "";
$length_in_minutes = "";
$summary = "";
$awards = "";
$seasons = "";
$released_at = "";
$country_of_origin = "";
$language = "";
$youtube_trailer_id = "";
$media = "";

if (isset($_POST["title"])) {
    $title = $_POST["title"];
    $rating = $_POST["rating"];
    $length_in_minutes = $_POST["length_in_minutes"];
    $summary = $_POST["summary"];
    $awards = $_POST["awards"];
    $seasons = $_POST["seasons"];
    $released_at = $_POST["released_at"];
    $country_of_origin = $_POST["country_of_origin"];
    $language = $_POST["language"];
    $youtube_trailer_id = $_POST["youtube_trailer_id"];
    $media = $_POST["media"];

    $data = [
        'title' => $title,
        'rating' => $rating,
        'length_in_minutes' => $length_in_minutes,
        'summary' => $summary,
        'awards' => $awards,
        'seasons' => $seasons,
        'released_at' => $released_at,
        'country_of_origin' => $country_of_origin,
        'language' => $language,
        'youtube_trailer_id' => $youtube_trailer_id,
        'media' => $media
    ];

    $sql = "SELECT * FROM media;
    
    INSERT INTO 
    `media`
    (`title`, `rating`, `length_in_minutes`, `summary`, `awards`,  `released_at`, `seasons`, `country_of_origin`, `language`, `youtube_trailer_id`, `media`)
    VALUES 
    (:title, :rating, :length_in_minutes, :summary, :awards, :released_at, :seasons, :country_of_origin, :language, :youtube_trailer_id, :media)";

    echo "record added succesfully";

    $statement = $pdo->prepare($sql);
    $statement->execute($data);
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beheerderspaneel | Toevoegingsmenu</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <h1>Toevoegingsmenu</h1>
        <h2>Onthoud dat wanneer je een youtube URL wilt toevoegen je het zo moet doen: https://youtube.com/embed/cijfers en letters van video</h2>
        <p>als je een film wilt toevoegen mag je het volgende een 0 invullen: seasons, rating</p>
        <p>als je een serie wilt toevoegen mag je het volgende een 0 invullen: length in minutes, released at, youtube trailer</p>
        <form action="insert.php" method="post">
            <br>
            <table>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" id="title" required></td>
                </tr>
                <tr>
                    <td>Length in minutes</td>
                    <td><input type="text" name="length_in_minutes" id="length_in_minutes" required></td>
                </tr>
                
                <tr>
                    <td>Released at</td>
                    <td><input type="date" name="released_at" id="released_at" required></td>
                </tr>
                <tr>
                    <td>Awards</td>
                    <td><input type="number" name="awards" id="awards" required></td>
                </tr>
                <tr>
                    <td>Seasons</td>
                    <td><input type="number" name="seasons" id="seasons" required></td>
                </tr>
                <tr>
                    <td>Country of origin</td>
                    <td><input type="text" name="country_of_origin" id="country_of_origin" required></td>
                </tr>
                <tr>
                    <td>Language</td>
                    <td><input type="text" name="language" id="language" required></td>
                </tr>
                <tr>
                    <td>Rating</td>
                    <td><input type="text" name="rating" id="rating" required></td>
                </tr>
                <tr>
                    <td>Youtube trailer</td>
                    <td><input type="text" name="youtube_trailer_id" id="youtube_trailer_id" required></td>
                </tr>
            </table>
            <select name="media" id="madia" required>
                <option value="leeg">Kies jouw media type</option>
                <option value="serie">serie</option>
                <option value="film">film</option>
            </select>
            <h2>Summary:</h2>
            <textarea name="summary" cols="100" rows="10" id="summary" required></textarea>
            <br>
            <br>
            <input type="submit" value="toevoegen">
        </form>
        <a href="index.php">
            <input type="submit" value="Terug naar beginpagina">
        </a>
    </body>
    
</html>
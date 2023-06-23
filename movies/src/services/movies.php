<?php

/*
 * https://mit-license.org
 * Copyright © 2023 gparap
 * Web service to fetch all movies from the database as JSON.
 */

//connect the to database
require_once('../utils/connection.php');

//fetch all movies & their articles from the database
$query = "SELECT * from `movies`";
$query_result = mysqli_query($db_connection, $query);
if (!$query_result) {
    echo "Cannot connect to the movies database.";
    exit;
}
$movies = array();
while ($row = mysqli_fetch_assoc($query_result)) {
    //fetch the article for the current movie
    $article_id = $row['article_id'];
    $query_articles = "SELECT * from `movies_articles` WHERE id='$article_id'";
    $query_articles_result = mysqli_query($db_connection, $query_articles);

    //get the current article as an associative array
    $array_article = array();
    while ($row_article = mysqli_fetch_assoc($query_articles_result)) {
        $array_article[] = $row_article;
    }

    //construct the article
    $article = '[{';
    foreach ($array_article[0] as $key => $value) {
        //skip article id
        if ($key == "id") {
            continue;
        }
        $article .= '"';
        $article .= $key;
        $article .= '":"';
        $article .= $value;
        $article .= '",';//remove the last comma
    }
    $article = substr($article, 0, -1);
    $article .= '}]';

    //create the associative array for the current movie
    $movie = array(
        'link' => $row['link'],
        'title' => $row['title'],
        'image' => $row['image'],
        'cast' => $row['cast'],
        'director' => $row['director'],
        'script' => $row['script'],
        'producer' => $row['producer'],
        'photo' => $row['photo'],
        'editor' => $row['editor'],
        'music' => $row['music'],
        'publisher' => $row['publisher'],
        'duration' => $row['duration'],
        'country' => $row['country'],
        'lang' => $row['lang'],
        'plot' => $row['plot'],
        'article' => json_decode($article)
    );
    array_push($movies, $movie);
}

//create the final json response
$jsonArray = json_encode($movies);
$jsonResponse = array('movies' => json_decode($jsonArray));

//generate json response
echo json_encode($jsonResponse);

?>
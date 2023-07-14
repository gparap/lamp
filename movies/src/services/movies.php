<?php

/*
 * https://mit-license.org
 * Copyright © 2023 gparap
 * Web service to query movies from the database as JSON.
 */

//initialize variables to avoid server warnings
$query = "";
$title = "";
$genre = "";
$actor = "";
$director = "";
$publisher = "";
$year = "";

//get the movie title
if (isset($_GET['title'])){
    $title = trim($_GET['title']);
    $query = "SELECT * from `movies` WHERE title LIKE '%$title%'";
}
//get the movie genre
elseif (isset($_GET['genre'])){
    $genre = trim($_GET['genre']);
    $query = "SELECT * from `movies` WHERE genre LIKE '%$genre%'";
}
//get the movie actor
elseif (isset($_GET['actor'])){
    $actor = trim($_GET['actor']);
    $query = "SELECT * from `movies` WHERE cast LIKE '%$actor%'";
}
//get the movie director
elseif (isset($_GET['director'])){
    $director = trim($_GET['director']);
    $query = "SELECT * from `movies` WHERE director LIKE '%$director%'";
}
//get the movie publisher
elseif (isset($_GET['publisher'])){
    $publisher = trim($_GET['publisher']);
    $query = "SELECT * from `movies` WHERE publisher LIKE '%$publisher%'";
}
//get the movie year
elseif (isset($_GET['year'])){
    $year = trim($_GET['year']);
    $query = "SELECT * from `movies` WHERE year LIKE '%$year%'";
}
else{
    $query = "SELECT * from `movies`";
}

//connect the to database
require_once('../utils/connection.php');

//fetch all movies & their articles from the database
$query_result = mysqli_query($db_connection, $query);
if (!$query_result) {
    echo "Cannot connect to the movies database.";
    exit;
}
$movies = array();
while ($row = mysqli_fetch_assoc($query_result)) {
    //fetch the article for the current movie record
    $article_id = $row['article_id'];
    $query_articles = "SELECT * from `movies_articles` WHERE id='$article_id'";
    $query_articles_result = mysqli_query($db_connection, $query_articles);

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
        $article .= '",';
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
        'year' => $row['year'],
        'duration' => $row['duration'],
        'country' => $row['country'],
        'lang' => $row['lang'],
        'plot' => $row['plot'],
        'article' => json_decode($article)
    );
    array_push($movies, $movie);
}

//create the "movies" json object
$jsonArray = json_encode($movies);
$jsonObject = array('movies' => json_decode($jsonArray));

//generate json response
echo json_encode($jsonObject);

?>

<?php

$file_db = new PDO('sqlite:bd.sqlite3');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


$file_db->exec("CREATE TABLE IF NOT EXISTS GenreAlbum ( 
    albumId INTEGER,
    genreId INTEGER,
    FOREIGN KEY(albumId) REFERENCES Album(albumId),
    FOREIGN KEY(genreId) REFERENCES Genre(genreId)
    )");
?>
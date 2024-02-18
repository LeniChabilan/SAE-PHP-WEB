<?php



$file_db->exec("CREATE TABLE IF NOT EXISTS GenreAlbum ( 
    albumId INTEGER,
    genreId INTEGER,
    FOREIGN KEY(albumId) REFERENCES Album(albumId),
    FOREIGN KEY(genreId) REFERENCES Genre(genreId)
    )");
?>
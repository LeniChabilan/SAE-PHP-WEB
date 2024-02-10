<?php


$file_db->exec("CREATE TABLE IF NOT EXISTS Musique ( 
    musiqueId INTEGER PRIMARY KEY AUTOINCREMENT,
    nomMusique VARCHAR(50),
    dure time,
    albumId INTEGER,
    FOREIGN KEY(albumId) REFERENCES Album(albumId))");

?>
<?php

$file_db = new PDO('sqlite:bd.sqlite3');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


$file_db->exec("CREATE TABLE IF NOT EXISTS Album ( 
    albumId INTEGER PRIMARY KEY AUTOINCREMENT,
    nomAlbum VARCHAR(50),
    AnneeAlbum INTEGER,
    imageAlbum BLOB,
    nomProducteur VARCHAR(50),
    artisteId INTEGER,
    FOREIGN KEY(artisteId) REFERENCES Artiste(artisteId)   
    )");

?>
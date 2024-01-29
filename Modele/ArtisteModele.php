<?php

$file_db = new PDO('sqlite:bd.sqlite3');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


$file_db->exec("CREATE TABLE IF NOT EXISTS Artiste ( 
    artisteId INTEGER PRIMARY KEY AUTOINCREMENT,
    nomArtiste VARCHAR(50))");

?>
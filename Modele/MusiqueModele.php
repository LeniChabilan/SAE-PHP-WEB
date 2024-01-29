<?php

$file_db = new PDO('sqlite:bd.sqlite3');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$file_db->exec("CREATE TABLE IF NOT EXISTS Musique ( 
    musiqueId INTEGER PRIMARY KEY AUTOINCREMENT,
    nomMusique VARCHAR(50))");

?>
<?php


$file_db->exec("CREATE TABLE IF NOT EXISTS Genre ( 
    genreId INTEGER PRIMARY KEY AUTOINCREMENT,
    nomGenre VARCHAR(50))");
?>
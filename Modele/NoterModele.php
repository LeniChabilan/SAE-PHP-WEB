<?php


$file_db->exec("CREATE TABLE IF NOT EXISTS Noter ( 
    albumId INTEGER,
    utilisateurId INTEGER,
    note INTEGER,
    FOREIGN KEY(albumId) REFERENCES Album(albumId),
    FOREIGN KEY(utilisateurId) REFERENCES Utilisateur(utilisateurId)
    )");

?>
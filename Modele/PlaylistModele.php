<?php



$file_db->exec("CREATE TABLE IF NOT EXISTS Playlist ( 
    playlistId INTEGER PRIMARY KEY AUTOINCREMENT,
    nomPlaylist VARCHAR(50),
    utiId INTEGER,
    FOREIGN KEY(utiId) REFERENCES Utilisateur(utilisateurId)
    )");

?>
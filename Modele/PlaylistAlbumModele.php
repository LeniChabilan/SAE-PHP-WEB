<?php


$file_db->exec("CREATE TABLE IF NOT EXISTS PlaylistAlbum(
    playlistId INTEGER,
    albumId INTEGER,
    FOREIGN KEY(playlistId) REFERENCES Playlist(playlistId),
    FOREIGN KEY(albumId) REFERENCES Album(albumId)
    )");

?>
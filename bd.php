<?php


$file_db = new PDO('sqlite:bd.sqlite3');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


$file_db->exec("CREATE TABLE IF NOT EXISTS Utilisateur ( 
    utilisateurId INTEGER PRIMARY KEY,
    nomUtilisateir VARCHAR(50),
    emailUtilisateur VARCHAR(50),
    MDPutilisateur VARCHAR(50),
    roleUtilisateur VARCHAR(50),
    DdN DATE,
    numTel TEXT)");

$file_db->exec("CREATE TABLE IF NOT EXISTS Artiste ( 
    artisteId INTEGER PRIMARY KEY,
    nomArtiste VARCHAR(50))");

$file_db->exec("CREATE TABLE IF NOT EXISTS Album ( 
    albumId INTEGER PRIMARY KEY,
    nomAlbum VARCHAR(50),
    AnneeAlbum INTEGER,
    imageAlbum BLOB,
    nomProducteur VARCHAR(50),
    artisteId INTEGER,
    FOREIGN KEY(artisteId) REFERENCES Artiste(artisteId)

    
    )");


$file_db->exec("CREATE TABLE IF NOT EXISTS Musique ( 
    musiqueId INTEGER PRIMARY KEY,
    nomMusique VARCHAR(50))");

$file_db->exec("CREATE TABLE IF NOT EXISTS Genre ( 
    genreId INTEGER PRIMARY KEY,
    nomGenre VARCHAR(50))");




$file_db->exec("CREATE TABLE IF NOT EXISTS GenreAlbum ( 
    albumId INTEGER,
    genreId INTEGER,
    FOREIGN KEY(albumId) REFERENCES Album(albumId),
    FOREIGN KEY(genreId) REFERENCES Genre(genreId)
    )");


$file_db->exec("CREATE TABLE IF NOT EXISTS Noter ( 
    albumId INTEGER,
    utilisateurId INTEGER,
    FOREIGN KEY(albumId) REFERENCES Album(albumId),
    FOREIGN KEY(utilisateurId) REFERENCES Utilisateur(utilisateurId)
    )");


?>


<!-- $file_db->exec("CREATE TABLE IF NOT EXISTS NouvelleTable ( 
    nouvelleTableId INTEGER PRIMARY KEY,
    utilisateurId INTEGER,
    autreColonne TEXT,
    FOREIGN KEY (utilisateurId) REFERENCES Utilisateur(utilisateurId)
)"); -->



<!-- $requete->bindParam(':contenu', $contenuImage, PDO::PARAM_LOB); -->
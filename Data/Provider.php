<?php

// Liste de vos fichiers contenant les définitions de vos tables
$files = [
    '../Modele/UtilisateurModele.php',
    '../Modele/ArtisteModele.php',
    '../Modele/AlbumModele.php',
    '../Modele/MusiqueModele.php',
    '../Modele/GenreModele.php',
    '../Modele/GenreAlbumModele.php',
    '../Modele/NoterModele.php',
    '../Modele/PlaylistModele.php',
    '../Modele/PlaylistAlbumModele.php',
];

try {
    $file_db = new PDO('sqlite:bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    // Pour chaque fichier, incluez-le et exécutez son contenu
    foreach ($files as $file) {
        require_once $file;
    }
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

require_once './insertBd.php';
?>

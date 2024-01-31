<?php

try {
    $file_db = new PDO('sqlite:bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

require_once 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$yamlFile = 'extrait.yml';
$data = Yaml::parseFile($yamlFile);

// Requête d'insertion pour Genre
$insertGenre = "INSERT INTO Genre (nomGenre) VALUES (:nomGenre)";
$stmtGenre = $file_db->prepare($insertGenre);

// Requête d'insertion pour Artiste
$insertArtiste = "INSERT INTO Artiste (nomArtiste) VALUES (:nomArtiste)";
$stmtArtiste = $file_db->prepare($insertArtiste);

// Requête d'insertion pour Album
$insertAlbum = "INSERT INTO Album (nomAlbum, AnneeAlbum, imageAlbum, nomProducteur, artisteId) 
               VALUES (:nomAlbum, :AnneeAlbum, :imageAlbum, :nomProducteur, :artisteId)";
$stmtAlbum = $file_db->prepare($insertAlbum);


foreach ($data as $entry) {
    if (isset($entry['genre'])) {
        $genres = (array)$entry['genre'];
        foreach ($genres as $nomGenre) {
            $nomGenre = strtolower($nomGenre);

            // Vérifier si le genre existe déjà en base de données
            $checkGenreQuery = "SELECT * FROM Genre WHERE nomGenre = :nomGenre";
            $stmtCheckGenre = $file_db->prepare($checkGenreQuery);
            $stmtCheckGenre->bindParam(':nomGenre', $nomGenre);
            $stmtCheckGenre->execute();

            // Utiliser fetch pour récupérer la première ligne
            $existingGenre = $stmtCheckGenre->fetch(PDO::FETCH_ASSOC);

            // Si le genre n'existe pas, l'ajouter
            if (!$existingGenre) {
                $stmtGenre->bindParam(':nomGenre', $nomGenre);
                $stmtGenre->execute();
            }
        }
    }

    if (isset($entry['by'])) {
        $nomArtiste = strtolower($entry['by']);

        // Vérifier si l'artiste existe déjà en base de données
        $checkArtisteQuery = "SELECT * FROM Artiste WHERE nomArtiste = :nomArtiste";
        $stmtCheckArtiste = $file_db->prepare($checkArtisteQuery);
        $stmtCheckArtiste->bindParam(':nomArtiste', $nomArtiste);
        $stmtCheckArtiste->execute();

        // Utiliser fetch pour récupérer la première ligne
        $existingArtiste = $stmtCheckArtiste->fetch(PDO::FETCH_ASSOC);

        // Si l'artiste n'existe pas, l'ajouter
        if (!$existingArtiste) {
            $stmtArtiste->bindParam(':nomArtiste', $nomArtiste);
            $stmtArtiste->execute();
        }
    }

    $nomAlbum = $entry['title'];
    $AnneeAlbum = $entry['releaseYear'];
    $imageAlbum = $entry['img'];
    $nomProducteur = $entry['parent'];

    // Récupérer l'ID de l'artiste
    $nomArtiste = strtolower($entry['by']);
    $getArtisteIdQuery = "SELECT artisteId FROM Artiste WHERE nomArtiste = :nomArtiste";
    $stmtGetArtisteId = $file_db->prepare($getArtisteIdQuery);
    $stmtGetArtisteId->bindParam(':nomArtiste', $nomArtiste);
    $stmtGetArtisteId->execute();
    $artisteId = $stmtGetArtisteId->fetchColumn();

    // Récupérer les ID des genres
    $genreIds = [];
    if (isset($entry['genre'])) {
        $genres = (array)$entry['genre'];
        foreach ($genres as $nomGenre) {
            $nomGenre = strtolower($nomGenre);

            $getGenreIdQuery = "SELECT genreId FROM Genre WHERE nomGenre = :nomGenre";
            $stmtGetGenreId = $file_db->prepare($getGenreIdQuery);
            $stmtGetGenreId->bindParam(':nomGenre', $nomGenre);
            $stmtGetGenreId->execute();
            $genreId = $stmtGetGenreId->fetchColumn();

            if ($genreId) {
                $genreIds[] = $genreId;
            }
        }
    }

    // Insérer l'album dans la table Album
    $stmtAlbum->bindParam(':nomAlbum', $nomAlbum);
    $stmtAlbum->bindParam(':AnneeAlbum', $AnneeAlbum);
    $stmtAlbum->bindParam(':imageAlbum', $imageAlbum);
    $stmtAlbum->bindParam(':nomProducteur', $nomProducteur);
    $stmtAlbum->bindParam(':artisteId', $artisteId);
    $stmtAlbum->execute();

    $albumId = $file_db->lastInsertId(); // Récupérer l'ID de l'album inséré

    // Insérer les associations entre l'album et les genres dans la table AlbumGenre
    foreach ($genreIds as $genreId) {
        $file_db->exec("INSERT INTO GenreAlbum (albumId, genreId) VALUES ($albumId, $genreId)");
    }
}

echo "Genres et artistes ajoutés en base de données avec succès";

$file_db = null;

?>

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
}

echo "Genres et artistes ajoutés en base de données avec succès";

$file_db = null;

?>

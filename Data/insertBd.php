<?php

// Inclure la classe PDO
try {
    $file_db = new PDO('sqlite:bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

require_once 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

// Charger le contenu du fichier YAML
$yamlFile = 'extrait.yml'; // Remplacez par le nom réel de votre fichier YAML
$data = Yaml::parseFile($yamlFile);

// Liste pour stocker les genres et les noms d'artistes
$genresList = array();
$artistesList = array();

// Parcourir les données YAML et ajouter les genres et les noms d'artistes à la liste
foreach ($data as $entry) {
    // Ajouter les genres à la liste
    if (isset($entry['genre'])) {
        $genres = $entry['genre'];

        // Si "genre" est une chaîne, convertir en tableau pour la suite
        if (!is_array($genres)) {
            $genres = array($genres);
        }

        // Convertir tous les genres en minuscules et ajouter à la liste
        $genresList = array_merge($genresList, array_map('strtolower', $genres));
    }

    // Ajouter les noms d'artistes à la liste
    if (isset($entry['by'])) {
        $artiste = $entry['by'];
        // Convertir le nom de l'artiste en minuscules et ajouter à la liste
        $artistesList[] = strtolower($artiste);
    }
}

// Supprimer les doublons de la liste des genres tout en ignorant la casse
$genresList = array_unique($genresList, SORT_STRING | SORT_FLAG_CASE);

// Supprimer les doublons de la liste des noms d'artistes tout en ignorant la casse
$artistesList = array_unique($artistesList, SORT_STRING | SORT_FLAG_CASE);

// Afficher la liste des genres pour le débogage
print_r($genresList);

// Afficher la liste des noms d'artistes pour le débogage
print_r($artistesList);

// Requête d'insertion pour Genre
$insertGenre = "INSERT INTO Genre (nomGenre) VALUES (:nomGenre)";
$stmtGenre = $file_db->prepare($insertGenre);

// Parcourir la liste des genres et les insérer dans la base de données
foreach ($genresList as $nomGenre) {
    // Vérifier si le genre existe déjà en base de données
    $checkGenreQuery = "SELECT * FROM Genre WHERE nomGenre = :nomGenre";
    $stmtCheckGenre = $file_db->prepare($checkGenreQuery);
    $stmtCheckGenre->bindParam(':nomGenre', $nomGenre);
    $stmtCheckGenre->execute();

    // Si le genre n'existe pas, l'ajouter
        $stmtGenre->bindParam(':nomGenre', $nomGenre);
        $stmtGenre->execute();

}

// Requête d'insertion pour Artiste
$insertArtiste = "INSERT INTO Artiste (nomArtiste) VALUES (:nomArtiste)";
$stmtArtiste = $file_db->prepare($insertArtiste);

// Parcourir la liste des noms d'artistes et les insérer dans la base de données
foreach ($artistesList as $nomArtiste) {
    // Vérifier si l'artiste existe déjà en base de données
    $checkArtisteQuery = "SELECT * FROM Artiste WHERE nomArtiste = :nomArtiste";
    $stmtCheckArtiste = $file_db->prepare($checkArtisteQuery);
    $stmtCheckArtiste->bindParam(':nomArtiste', $nomArtiste);
    $stmtCheckArtiste->execute();

    // Si l'artiste n'existe pas, l'ajouter
        $stmtArtiste->bindParam(':nomArtiste', $nomArtiste);
        $stmtArtiste->execute();
}

echo "Genres et artistes ajoutés en base de données avec succès";

$file_db = null;
?>

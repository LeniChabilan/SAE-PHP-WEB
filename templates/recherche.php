<?php
// Connexion à la base de données et récupération du terme de recherche
$searchTerm = $_GET['searchTerm'];
$file_db = new PDO('sqlite:../Data/bd.sqlite3');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// Requête SQL pour filtrer les albums en fonction du terme de recherche
if (is_numeric($searchTerm)) {
    // Si le terme de recherche est numérique, recherchez uniquement par année
    $query = "SELECT DISTINCT Album.* FROM Album WHERE AnneeAlbum = :searchYear";
    $stmt = $file_db->prepare($query);
    $stmt->bindParam(':searchYear', $searchTerm, PDO::PARAM_INT);
} else {
    // Si le terme de recherche n'est pas numérique, recherchez par nom d'album ou nom d'artiste
    $query = "SELECT DISTINCT Album.* FROM Album 
              NATURAL JOIN Artiste 
              NATURAL JOIN GenreAlbum 
              NATURAL JOIN Genre 
              WHERE nomAlbum LIKE :searchTerm 
              OR AnneeAlbum LIKE :searchTerm 
              OR nomArtiste LIKE :searchTerm 
              OR nomGenre LIKE :searchTerm";
    $stmt = $file_db->prepare($query);
    $searchTerm = "%$searchTerm%";
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
}
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fermeture de la connexion à la base de données
$file_db = null;

// Renvoi des résultats au format JSON
echo json_encode($results);
?>

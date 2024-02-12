<?php
try {
    $file_db = new PDO('sqlite:../Data/bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Vérifier si l'ID de l'artiste à supprimer a été fourni dans l'URL
if(isset($_SERVER['QUERY_STRING'])) {
    // Récupérer l'ID de l'artiste à partir de la chaîne de requête
    $albumId = $_SERVER['QUERY_STRING'];



    // Préparer la requête de suppression
    $deletePlaylistAlbum = "DELETE FROM PlaylistAlbum WHERE albumId = :albumId";
    $deleteNoter = "DELETE FROM Noter WHERE albumId = :albumId";
    $deleteGenreAlbum = "DELETE FROM GenreAlbum WHERE albumId = :albumId";
    $deleteMusique = "DELETE FROM Musique WHERE albumId = :albumId";
    $deleteAlbum = "DELETE FROM Album WHERE albumId = :albumId";

    $stmtDeletePlaylistAlbum = $file_db->prepare($deletePlaylistAlbum);
    $stmtDeleteNoter = $file_db->prepare($deleteNoter);
    $stmtDeleteGenreAlbum = $file_db->prepare($deleteGenreAlbum);
    $stmtDeleteMusique = $file_db->prepare($deleteMusique);
    $stmtDeleteAlbum = $file_db->prepare($deleteAlbum);

    $stmtDeletePlaylistAlbum->bindParam(':albumId', $albumId);
    $stmtDeleteNoter->bindParam(':albumId', $albumId);
    $stmtDeleteGenreAlbum->bindParam(':albumId', $albumId);
    $stmtDeleteMusique->bindParam(':albumId', $albumId);
    $stmtDeleteAlbum->bindParam(':albumId', $albumId);

    // Exécuter la requête de suppression
    if ($stmtDeletePlaylistAlbum->execute() && $stmtDeleteNoter->execute() && $stmtDeleteGenreAlbum->execute() && $stmtDeleteMusique->execute() && $stmtDeleteAlbum->execute()){
        // Redirection vers la page d'accueil après la suppression réussie
        header("Location: ../templates/admin.php?filter=liste_album");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Une erreur est survenue lors de la suppression de l'artiste.";
    }
} else {
    echo "ID de l'artiste non fourni.";
}
?>

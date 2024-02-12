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
    $utiliId = $_SERVER['QUERY_STRING'];

    $playlistId = "select playlistId from Playlist where utiId = :utiliId";
    $stmtPlaylistId = $file_db->prepare($playlistId);
    $stmtPlaylistId->bindParam(':utiliId', $utiliId);
    $stmtPlaylistId->execute();
    $playlistId = $stmtPlaylistId->fetch();

    // Préparer la requête de suppression
    $deletePlaylistAlbum = "DELETE FROM PlaylistAlbum WHERE playlistId = :playlistId";
    $deletePlaylist = "DELETE FROM Playlist WHERE utiId = :utiliId";
    $deleteNoter = "DELETE FROM Noter WHERE utilisateurId = :utiliId";
    $deleteUtilisteur = "DELETE FROM Utilisateur WHERE utilisateurId = :utiliId";

    $stmtDeletePlaylistAlbum = $file_db->prepare($deletePlaylistAlbum);
    $stmtDeletePlaylist = $file_db->prepare($deletePlaylist);
    $stmtDeleteNoter = $file_db->prepare($deleteNoter);
    $stmtDeleteUtilisteur = $file_db->prepare($deleteUtilisteur);

    $stmtDeletePlaylistAlbum->bindParam(':playlistId', $playlistId['playlistId']);
    $stmtDeletePlaylist->bindParam(':utiliId', $utiliId);
    $stmtDeleteNoter->bindParam(':utiliId', $utiliId);
    $stmtDeleteUtilisteur->bindParam(':utiliId', $utiliId);


    // Exécuter la requête de suppression
    if ($stmtDeletePlaylistAlbum->execute() && $stmtDeletePlaylist->execute() && $stmtDeleteNoter->execute() && $stmtDeleteUtilisteur->execute()){
        // Redirection vers la page d'accueil après la suppression réussie
        header("Location: ../templates/admin.php?filter=liste_utilisateurs");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Une erreur est survenue lors de la suppression de l'artiste.";
    }
} else {
    echo "ID de l'artiste non fourni.";
}
?>

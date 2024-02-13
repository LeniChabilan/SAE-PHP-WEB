<?php
try {
    $file_db = new PDO('sqlite:../Data/bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Vérifier si l'ID de l'artiste à supprimer a été fourni dans l'URL
if(isset($_GET['playlistId']) && isset($_GET['albumId'])) {
    $playlistId = $_GET['playlistId'];
    $albumId = $_GET['albumId'];

    // Préparer la requête de suppression
    $deletePlaylistAlbum = "DELETE FROM PlaylistAlbum WHERE playlistId = :playlistId AND albumId = :albumId";
    $stmtDelete = $file_db->prepare($deletePlaylistAlbum);

    $stmtDelete->bindParam(':playlistId', $playlistId );
    $stmtDelete->bindParam(':albumId', $albumId );

    // Exécuter la requête de suppression
    if ($stmtDelete->execute()) {
        // Redirection vers la page d'accueil après la suppression réussie
        header("Location: ./../templates/playlists.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Une erreur est survenue lors de la suppression de l'artiste.";
    }
} else {
    echo "ID de l'artiste non fourni.";
}
?>

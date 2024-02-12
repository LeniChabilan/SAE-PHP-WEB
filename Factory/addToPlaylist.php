<?php
try {
    $file_db = new PDO('sqlite:../Data/bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

$insertPlaylist = "INSERT INTO PlaylistAlbum (playlistId, albumId) VALUES (:playlistId, :albumId)";
$stmtPlaylist = $file_db->prepare($insertPlaylist);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['playlist'])) {
    $playlistId = $_POST['playlist'];
    $alId = $_GET['albumId'];

    $stmtPlaylist->bindParam(':playlistId', $playlistId);
    $stmtPlaylist->bindParam(':albumId', $alId);

    if ($stmtPlaylist->execute()) {
        header("Location: ../templates/album.php?filter=".$alId);
        exit(); 
    } else {
        echo "Une erreur est survenue lors de l'ajout de l'album a la playlist.";
    }
}
?>

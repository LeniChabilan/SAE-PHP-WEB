<?php

session_start(); 

$idUser=$_SESSION['loggedUser']['id'];

try {
    $file_db = new PDO('sqlite:../Data/bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

$insertPlaylist = "INSERT INTO Playlist (nomPlaylist,utiId) VALUES (:nomPlaylist,:utiId)";
$stmtPlaylist = $file_db->prepare($insertPlaylist);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom'])) {
    $nom_playlist = $_POST['nom'];

    $stmtPlaylist->bindParam(':nomPlaylist', $nom_playlist);
    $stmtPlaylist->bindParam(':utiId', $idUser);

    if ($stmtPlaylist->execute()) {
        header("Location: ../templates/playlists.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Une erreur est survenue lors de l'ajout de l'artiste.";
    }
}
?>

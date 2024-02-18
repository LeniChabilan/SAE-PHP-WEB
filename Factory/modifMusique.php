<?php
try {
    $file_db = new PDO('sqlite:../Data/bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

$updateMusique = "UPDATE Musique SET nomMusique = :nomMusique, dure = :dure, albumId = :albumId WHERE musiqueId = :musiqueId";
$stmtMusique = $file_db->prepare($updateMusique);

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom'])) {
    // Récupérer les données du formulaire
    $id_musique = $_POST['id'];
    $nom_musique = $_POST['nom'];
    $duree=$_POST['dure'];
    $album_id=$_POST['album'];

    // Liaison des paramètres
    $stmtMusique->bindParam(':musiqueId', $id_musique);
    $stmtMusique->bindParam(':nomMusique', $nom_musique);
    $stmtMusique->bindParam(':dure', $duree);
    $stmtMusique->bindParam(':albumId', $album_id);

    // Exécuter la requête
    if ($stmtMusique->execute()) {
        // Redirection vers la page d'accueil après l'ajout réussi
        header("Location: ../templates/admin.php?filter=liste_musique");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Une erreur est survenue lors de l'ajout de l'artiste.";
    }
}
?>

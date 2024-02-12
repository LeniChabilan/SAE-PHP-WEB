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
    $musiqueId = $_SERVER['QUERY_STRING'];

    // Préparer la requête de suppression
    $deleteMusique = "DELETE FROM Musique WHERE musiqueId = :musiqueId";
    $stmtDelete = $file_db->prepare($deleteMusique);
    $stmtDelete->bindParam(':musiqueId', $musiqueId);

    // Exécuter la requête de suppression
    if ($stmtDelete->execute()) {
        // Redirection vers la page d'accueil après la suppression réussie
        header("Location: ../templates/admin.php?filter=liste_musique");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Une erreur est survenue lors de la suppression de l'artiste.";
    }
} else {
    echo "ID de l'artiste non fourni.";
}
?>

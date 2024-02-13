<?php
try {
    $file_db = new PDO('sqlite:../Data/bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

$updateArtiste = "UPDATE Artiste SET nomArtiste = :nomArtiste WHERE artisteId = :artisteId";
$stmtArtiste = $file_db->prepare($updateArtiste);

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom']) && isset($_POST['id'])) {
    // Récupérer les données du formulaire
    $artisteId = $_POST['id'];
    $nom_artiste = $_POST['nom'];

    // Liaison des paramètres
    $stmtArtiste->bindParam(':nomArtiste', $nom_artiste);
    $stmtArtiste->bindParam(':artisteId', $artisteId);

    // Exécuter la requête
    if ($stmtArtiste->execute()) {
        // Redirection vers la page d'accueil après l'ajout réussi
        header("Location: ../templates/admin.php?filter=liste_Artistes");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Une erreur est survenue lors de l'ajout de l'artiste.";
    }
}
?>

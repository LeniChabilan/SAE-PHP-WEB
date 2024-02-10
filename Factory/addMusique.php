<?php
try {
    $file_db = new PDO('sqlite:../Data/bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

$insertArtiste = "INSERT INTO Artiste (nomArtiste) VALUES (:nomArtiste)";
$stmtArtiste = $file_db->prepare($insertArtiste);

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom'])) {
    // Récupérer les données du formulaire
    $nom_artiste = $_POST['nom'];

    // Liaison des paramètres
    $stmtArtiste->bindParam(':nomArtiste', $nom_artiste);

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

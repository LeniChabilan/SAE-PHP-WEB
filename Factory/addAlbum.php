<?php
try {
    $file_db = new PDO('sqlite:../Data/bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

$insertAlbum = "INSERT INTO Album (nomAlbum, AnneeAlbum, imageAlbum, nomProducteur, artisteId) 
                VALUES (:nomAlbum, :AnneeAlbum, :imageAlbum, :nomProducteur, :artisteId)";
$stmtAlbum = $file_db->prepare($insertAlbum);

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom'])) {
    // Récupérer les données du formulaire
    $nom_album = $_POST['nom'];
    $annee_album = $_POST['annee'];
    $image_album = ''; // Initialiser la variable pour stocker l'image en base64
    $producteur = $_POST['producteur'];
    $artiste_id = $_POST['artiste']; // Supposons que c'est l'ID de l'artiste sélectionné

    // Vérifier si un fichier a été téléchargé
    if(isset($_FILES['imgs']) && $_FILES['imgs']['size'] > 0){
        // Lire le contenu du fichier image et le convertir en base64
        $image_album = base64_encode(file_get_contents($_FILES['imgs']['tmp_name']));
    }

    // Liaison des paramètres
    $stmtAlbum->bindParam(':nomAlbum', $nom_album);
    $stmtAlbum->bindParam(':AnneeAlbum', $annee_album);
    $stmtAlbum->bindParam(':imageAlbum', $image_album);
    $stmtAlbum->bindParam(':nomProducteur', $producteur);
    $stmtAlbum->bindParam(':artisteId', $artiste_id);

    // Exécuter la requête
    if ($stmtAlbum->execute()) {
        // Redirection vers la page d'accueil ou une autre page après l'ajout réussi
        header("Location: ../templates/admin.php?filter=liste_album");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Une erreur est survenue lors de l'ajout de l'album.";
    }
}
?>

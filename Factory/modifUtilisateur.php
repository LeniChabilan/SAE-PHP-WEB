<?php
try {
    // Connexion à la base de données
    $file_db = new PDO('sqlite:../Data/bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, affichez un message d'erreur
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Requête SQL pour vérifier si l'email existe déjà
$checkEmailQuery = "SELECT COUNT(*) FROM Utilisateur WHERE emailUtilisateur = :email";
$stmtCheckEmail = $file_db->prepare($checkEmailQuery);

// Requête SQL pour insérer un nouvel utilisateur
$updateUtilisateur = "UPDATE Utilisateur SET nomUtilisateir = :nomUtilisateur, emailUtilisateur = :emailUtilisateur, MDPutilisateur = :MDPutilisateur, roleUtilisateur = :roleUtilisateur, DdN = :DdN, numTel = :numTel WHERE idUtilisateur = :idUtilisateur";
$stmtUtilisateur = $file_db->prepare($updateUtilisateur);

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomUtilisateur'], $_POST['emailUtilisateur'], $_POST['DdN'], $_POST['tel'], $_POST['MDPUtilisateur'])) {
    // Récupérer les données du formulaire
    $idUtilisateur = $_POST['idUtilisateur'];
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $emailUtilisateur = $_POST['emailUtilisateur'];
    $DdN = $_POST['DdN'];
    $tel = $_POST['tel'];
    $MDPUtilisateur = $_POST['MDPUtilisateur'];
    $roleUtilisateur = "utilisateur";

    // Liaison des paramètres pour la vérification de l'email
    $stmtCheckEmail->bindParam(':email', $emailUtilisateur);
    $stmtCheckEmail->execute();
    $emailExists = $stmtCheckEmail->fetchColumn();

    // Vérifier si l'email existe déjà dans la base de données
    if ($emailExists) {
        // Afficher un message d'erreur ou rediriger l'utilisateur vers une page indiquant que l'email est déjà utilisé
        header("Location: ../templates/inscription.php?error=Email déjà utilisé. Veuillez en choisir un autre.");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        // Liaison des paramètres pour l'insertion de l'utilisateur
        $smtpUtilisateur->bindParam(':idUtilisateur', $idUtilisateur);
        $stmtUtilisateur->bindParam(':nomUtilisateur', $nomUtilisateur);
        $stmtUtilisateur->bindParam(':emailUtilisateur', $emailUtilisateur);
        $stmtUtilisateur->bindParam(':DdN', $DdN);
        $stmtUtilisateur->bindParam(':numTel', $tel);
        $stmtUtilisateur->bindParam(':MDPutilisateur', $MDPUtilisateur);
        $stmtUtilisateur->bindParam(':roleUtilisateur', $roleUtilisateur);

        // Exécuter la requête d'insertion de l'utilisateur
        if ($stmtUtilisateur->execute()) {
            // Redirection vers la page de connexion après l'inscription réussie
            header("Location: ../templates/connexion.php");
            exit(); // Assurez-vous de terminer le script après la redirection
        } else {
            // En cas d'erreur lors de l'exécution de la requête SQL
            echo "Une erreur est survenue lors de l'inscription.";
        }
    }
}
?>

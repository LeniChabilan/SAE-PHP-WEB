<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Music'o</title>
    <link rel="stylesheet" href="../static/base.css" />
    <link rel="stylesheet" href="../static/connexion.css" />
    <link rel="website icon" type="png" href="./Data/images/logomusico.png" />

    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
</head>
<body class="light">

<header>
    <div class="gauche">
        <a href="../index.php">
            <img class="img_base" id="img1" src="../Data/images/logomusico.png" alt="image du logo de l'application" />
        </a>
    </div>
</header>

<?php
session_start(); // Démarrez la session si ce n'est pas déjà fait

// Vérifiez si l'utilisateur est déjà connecté
if (isset($_SESSION['loggedUser'])) {
    // Rediriger vers la page d'accueil si l'utilisateur est déjà connecté
    header("Location: ../index.php"); // Redirection vers index.php
    exit; // Assurez-vous de terminer l'exécution du script après la redirection
}

// Le reste de votre code de connexion continue ici

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postData = $_POST;

    $file_db = new PDO('sqlite:../Data/bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $query = "SELECT * FROM Utilisateur";

    $users = $file_db->query($query);

    if (isset($postData['email']) && isset($postData['password'])) {
        if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
            $errorMessage = 'Il faut un email valide pour soumettre le formulaire.';
        } else {
            foreach ($users as $user) {
                if (
                    $user['emailUtilisateur'] === $postData['email'] &&
                    $user['MDPutilisateur'] === $postData['password']
                ) {
                    $loggedUser = [
                        'email' => $user['emailUtilisateur'],
                        'name' => $user['nomUtilisateur'],
                        'id'=>$user['utilisateurId'],
                    ];

                    $_SESSION['loggedUser'] = $loggedUser;
                    if ($user['roleUtilisateur'] === 'admin') {
                        header("Location: admin.php"); 
                        exit; 
                    }
                    else {
                        header("Location: ../index.php");
                        exit;
                    }
                }
            }

            if (!isset($loggedUser)) {
                $errorMessage = sprintf(
                    'Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                    $postData['email'],
                    strip_tags($postData['password'])
                );
            }
        }
    }
}

?>

<div class="main">
    <div class="card">
        <h4 class="title">Se connecter :</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <?php if (isset($errorMessage)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errorMessage; ?>
                </div>
            <?php endif; ?>
            <div class="field">
                <svg class="input-icon" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                    <path d="M207.8 20.73c-93.45 18.32-168.7 93.66-187 187.1c-27.64 140.9 68.65 266.2 199.1 285.1c19.01 2.888 36.17-12.26 36.17-31.49l.0001-.6631c0-15.74-11.44-28.88-26.84-31.24c-84.35-12.98-149.2-86.13-149.2-174.2c0-102.9 88.61-185.5 193.4-175.4c91.54 8.869 158.6 91.25 158.6 183.2l0 16.16c0 22.09-17.94 40.05-40 40.05s-40.01-17.96-40.01-40.05v-120.1c0-8.847-7.161-16.02-16.01-16.02l-31.98 .0036c-7.299 0-13.2 4.992-15.12 11.68c-24.85-12.15-54.24-16.38-86.06-5.106c-38.75 13.73-68.12 48.91-73.72 89.64c-9.483 69.01 43.81 128 110.9 128c26.44 0 50.43-9.544 69.59-24.88c24 31.3 65.23 48.69 109.4 37.49C465.2 369.3 496 324.1 495.1 277.2V256.3C495.1 107.1 361.2-9.332 207.8 20.73zM239.1 304.3c-26.47 0-48-21.56-48-48.05s21.53-48.05 48-48.05s48 21.56 48 48.05S266.5 304.3 239.1 304.3z"></path>
                </svg>
                <div class="col-sm-10">
                    <input type="email" name="email" size="50" class="input-field" placeholder="Nom Utilisateur">
                </div>
            </div>
            <div class="field">
                <svg class="input-icon" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                    <path d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z"></path>
                </svg>
                <div class="col-sm-10">
                    <input type="password" name="password" size="50" class="input-field" placeholder="Mot De Passe">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn_c btn-default">Se connecter</button>
                </div>
            </div>
        </form>
    </div>
    <div class="cardInscription">
        <h4 class="title">Nouveau sur Music'O ?</h4>
        <a href="./inscription.php" id="fond_bouton" class="noligne">
            <button type="submit" class="btn_c btn-crcompte">Créer un compte</button>
        </a>
    </div>
</div>

<footer>
    <div class="fin">
        <p>© 2024 MUSIC'O. Tous droits réservés.</p>
    </div>
</footer>

</body>
</html>

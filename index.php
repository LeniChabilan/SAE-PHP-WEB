<?php
session_start(); // Démarrez la session si ce n'est pas déjà fait

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['loggedUser'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: connexion.php"); // Redirection vers connexion.php
    exit; // Assurez-vous de terminer l'exécution du script après la redirection
}

// Le reste de votre code pour la page d'accueil commence ici

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Music'o</title>
    <link rel="stylesheet" href="../static/base.css" />
    <link rel="stylesheet" href="../static/home.css" />
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
</head>
<body class="light">
<header>
    <div class="gauche">
        <a href="">
            <img class="img_base" id="img1" src="../Data/images/logomusico.png" alt="image du logo de l'application" />
        </a>
    </div>

    <div class="droite">
        <a href="./connexion.php"><button type="button" id="bouton_se_connecter">Déconnexion</button></a>
    </div>
</header>

<div class="centre">
    <aside>
        <div class="d_aside">
            <ul class="redirection">
                <li><a href="#" class="btn_a btn-lg desactiver">
                        <span>Accueil</span>
                    </a></li>
                <li><a href="./playlist.php" class="btn_a btn-lg">
                        <span>Mes playlist</span>
                    </a></li>
                <li><a href="./noter.php" class="btn_a btn-lg">
                        <span>Mes Notes</span>
                    </a></li>
            </ul>
        </div>
    </aside>

    <main>
        <div class="wrap">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="rechercher . . .">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <ul class="listeAl">
            <?php
            // Votre code PHP pour afficher les albums depuis la base de données
            $file_db = new PDO('sqlite:Data/bd.sqlite3');
            $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

            $query = "SELECT * FROM Album";

            $result = $file_db->query($query);

            if ($result) {
                foreach ($result as $row) {
                    echo "<li>";
                    echo "<a href='album.php?filter=".$row['albumId']."'>";
                    $base64Image = $row['imageAlbum'];
                    echo "<img src='data:image;base64," . $base64Image . "' alt='Image Album'>";
                    echo "<p class='nomAl'>" . $row['nomAlbum'] . "</p>";
                    echo "</a>";
                    echo "</li>";
                }
            } else {
                echo "Erreur lors de l'exécution de la requête.";
            }

            $file_db = null;
            ?>
        </ul>
    </main>
</div>

<footer>
    <div class="fin"><p>© 2024 MUSIC'O. Tous droits réservés.</p></div>
</footer>

</body>
</html>

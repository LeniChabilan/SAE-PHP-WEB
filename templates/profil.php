<?php

session_start();
// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['loggedUser'])) {
    $userEmail = $_SESSION['loggedUser']['email'];
    // Utilisez $userEmail ou d'autres informations de l'utilisateur selon vos besoins
} else {
    // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion par exemple
    header("Location: connexion.php");
    exit;
}

$file_db = new PDO('sqlite:../Data/bd.sqlite3');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$quryId = "SELECT * FROM Utilisateur WHERE emailUtilisateur = '".$userEmail."'";
$res = $file_db->query($quryId);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music'o</title>
    <link rel="stylesheet" href="../static/base.css">
    <link rel="stylesheet" href="../static/home.css">
    <link rel="stylesheet" href="../static/profil.css">

</head>
<body>
    <body class="light">
    
        <header>
            <div class="gauche"><a href="">
                <img class="img_base" id="img1" src="../Data/images/logomusico.png" alt="image du logo de l'application" />
              </a>
          </div>
            
          <div class="droite">
            <a href="./deconnexion.php"><button type="button" id="bouton_se_connecter">Déconnexion</button></a>
        </ul>
          </div> 
        </header>
        <div class="centre">
        <aside>
            <div class="d_aside">
                <ul class="redirection">
                <li><a href="../index.php" class="btn_a btn-lg desactiver">
                    <span>Accueil</span>
                </a></li>
                <li><a href="./playlists.php" class="btn_a btn-lg">
                    <span>Mes playlist</span>
                </a></li>
                <li><a href="./noter.php" class="btn_a btn-lg">
                    <span>Mes Notes</span>
                </a></li>
            </ul>
        </div>
            
        </aside>

<main>
    <div id="gradient"></div>
        <div id="card">
            <img src="../Data/images/imageartiste.jpg"/>
            <div class="info">
                <?php
                foreach ($res as $row) {
                    echo "<h2>".$row['nomUtilisateir']."</h2>";
                    echo "<p> email : ".$row['emailUtilisateur']."</p>";
                    echo "<p> Mdp : ".$row['MDPutilisateur']."</p>";
                    echo "<p> Role : ".$row['roleUtilisateur']."</p>";
                    echo "<p> Tel : ".$row['numTel']."</p>";
                    echo "<p> DdN : ".$row['DdN']."</p>";
                }
                ?>
            </div>
            <div class="bouton">
                <ul class="liste_bouton">
                    <li class="logout">
                        <a href="modificationUtilisateur.php" id="fond_boutone" class="noligne">
                            <button type="button" class="button type1">Modifier</button>
                        </a>
                    </li>
                    <li class="logout">
                        <a href="./deconnexion.php" id="fond_boutone" class="noligne">
                            <button type="button" class="button type1">Se déconnecter</button>
                        </a>
                    </li>
                </ul>
        </div>
    </div>

</main>
</div>
<footer>
    <div class="fin"><p>© 2024 MUSIC'O. Tous droits réservés.</p></div>      
  </footer>
</body>
</html>
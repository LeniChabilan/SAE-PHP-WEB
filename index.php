<?php
session_start(); // Démarrez la session si ce n'est pas déjà fait

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['loggedUser'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ./templates/connexion.php"); // Redirection vers connexion.php
    exit; // Assurez-vous de terminer l'exécution du script après la redirection
}

// Le reste de votre code pour la page d'accueil commence ici

?>

<!DOCTYPE html>
<html lang="fr">

    <meta charset="utf-8" />
    <title>Music'o</title>
    <link rel="stylesheet" href="../static/base.css" />
    <link rel="stylesheet" href="../static/home.css" />
    <link rel="website icon" type="png" href="./Data/images/logomusico.png" />
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
        <a href="./templates/deconnexion.php"><button type="button" id="bouton_se_connecter">Déconnexion</button></a>
        <a href="./templates/profil.html">
            <button class="BtnProf">
                <span class="svgContainerProf">
                    <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z" fill="#4A5699" /><path d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z" fill="#C45FA0" /><path d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z" fill="#E5594F" /></svg>
                </span>
                <span class="BGP"></span>
            </button>
        </a>
    </div>
</header>

<div class="centre">
    <aside>
        <div class="d_aside">
            <ul class="redirection">

            <li><a href="#" class="btn_a btn-lg desactiver">
                <span>Accueil</span>
            </a></li>
            <li><a href="./templates/playlists.php" class="btn_a btn-lg">

                <span>Mes playlist</span>
            </a></li>
            
            <li><a href="./templates/noter.php" class="btn_a btn-lg">
                <span>Mes Notes</span>
            </a></li>
        </ul>
    </div>
        

    </aside>

    <main>
        <form id="searchForm" class="wrap">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Rechercher...">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var form = document.getElementById("searchForm");
                form.addEventListener("submit", function(event) {
                    event.preventDefault(); // Empêche la soumission du formulaire par défaut

                    var searchTerm = document.querySelector(".searchTerm").value;

                    // Envoie de la valeur de recherche au serveur via AJAX
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "./templates/recherche.php?searchTerm=" + searchTerm, true);
                    xhr.setRequestHeader("Content-Type", "application/json");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var response = JSON.parse(xhr.responseText);
                            updateAlbumList(response);
                        }
                    };
                    xhr.send();
                });

                function updateAlbumList(albums) {
                    var ul = document.querySelector(".listeAl");
                    ul.innerHTML = ""; // Efface la liste actuelle des albums

                    albums.forEach(function(album) {
                        var li = document.createElement("li");
                        var a = document.createElement("a");
                        a.href = "./templates/album.php?filter=" + album.albumId;

                        var img = document.createElement("img");
                        img.src = "data:image;base64," + album.imageAlbum;
                        img.alt = "Image Album";

                        var p = document.createElement("p");
                        p.className = "nomAl";
                        p.textContent = album.nomAlbum;

                        a.appendChild(img);
                        a.appendChild(p);
                        li.appendChild(a);
                        ul.appendChild(li);
                    });
                }
            });
        </script>


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
                    echo "<a href='./templates/album.php?filter=".$row['albumId']."'>";
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

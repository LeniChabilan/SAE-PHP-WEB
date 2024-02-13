<!DOCTYPE html>
<html lang="fr">
  <link rel="stylesheet" href="../static/base.css" />
  <link rel="stylesheet" href="../static/home.css" />
  <link rel="stylesheet" href="../static/playlist.css" />
  <link rel="website icon" type="png" href="./Data/images/logomusico.png" />

  <head>
    <meta charset="utf-8" />
    <title>Music'o</title>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
  </head>
  <body class="light">
    
    <header>
        <div class="gauche"><a href="../index.php">
            <img class="img_base" id="img1" src="../Data/images/logomusico.png" alt="image du logo de l'application" />
          </a>
      </div>
        
      <div class="droite">
      <a href="./deconnexion.php"><button type="button" id="bouton_se_connecter">Déconnexion</button></a>
      <a href="profil.php">
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
            <li><a href="../index.php" class="btn_a btn-lg ">
                <span>Accueil</span>
            </a></li>
            <li><a href="./playlists.php" class="btn_a btn-lg desactiver">
                <span>Mes playlist</span>
            </a></li>
            <li><a href="./noter.php" class="btn_a btn-lg">
                <span>Mes notes</span>
            </a></li>
        </ul>
    </div>
        
    </aside>
    <main>
    <a href="./ajoutPlaylist.php">
    <button class="btnplay" >
        <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1" class="sparkle">
            <path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path>
        </svg>
    
        <span class="text">Ajouter Playlist</span>
    </button>
    </a>

      <ul>
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
            

            $quryId = "SELECT utilisateurId FROM Utilisateur WHERE emailUtilisateur = '".$userEmail."'";
            $utiliID = $file_db->query($quryId);
            $utiId = $utiliID->fetch();

            $query = "SELECT * FROM Playlist WHERE utiId = " . $utiId['utilisateurId'];

            $result = $file_db->query($query);

            
            
            if ($result) {
                foreach ($result as $row) {
                  echo "<li>";
                  echo"<div class='test'>";
                    echo "<h2 class='nomPlaylist'>". $row['nomPlaylist']."</h2>";
                      echo "<a href='../Factory/supPlaylist.php?".$row['playlistId']."' class='poubelle'><i class='fa-solid fa-trash'></i></a>";
                      echo "</div>";
                      echo "<ul class='listeAl'>";
                    $res = "SELECT * FROM Playlist natural join PlaylistAlbum natural join Album WHERE utiId = " . $utiId['utilisateurId'] . " and playlistId = " . $row['playlistId'];
                    $resa=$file_db->query($res);
                    foreach ($resa as $rowa) {
                      echo "<li>";
                    echo "<a href='album.php?filter=".$rowa['albumId']."'>";
                    $base64Image = $rowa['imageAlbum'];
                    echo "<img src='data:image;base64," . $base64Image . "' alt='Image Album'>";
                    echo "<div class='inlineElem'>";
                      echo "<p class='nomAl'>" . $rowa['nomAlbum']." </p>";
                      echo "<a href='../Factory/supPlaylistLine.php?playlistId=" . $row['playlistId'] . "&albumId=" . $rowa['albumId'] . "' class='poubelle'><i class='fa-solid fa-trash'></i></a>";
                    echo "</div>";
                    echo "</a>";
                    echo "</li>";
                    }
                    echo "</ul>";
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

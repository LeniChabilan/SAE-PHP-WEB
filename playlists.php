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
        <div class="gauche"><a href="">
            <img class="img_base" id="img1" src="../Data/images/logomusico.png" alt="image du logo de l'application" />
          </a>
      </div>
        
      <div class="droite">
        <a href="./connexion.php"><button type="button" id="bouton_se_connecter">Se connecter</button></a>
        </ul>
      </div> 
    </header>
    <div class="centre">
    <aside>
        <div class="d_aside">
            <ul class="redirection">
            <li><a href="./index.php" class="btn_a btn-lg ">
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
    <button class="btnplay">
        <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1" class="sparkle">
            <path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path>
        </svg>
    
        <span class="text">Ajouter Playlist</span>
    </button>

      <ul>
        <?php
            $file_db = new PDO('sqlite:Data/bd.sqlite3');
            $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            
            $query = "SELECT * FROM Playlist WHERE utiId = 1";
            
           
            $result = $file_db->query($query);

            $res="SELECT * FROM Playlist natural join PlaylistAlbum natural join Album WHERE utiId = 1";
            $resa=$file_db->query($res);
            
            if ($result) {
                foreach ($result as $row) {
                  echo "<li>";
                    echo "<h2 class='nomPlaylist'>". $row['nomPlaylist']."</h2>";
                    echo "<ul class='listeAl'>";
                    foreach ($resa as $rowa) {
                      echo "<li>";
                    echo "<a href='album.php?filter=".$rowa['albumId']."'>";
                    $base64Image = $rowa['imageAlbum'];
                    echo "<img src='data:image;base64," . $base64Image . "' alt='Image Album'>";
                    echo "<p class='nomAl'>" . $rowa['nomAlbum'] . "</p>";
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

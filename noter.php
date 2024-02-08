<!DOCTYPE html>
<html lang="fr">
  <link rel="stylesheet" href="../static/base.css" />
  <link rel="stylesheet" href="../static/home.css" />
  <link rel="stylesheet" href="../static/noter.css" />
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
            <li><a href="./playlists.php" class="btn_a btn-lg">
                <span>Mes playlist</span>
            </a></li>
            <li><a href="#" class="btn_a btn-lg desactiver">
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
            $file_db = new PDO('sqlite:Data/bd.sqlite3');
            $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            
            $query = "SELECT * FROM Album Natural Join Noter WHERE utilisateurId = 1";

            
            $result = $file_db->query($query);
            
            if ($result) {
              foreach ($result as $row) {
                  echo "<li>";
                  echo "<a href='album.php?filter=".$row['albumId']."'>";
                  $base64Image = $row['imageAlbum'];
                  echo "<img src='data:image;base64," . $base64Image . "' alt='Image Album'>";
                  echo "<p class='nomAl'>" . $row['nomAlbum'] . "</p>";
                  echo "</a>";
                  echo "<div class='note'>";
                  echo "<form action='update_note.php' method='post'>";
                  echo "<div class='rating'>";
                  for ($i = 5; $i >= 1; $i--) {
                    echo "<a href='#' title='Donner " . $i . " étoiles'>" . ($i <= $row['note'] ? "★" : "☆") . "</a>";
                  }
                  echo "</div>";
                  echo "</div>";
                  echo "</li>";
              }
          } else {
              echo "Erreur lors de l'exécution de la requête.";
          }
          
          $file_db = null;
            
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

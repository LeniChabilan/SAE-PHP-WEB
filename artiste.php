<!DOCTYPE html>
<html lang="fr">
  <link rel="stylesheet" href="../static/base.css" />
  <link rel="stylesheet" href="../static/artiste.css" />

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
            <li><a href="./index.php" class="btn_a btn-lg">
                <span>Accueil</span>
            </a></li>
            <li><a href="./playlists.php" class="btn_a btn-lg">
                <span>Mes playlist</span>
            </a></li>
            
            <li><a href="./noter.php" class="btn_a btn-lg">
                <span>Mes Notes</span>
            </a></li>
            <li><a href="./artiste.php" class="btn_a btn-lg">
                <span>Artiste</span>
            </a></li>
        </ul>
    </div>
        
    </aside>
    <main>
        <?php
            $file_db = new PDO('sqlite:Data/bd.sqlite3');
            $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            
            $query = "SELECT * FROM Artiste WHERE artisteId = ".$_REQUEST['filter'];
                       
            $result = $file_db->query($query);

            
            $genre="SELECT * from Album WHERE Album.artisteId = ".$_REQUEST['filter'];
            $liste_genre=$file_db->query($genre);

            $rows=$liste_genre->fetchAll();


            if ($result) {
                foreach ($result as $row) {
                    echo "<div class='album'>";
                    echo "<img src='../Data/images/default.jpg' alt='Image Artiste'>";
                    echo "<div class='desc'>";
                    echo "<h2>".$row['nomArtiste']."</h2>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            if ($liste_genre) {  
                
                echo "<div class='musique'>";
                echo "<table class='table'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th scope='col'>#</th>";
                echo "<th scope='col'>Images</th>";
                echo "<th scope='col'>Titre</th>";
                echo "<th scope='col'>Année</th>";
                echo "<th scope='col'>Producteur</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                for($i=0; $i<count($rows); $i++) {
                    
                    echo "<tr>";
                    echo "<a href='album.php?filter=".$rows[$i]['albumId']."'>";
                    echo "<th scope='row'>".$i."</th>";
                    $base64Image = $rows[$i]['imageAlbum'];
                    echo "<td> <img class='albumimg' src='data:image;base64,".$base64Image."' alt='Image Album'></td>";    
                    echo "<td>".$rows[$i]['nomAlbum']."</td>";
                    echo "<td>".$rows[$i]['AnneeAlbum']."</td>";
                    echo "<td>".$rows[$i]['nomProducteur']."</td>";
                    echo "</a>";
                    echo "</tr>";
                    
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                    }
                
            
    ?>
    </main>
    </div>
    <footer>
      <div class="fin"><p>© 2024 MUSIC'O. Tous droits réservés.</p></div>      
    </footer>
    </body>
</html>

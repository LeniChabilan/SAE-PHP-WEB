<!DOCTYPE html>
<html lang="fr">
  <link rel="stylesheet" href="../static/album.css" />
  <link rel="stylesheet" href="../static/base.css" />

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
            <li><a href="#" class="btn_a btn-lg">
                <span>Mes playlist</span>
            </a></li>
            <li><a href="./noter.php" class="btn_a btn-lg">
                <span>Mes Notes</span>
            </a></li>
        </ul>
    </div>
    </aside>
    <main>
    <?php
            $file_db = new PDO('sqlite:Data/bd.sqlite3');
            $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $query = "SELECT *FROM Album
                    LEFT JOIN Artiste ON Album.artisteId = Artiste.artisteId
                    WHERE Album.albumId = ".$_REQUEST['filter'];

            $result = $file_db->query($query);
            
            $genre="SELECT * from Album LEFT JOIN GenreAlbum ON Album.albumId= GenreAlbum.albumId
            Natural Join Genre
            WHERE Album.albumId = ".$_REQUEST['filter'];
            $liste_genre=$file_db->query($genre);



            $quer="SELECT * FROM Musique WHERE albumId = ".$_REQUEST['filter'];
            $res = $file_db->query($quer);
            $rows = $res->fetchAll();
            
            $res = $file_db->query($quer);
            if ($result) {
                foreach ($result as $row) {
                    echo "<div class='album'>";
                    $base64Image = $row['imageAlbum'];
                    echo "<img src='data:image;base64," . $base64Image . "' alt='Image Album'>";
                    echo "<div class='desc'>";
                    echo "<h2>".$row['nomAlbum']."</h2>";
                    echo "<p>".$row['AnneeAlbum']."</p>";
                    echo "<p> Producteur :".$row['nomProducteur']."</p>";
                    echo "<p>Artiste :  ".$row['nomArtiste']."</p>";
                    echo "<p> Nombre de musique : ".Count($rows)."</p>";
                    echo "<p> Genre :";
                    if($liste_genre){
                    foreach($liste_genre as $g){
                        echo ' ' .$g['nomGenre'];
                    }
                    }
                    echo"</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            if ($res) {  

                echo "<div class='musique'>";
                echo "<h2> Liste des musiques </h2>";
                echo "<table class='table'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th scope='col'>#</th>";
                echo "<th scope='col'>Titre</th>";
                echo "<th scope='col'>Durée</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                for($i=0; $i<count($rows); $i++) {
                    echo "<tr>";
                    echo "<th scope='row'>".$i."</th>";
                    echo "<td>".$rows[$i]['nomMusique']."</td>";
                    echo "<td>".$rows[$i]['dure']."</td>";
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
<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="../static/album.css" />
<link rel="stylesheet" href="../static/base.css" />
<link rel="stylesheet" href="../static/home.css" />
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
                    <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <path d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z" fill="#4A5699" />
                        <path d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z" fill="#C45FA0" />
                        <path d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z" fill="#E5594F" />
                    </svg>
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

            $quryId = "SELECT utilisateurId FROM Utilisateur WHERE emailUtilisateur = '" . $userEmail . "'";
            $utiliID = $file_db->query($quryId);
            $utiId = $utiliID->fetch(); // permet de récupérer l'id de l'utilisateur connecté

            $query = "SELECT *FROM Album
                    LEFT JOIN Artiste ON Album.artisteId = Artiste.artisteId
                    WHERE Album.albumId = " . $_REQUEST['filter'];

            $result = $file_db->query($query);

            $genre = "SELECT * from Album LEFT JOIN GenreAlbum ON Album.albumId= GenreAlbum.albumId
            Natural Join Genre
            WHERE Album.albumId = " . $_REQUEST['filter'];
            $liste_genre = $file_db->query($genre);



            $quer = "SELECT * FROM Musique WHERE albumId = " . $_REQUEST['filter'];
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
                    echo "<a href='./artiste.php?filter=".$row['artisteId']."'>Artiste :  ".$row['nomArtiste']."</a>";
                    echo "<p> Nombre de musique : ".Count($rows)."</p>";

                    echo "<p> Genre :";
                    if ($liste_genre) {
                        foreach ($liste_genre as $g) {
                            echo ' ' . $g['nomGenre'];
                        }
                    }
                    echo "</p>";
                    echo '<div class="rating">
                    <input value="5" name="rating" id="star5" type="radio" onclick="redirectToNotePage(5)">
                    <label for="star5"></label>

                    <input value="4" name="rating" id="star4" type="radio" onclick="redirectToNotePage(4)">
                    <label for="star4"></label>

                    <input value="3" name="rating" id="star3" type="radio" onclick="redirectToNotePage(3)">
                    <label for="star3"></label>

                    <input value="2" name="rating" id="star2" type="radio" onclick="redirectToNotePage(2)">
                    <label for="star2"></label>

                    <input value="1" name="rating" id="star1" type="radio" onclick="redirectToNotePage(1)">
                    <label for="star1"></label>
                    </div>
                    ';
                    echo "</div>";
                    echo "</div>";
                    
                    
                    $alId= $_REQUEST['filter']; 
                    echo "<form role='form' method='POST' action='../Factory/addToPlaylist.php?albumId=".$alId."'>"; ?>
                    <div class="input-container">
                <div class="selectdiv">

                <select name="playlist" id="pet-select" class="input">
                <?php
                session_start(); 
                $idUser=$_SESSION['loggedUser']['id'];

                $query = "SELECT * FROM Playlist where utiId= $idUser";
                $result = $file_db->query($query);
                if($result){
                    foreach($result as $row){
                        echo "<option value='".$row['playlistId']."'>".$row['nomPlaylist']."</option>";
                    }
                    };?>
                
                </select>
                </div>
                <button class="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20" fill="none" class="svg-icon"><g stroke-width="1.5" stroke-linecap="round" stroke="#fc792e"><circle r="7.5" cy="10" cx="10"></circle><path d="m9.99998 7.5v5"></path><path d="m7.5 9.99998h5"></path></g></svg>
            <span class="lable">Add</span>
            </button>
            </div>

            </form>
                    <?php
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
                for ($i = 0; $i < count($rows); $i++) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $i . "</th>";
                    echo "<td>" . $rows[$i]['nomMusique'] . "</td>";
                    echo "<td>" . $rows[$i]['dure'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            }


            ?>
            <script>
                function redirectToNotePage(rating) {
                    var albumId = <?php echo $_REQUEST['filter']; ?>;
                    window.location.href = "../Factory/note.php?rating=" + rating + "&albumId=" + albumId;
                }
            </script>
        </main>
    </div>
    <footer>
        <div class="fin">
            <p>© 2024 MUSIC'O. Tous droits réservés.</p>
        </div>
    </footer>
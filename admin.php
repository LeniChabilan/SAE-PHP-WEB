<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <title>Music'o</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./static/base.css" />
  <link rel="stylesheet" href="./static/admin.css" />
  <link rel="stylesheet" href="./static/formulaire.css" />

  <link rel="website icon" type="png" href="./Data/images/logomusico.png" />

  
  <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
</head>
<body class="light">
    
<header>
    <div class="gauche"><a href="./admin.php">
        <img class="img_base" id="img1" src="../Data/images/logomusico.png" alt="image du logo de l'application" />
      </a>
      <h2 id="nom_Entreprise">MUSIC'O</h2>
  </div>
    
  <div class="droite">
    <a href="./connexion.html"><button type="button" id="bouton_se_connecter">Se connecter</button></a>
    </ul>
  </div> 
</header>
<aside>
  <div class="d_aside">
      <ul class="redirection">
      <li><a href="?filter=liste_Artistes" class="btn_a btn-lg">
          <span>Liste artistes</span>
      </a></li>
      <li><a href="?filter=liste_utilisateurs" class="btn_a btn-lg">
          <span>Liste utilisateurs</span>
      </a></li>
      <li><a href="?filter=liste_album" class="btn_a btn-lg">
          <span>Liste album</span>
      </a></li>
      <li><a href="?filter=liste_musique" class="btn_a btn-lg">
        <span>Liste musique</span>
      </a></li>
  </ul>
</div>
</aside>
<main>
  
<div class="partie_principale">
<?php
$file_db = new PDO('sqlite:Data/bd.sqlite3');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// Vérifier si la clé "filter" est définie dans $_REQUEST
if(isset($_REQUEST['filter'])) {
    $filter = $_REQUEST['filter'];
    switch($filter) {
        case 'liste_Artistes':
            $query = "SELECT * FROM Artiste";
            $result = $file_db->query($query);
            ?>
            <div class="middle">
                <h1 id="modification">Liste des Artistes</h1>
            </div>
            <a href="?filter=addArtiste"><button type="button" id="bouton_se_connecter">Ajouter Artistes</button></a>
            <table class="table table-striped table-scrollable">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if($result){
                    foreach($result as $row){
                        echo("<tr>");
                        echo("<td scope='row'>".$row['artisteId']."</td>");
                        echo("<td>".$row['nomArtiste']."</td>");
                        echo("<td><a href='#'><i class='fa-solid fa-pen'></i></a></td>");
                        echo("<td><a href='#'><i class='fa-solid fa-trash'></i></a></td>");
                        echo("</tr>");
                    }
                }
                ?>
                </tbody>
            </table>
            <?php
            break;
        case 'liste_utilisateurs':
            $query = "SELECT * FROM Utilisateur";
            $result = $file_db->query($query);
            ?>
            <div class="middle">
                <h1 id="modification">Liste des Utilisateurs</h1>
            </div>
            <table class="table table-striped table-scrollable">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">MDP</th>
                        <th scope="col">Rôle</th>
                        <th scope="col">Date de naissance</th>
                        <th scope="col">Numéro de téléphone</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if($result){
                    foreach($result as $row){
                        echo("<tr>");
                        echo("<td scope='row'>".$row['utilisateurId']."</td>");
                        echo("<td>".$row['nomUtilisateir']."</td>");
                        echo("<td>".$row['emailUtilisateur']."</td>");
                        echo("<td>".$row['MDPutilisateur']."</td>");
                        echo("<td>".$row['roleUtilisateur']."</td>");
                        echo("<td>".$row['DdN']."</td>");
                        echo("<td>".$row['numTel']."</td>");
                        echo("<td><a href='#'><i class='fa-solid fa-pen'></i></a></td>");
                        echo("<td><a href='#'><i class='fa-solid fa-trash'></i></a></td>");
                        echo("</tr>");
                    }
                }
                ?>
                </tbody>
            </table>
            <?php
            break;
        case 'liste_album':
            $query = "SELECT * FROM Album";
            $result = $file_db->query($query);
            ?>
            <div class="middle">
                <h1 id="modification">Liste des Albums</h1>
            </div>
            <a href="?filter=addAlbum"><button type="button" id="bouton_se_connecter">Ajouter album</button></a>
            <table class="table table-striped table-scrollable">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Année de sortie</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Producteur</th>
                        <th scope="col">Artiste Id</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if($result){
                    foreach($result as $row){
                        echo("<tr>");
                        echo("<td scope='row'>".$row['albumId']."</td>");
                        echo("<td>".$row['nomAlbum']."</td>");
                        echo("<td>".$row['AnneeAlbum']."</td>");
                        echo("<td></td>");
                        echo("<td>".$row['nomProducteur']."</td>");
                        echo("<td>".$row['artisteId']."</td>");
                        echo("<td><a href='#'><i class='fa-solid fa-pen'></i></a></td>");
                        echo("<td><a href='#'><i class='fa-solid fa-trash'></i></a></td>");
                        echo("</tr>");
                    }
                }
                ?>
                </tbody>
            </table>
            <?php
            break;
        case 'liste_musique':
            $query = "SELECT * FROM Musique";
            $result = $file_db->query($query);
            ?>
            <div class="middle">
                <h1 id="modification">Liste des Musique</h1>
            </div>
            <a href="?filter=addMusique"><button type="button" id="bouton_se_connecter">Ajouter musique</button></a>
            <table class="table table-striped table-scrollable">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Durée</th>
                        <th scope="col">Id Album</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if($result){
                    foreach($result as $row){
                        echo("<tr>");
                        echo("<td scope='row'>".$row['musiqueId']."</td>");
                        echo("<td>".$row['nomMusique']."</td>");
                        echo("<td>".$row['dure']."</td>");
                        echo("<td>".$row['albumId']."</td>");
                        echo("<td><a href='#'><i class='fa-solid fa-pen'></i></a></td>");
                        echo("<td><a href='#'><i class='fa-solid fa-trash'></i></a></td>");
                        echo("</tr>");
                    }
                }
                ?>
                </tbody>
            </table>
            <?php
            break;
        case 'addAlbum':
            ?>
            <div class="form">
            <div class="title">Ajouter les informations d'un Album !</div>
            <form role="form" method="POST" action="lien_vers_creation_groupe_gr" enctype="multipart/form-data">
            <div class="input-container">
                <input placeholder="Nom de l'album" type="text" class="input" name="nom" value="" required>
                <div class="cut"></div>
                <label class="iLabel" for="nom">Nom de l'album</label>
            </div>
            <div class="input-container">
                <input placeholder="Année" type="text" class="input" name="annee" value="" required>
                <div class="cut"></div>
                <label class="iLabel" for="Année">Année</label>
            </div>
            <div class="input-container">
                <label class="image" for="imgs">Insérer votre Image</label>
                <input class="image" type="file" id="imgs" name="imgs" accept="image/png, image/jpeg">
            </div>
            <div class="input-container">
                <input placeholder="Producteur" type="text" class="input" name="producteur" value="" required>
                <div class="cut"></div>
                <label class="iLabel" for="producteur">Producteur</label>
            </div>
            <div class="input-container">
                <select name="style" id="pet-select" class="input">
                <option value="style1">Rock</option>
                <option value="style2">Arabe</option>
                </select>
                <div class="cut"></div>
                <label class="iLabel" for="style">Style</label>
            </div>
            <div class="input-container">
                <select name="artiste" id="pet-select" class="input">
                <option value="artiste1">Pierre</option>
                <option value="artiste2">Paul</option>
                </select>
                <div class="cut"></div>
                <label class="iLabel" for="artiste">Artiste</label>
            </div>
            <button class="submit" type="text" onclick="showConfirmationEnregistrer()">Enregistrer</button>
            </form>
            </div>
            <?php
            break;
        case 'addMusique':
            ?>
            <div class="form">
            <div class="title">Ajouter une Musique !</div>
            <form role="form" method="POST" action="#" >
              <div class="input-container">
                <input placeholder="Nom de la Musique" type="text" class="input" name="nom" value="" required>
                <div class="cut"></div>
                <label class="iLabel" for="nom">Nom de la Musique</label>
              </div>
              <div class="input-container">
                <input placeholder="" type="time" class="input" name="dure" value="" required>
                <div class="cut"></div>
                <label class="iLabel" for="dure">Durée</label>
              </div>
              <div class="input-container">
                <select name="album" id="pet-select" class="input">
                  <option value="album1">Album X</option>
                  <option value="album2">Album Y</option>
                </select>
                <div class="cut"></div>
                <label class="iLabel" for="album">Album</label>
              </div>
              <button class="submit" type="text" onclick="showConfirmationEnregistrer()">Enregistrer</button>
            </form>
          </div>
            <?php
            break;
        case 'addArtiste':
            ?>
            <div class="form">
                <div class="title">Ajouter un Artiste !</div>
                <form role="form" method="POST" action="#" >
                <div class="input-container">
                    <input placeholder="Nom de l'artiste" type="text" class="input" name="nom" value="" required>
                    <div class="cut"></div>
                    <label class="iLabel" for="nom">Nom de l'artiste</label>
                </div>
                <button class="submit" type="text" onclick="showConfirmationEnregistrer()">Enregistrer</button>
                </form>
            </div>
            <?php
            break;
        default:
            echo("<h2 class='bienvenue'>Bienvenue dans le module administrateur</h2>");
            break;
    }
} else {
    echo("<h2 class='bienvenue'>Bienvenue dans le module administrateur</h2>");
}

$file_db = null;
?>
</div>

</main>
<footer>
  <div class="fin"><p>© 2024 MUSIC'O. Tous droits réservés.</p></div>      
</footer>
</body>
</html>

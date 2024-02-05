<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <title>Music'o</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./static/base.css" />
  <link rel="stylesheet" href="./static/consulter_les_artistes.css" />
  
  <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
</head>
<body class="light">
    
    <header>
        <div class="gauche"><a href="">
            <img class="img_base" id="img1" src="../Data/images/logo.png" alt="image du logo de l'application" />
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
  


  $query = "SELECT * FROM Utilisateur";
  
  $result = $file_db->query($query);

   if($_REQUEST['filter'] == 'liste_Artistes'){
    $query = "SELECT * FROM Artiste";
            
    $result = $file_db->query($query);
?>
    <div class="middle">
    <h1 id="modification">Liste des artistes</h1>
</div>
<table class="table table-striped">
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
    echo('</tbody>');
    echo('</table>');
    echo('<a href="./connexion.html"><button type="button" id="bouton_se_connecter">Ajouter Artistes</button></a>');

  }


  elseif($_REQUEST['filter'] == 'liste_utilisateurs'){
    $query = "SELECT * FROM Utilisateur";
            
    $result = $file_db->query($query);
    ?>
    <div class="middle">
    <h1 id="modification">Liste des artistes</h1>
</div>
<table class="table table-striped">
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
    echo('</tbody>');
    echo('</table>');
    echo('<a href="./connexion.html"><button type="button" id="bouton_se_connecter">Ajouter utilisateur</button></a>');
  }
  elseif($_REQUEST['filter'] == 'liste_album'){
    $query = "SELECT * FROM Album";
            
    $result = $file_db->query($query);
    ?>
  <div class="middle">
    <h1 id="modification">Liste des artistes</h1>
</div>
<table class="table table-striped">
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
    echo('</tbody>');
    echo('</table>');
    echo('<a href="./connexion.html"><button type="button" id="bouton_se_connecter">Ajouter album</button></a>');

    
  }
  elseif($_REQUEST['filter'] == 'liste_musique'){
    $query = "SELECT * FROM Musique";
            
    $result = $file_db->query($query);
    ?>
    <div class="middle">
    <h1 id="modification">Liste des artistes</h1>
</div>
<table class="table table-striped">
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
    echo('</tbody>');
    echo('</table>');
    echo('<a href="./connexion.html"><button type="button" id="bouton_se_connecter">Ajouter musique</button></a>');

  }

  else{
    echo("<h2 class='bienvenue'>bienvenue dans le module administrateur</h2>");
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
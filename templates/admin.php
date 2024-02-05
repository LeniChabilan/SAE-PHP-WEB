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
            <img class="img_base" id="img1" src="../Data/images/logomusico.png" alt="image du logo de l'application" />
          </a>
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
   if($_REQUEST['filter'] == 'liste_Artistes'){
    echo('<div class="middle">');
    echo('<h1 id="modification">Liste des artistes</h1>');
    echo('</div>');
    echo('<table class="table table-striped">');
    echo('<thead>');
    echo('<tr>');
    echo('<th scope="col">Id</th>');
    echo('<th scope="col">Nom</th>');
    echo('<th scope="col">GroupeId</th>');
    echo('<th scope="col">Groupe</th>'); 
    echo('<th scope="col"></th>');
    echo('<th scope="col"></th>');
    echo('</tr>');
    echo('</thead>');
    echo('<tbody>');
    for($i=0; $i<10; $i++){
        echo("<tr>");
        echo("<td scope='row'>1</td>");
        echo("<td>Liam</td>");
        echo("<td>DDN</td>");
        echo("<td>Liste album</td>");
        echo("<td><a href='#'><i class='fa-solid fa-pen'></i></a></td>");
        echo("<td><a href='#'><i class='fa-solid fa-trash'></i></a></td>");
        echo("</tr>");
    }
    echo('</tbody>');
    echo('</table>');
    echo('<a href="./connexion.html"><button type="button" id="bouton_se_connecter">Ajouter Artistes</button></a>');

  }

  elseif($_REQUEST['filter'] == 'liste_utilisateurs'){
    echo('<div class="middle">');
    echo('<h1 id="modification">Liste des artistes</h1>');
    echo('</div>');
    echo('<table class="table table-striped">');
    echo('<thead>');
    echo('<tr>');
    echo('<th scope="col">Id</th>');
    echo('<th scope="col">Nom</th>');
    echo('<th scope="col">GroupeId</th>');
    echo('<th scope="col">Groupe</th>'); 
    echo('<th scope="col"></th>');
    echo('<th scope="col"></th>');
    echo('</tr>');
    echo('</thead>');
    echo('<tbody>');
    for($i=0; $i<10; $i++){
        echo("<tr>");
        echo("<td scope='row'>1</td>");
        echo("<td>Antoine</td>");
        echo("<td>DDN</td>");
        echo("<td>Liste album</td>");
        echo("<td><a href='#'><i class='fa-solid fa-pen'></i></a></td>");
        echo("<td><a href='#'><i class='fa-solid fa-trash'></i></a></td>");
        echo("</tr>");
    }
    echo('</tbody>');
    echo('</table>');
    echo('<a href="./connexion.html"><button type="button" id="bouton_se_connecter">Ajouter utilisateur</button></a>');
  }
  elseif($_REQUEST['filter'] == 'liste_album'){
    echo('<div class="middle">');
    echo('<h1 id="modification">Liste des artistes</h1>');
    echo('</div>');
    echo('<table class="table table-striped">');
    echo('<thead>');
    echo('<tr>');
    echo('<th scope="col">Id</th>');
    echo('<th scope="col">Nom</th>');
    echo('<th scope="col">GroupeId</th>');
    echo('<th scope="col">Groupe</th>'); 
    echo('<th scope="col"></th>');
    echo('<th scope="col"></th>');
    echo('</tr>');
    echo('</thead>');
    echo('<tbody>');
    for($i=0; $i<10; $i++){
        echo("<tr>");
        echo("<td scope='row'>1</td>");
        echo("<td>LiamAntoineLeni</td>");
        echo("<td>DDN</td>");
        echo("<td>Liste album</td>");
        echo("<td><a href='#'><i class='fa-solid fa-pen'></i></a></td>");
        echo("<td><a href='#'><i class='fa-solid fa-trash'></i></a></td>");
        echo("</tr>");
    }
    echo('</tbody>');
    echo('</table>');
    echo('<a href="./connexion.html"><button type="button" id="bouton_se_connecter">Ajouter album</button></a>');

    
  }
  elseif($_REQUEST['filter'] == 'liste_musique'){
    echo('<div class="middle">');
    echo('<h1 id="modification">Liste des artistes</h1>');
    echo('</div>');
    echo('<table class="table table-striped">');
    echo('<thead>');
    echo('<tr>');
    echo('<th scope="col">Id</th>');
    echo('<th scope="col">Nom</th>');
    echo('<th scope="col">GroupeId</th>');
    echo('<th scope="col">Groupe</th>'); 
    echo('<th scope="col"></th>');
    echo('<th scope="col"></th>');
    echo('</tr>');
    echo('</thead>');
    echo('<tbody>');
    for($i=0; $i<10; $i++){
        echo("<tr>");
        echo("<td scope='row'>1</td>");
        echo("<td>Leni</td>");
        echo("<td>DDN</td>");
        echo("<td>Liste album</td>");
        echo("<td><a href='#'><i class='fa-solid fa-pen'></i></a></td>");
        echo("<td><a href='#'><i class='fa-solid fa-trash'></i></a></td>");
        echo("</tr>");
    }
    echo('</tbody>');
    echo('</table>');
    echo('<a href="./connexion.html"><button type="button" id="bouton_se_connecter">Ajouter musique</button></a>');

  }

  else{
    echo("<h2 class='bienvenue'>bienvenue dans le module administrateur</h2>");
  }
  ?> 
</div>

      </main>
      <footer>
        <div class="fin"><p>© 2024 MUSIC'O. Tous droits réservés.</p></div>      
      </footer>
    </body>
</html>

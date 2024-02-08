<!DOCTYPE html>
<html lang="fr">
  <link rel="stylesheet" href="../static/base.css" />
  <link rel="stylesheet" href="../static/inscription.css">
  <head>
    <meta charset="utf-8" />
    <title>Music'o</title>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
  </head>
  <body class="light">
    
    <header>
        <div class="gauche"><a href="./index.php">
            <img class="img_base" id="img1" src="../Data/images/logomusico.png" alt="image du logo de l'application" />
          </a>
      </div>
        
      <div class="droite">
        <a href="./connexion.php"><button type="button" id="bouton_se_connecter">Se connecter</button></a>
        </ul>
      </div> 
    </header>
        <div class="main">
            <div class="card">
                <h4 class="title">Créer votre compte</h4>
                <form class="form-horizontal" role="form" method="POST" action="./connexion.php">
                    <div class="field">
                        <svg class="input-icon"><!--SVG ici --></svg>
                        <input type="text" name="nomUtilisateur" class="input-field" placeholder="Adress Mail" size="50">
                    </div>
                    <div class="field">
                        <svg class="input-icon"><!--SVG ici --></svg>
                        <input type="text" name="emailUtilisateur" class="input-field" placeholder="Nom Utilisateur" size="50">
                    </div>
                    <!-- Champ Date de Naissance -->
                    <div class="field">
                        <svg class="input-icon"><!--SVG ici --></svg>
                        <input type="date" name="DdN" class="input-field" placeholder="Date de Naissance">
                    </div>
                    <!-- Champ Numéro de Téléphone -->
                    <div class="field">
                        <svg class="input-icon"><!--SVG ici --></svg>
                        <input type="tel" name="tel" class="input-field" placeholder="Numéro de Téléphone" size="50">
                    </div>
                    <div class="field">
                        <svg class="input-icon"><!--SVG ici --></svg>
                        <input type="password" name="MDPUtilisateur" id="mdp" class="input-field" placeholder="Mot De Passe" size="50">
                    </div>
                    <div class="field">
                        <svg class="input-icon"><!--SVG ici --></svg>
                        <input type="password" name="confirmMDPUtilisateur" id="confirm_mdp" class="input-field" placeholder="Confirmé mot De Passe" size="50">
                    </div>
                    <div id="error-message" style="color: rgb(219, 36, 36);"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit"  class="btn_i btn-crcompte">Créer mon compte</button>
                        </div>
                    </div>
                </form >
            </div>
        </div>
        <script>
            document.querySelector('.form-horizontal').addEventListener('submit', function(e) {
                var mdp = document.getElementById('mdp').value;
                var confirmMdp = document.getElementById('confirm_mdp').value;
                var mdpField = document.getElementById('mdp');
                var confirmMdpField = document.getElementById('confirm_mdp');
                var errorMessage = document.getElementById('error-message');

                if (mdp !== confirmMdp) {
                    errorMessage.textContent = 'Les mots de passe ne correspondent pas';
                    mdpField.classList.add('error-border');
                    confirmMdpField.classList.add('error-border');
                    e.preventDefault();
                } else {
                    errorMessage.textContent = '';
                    mdpField.classList.remove('error-border');
                    confirmMdpField.classList.remove('error-border');
                }
            });
        </script>    
    </body>




    <footer>
      <div class="fin"><p>© 2024 MUSIC'O. Tous droits réservés.</p></div>      
    </footer>
  </body>
</html>
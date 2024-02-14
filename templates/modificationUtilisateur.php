<!DOCTYPE html>
<html lang="fr">
  <link rel="stylesheet" href="../static/base.css" />
  <link rel="stylesheet" href="../static/inscription.css">
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
        
    </header>
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
    

    $quryId = "SELECT * FROM Utilisateur WHERE emailUtilisateur = '".$userEmail."'";
    $utiliID = $file_db->query($quryId);
    $resuult = $utiliID->fetch();
    ?>
        <div class="main">
            <div class="card">
                <h4 class="title">Modifier votre compte</h4>
                <form class="form-horizontal" role="form" method="POST" action="../Factory/modifUtilisateur.php">
                    <div class="field">
                        <input type="hidden" name="idUtilisateur" value="<?php echo $resuult["utilisateurId"]?>">
                        <input type="text" name="nomUtilisateur" class="input-field" placeholder="Adress Mail" size="50" value="<?php echo $resuult["nomUtilisateir"]?>">
                    </div>
                    <div class="field">
                        <input type="text" name="emailUtilisateur" class="input-field" placeholder="Nom Utilisateur" size="50" value="<?php echo $resuult["emailUtilisateur"]?>">
                    </div>
                    <div class="field">
                        <input type="date" name="DdN" class="input-field" placeholder="Date de Naissance" value="<?php echo $resuult["DdN"]?>">
                    </div>
                    <div class="field">
                        <input type="tel" name="tel" class="input-field" placeholder="Numéro de Téléphone" size="50" value="<?php echo $resuult["numTel"]?>">
                    </div>
                    <div class="field">
                        <input type="password" name="MDPUtilisateur" id="mdp" class="input-field" placeholder="Mot De Passe" size="50" value="<?php echo $resuult["MDPutilisateur"]?>">
                    </div>
                    <div class="field">
                        <input type="password" name="confirmMDPUtilisateur" id="confirm_mdp" class="input-field" placeholder="Confirmé mot De Passe" size="50" value="<?php echo $resuult["MDPutilisateur"]?>">
                    </div>
                    <div id="error-message" style="color: rgb(219, 36, 36);"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit"  class="btn_i btn-crcompte">Modifier mon compte</button>
                        </div>
                    </div>
                </form >
            </div>
        </div>
        <script>
                // Récupérer le message d'erreur à partir du paramètre GET
                const params = new URLSearchParams(window.location.search);
                const error = paramas.get('error');

                // Si un message d'erreur est présent, afficher la popup
                if (error) {
                    alert(error);
                }
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
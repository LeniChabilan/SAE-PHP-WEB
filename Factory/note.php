<?php

session_start(); 

$idUser=$_SESSION['loggedUser']['id'];

try {
    $file_db = new PDO('sqlite:../Data/bd.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}



if (isset($_GET['rating'])) {
    
    $rating = $_GET['rating'];

    if(isset($_GET['albumId'])) {
        $album_id=$_GET['albumId'];

        $query = "SELECT * FROM Noter where albumId = $album_id AND utilisateurId = $idUser";
        $result = $file_db->query($query);
        

        if ($result){
            $nb=0;
            foreach ($result as $row){
                $nb+=1;
            }
            
            if ($nb>=1){
                $del="DELETE FROM Noter WHERE albumId = $album_id AND utilisateurId =$idUser";
                $file_db->query($del);
            }
            $insertNote = "INSERT INTO Noter (albumId,utilisateurId, note) 
            VALUES (:albumId, :utilisateurId, :note)";
            $stmtNote = $file_db->prepare($insertNote);

            $stmtNote->bindParam(':albumId', $album_id);
            $stmtNote->bindParam(':utilisateurId', $idUser);
            $stmtNote->bindParam(':note', $rating);
            if ($stmtNote->execute()) {
                // Redirection vers la page d'accueil ou une autre page après l'ajout réussi
                header("Location: ../templates/album.php?filter=".$album_id);
                exit(); // Assurez-vous de terminer le script après la redirection
            } else {
                echo "Une erreur est survenue lors de l'ajout de la note.";
            }
            

        }else{
            
            $insertNote = "INSERT INTO Noter (albumId,utilisateurId, note) 
            VALUES (:albumId, :utilisateurId, :note)";
            $stmtNote = $file_db->prepare($insertNote);

            $stmtNote->bindParam(':albumId', $album_id);
            $stmtNote->bindParam(':utilisateurId', $idUser);
            $stmtNote->bindParam(':note', $rating);
            if ($stmtNote->execute()) {
                // Redirection vers la page d'accueil ou une autre page après l'ajout réussi
                header("Location: ../templates/album.php?filter="+$album_id);
                exit(); // Assurez-vous de terminer le script après la redirection
            } else {
                echo "Une erreur est survenue lors de l'ajout de l'album.";
            }
        }

    }

 
} else {
    echo "Paramètre 'rating' non trouvé dans l'URL";
}
?>

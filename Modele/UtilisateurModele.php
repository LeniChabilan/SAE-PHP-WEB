<?php



$file_db->exec("CREATE TABLE IF NOT EXISTS Utilisateur ( 
    utilisateurId INTEGER PRIMARY KEY AUTOINCREMENT,
    nomUtilisateir VARCHAR(50),
    emailUtilisateur VARCHAR(50),
    MDPutilisateur VARCHAR(50),
    roleUtilisateur VARCHAR(50),
    DdN DATE,
    numTel TEXT)");
?>
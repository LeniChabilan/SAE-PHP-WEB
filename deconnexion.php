<?php

session_start();
$_SESSION['loggedUser']=null;
header("Location: index.php"); // Redirection vers connexion.php
exit;

?>
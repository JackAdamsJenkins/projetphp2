<?php
// Tentative de connexion à la base de données
try {
    $utilisateur = "libraire";
    $motDePasse = "password1234";
    $baseDeDonnees  = "booklaplateforme";

    $db = new PDO(
        "mysql:host=localhost;dbname=".$baseDeDonnees.";charset=utf8",
        $utilisateur,
        $motDePasse,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Activer la gestion des erreurs
        ]
    );

} catch(Exception $e){
   echo "Connexion à la base de données refusée.";
   exit();
}

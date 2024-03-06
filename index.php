<?php 
$message = null;
if(!empty($_GET["message"])){
    $message = '<p style="color:green;">Le livre a été mis à jour.</p>';

}
if(!empty($_GET["id"])){
    // On fait la suppression
    require_once "connect.php";
    $requete = "DELETE FROM books WHERE id_book = :id";
    $requete = $db->prepare($requete);
    $requete->execute(array(
        "id" => intval($_GET["id"])
    ));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de bibliothèque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Gestion de bibliothèque</h1>
        <a href="ajouterlivre.php" class="btn btn-primary mb-3">
            Ajouter un livre
        </a>
        <?=$message;?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Année</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 // Faire le code qui permet de faire appel à la base de données et afficher les résultats
                 require_once "connect.php";
                 $requete = "SELECT * FROM books";
                 $requete = $db->prepare($requete);
                 $requete->execute();
                 // On récupère tous les résultats
                 $datas = $requete->fetchAll();
                $compteur = 1;
                 foreach($datas as $data){
                ?>
                <tr>
                    <th scope="row"><?=$compteur?></th>
                    <td><?=$data["title_book"]?></td>
                    <td><?=$data["author_book"]?></td>
                    <td><?=$data["year_book"]?></td>
                    <td><?=$data["genre_book"]?></td>
                    <td>
                        <a href="modifierlivre.php?id=<?=$data["id_book"]?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="?id=<?=$data["id_book"]?>" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
                <?php
                $compteur++;
                } // Fermeture du foreach
                ?>
                <!-- Ajoutez plus de lignes si nécessaire -->
                
            </tbody>
        </table>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
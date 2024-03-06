<?php 
// Faire une action UNIQUEMENT si j'ai envoyé le formulaire
$message = null;

if(!empty($_POST["submit"])){
    // Si un champ est vide, afficher un message d'erreur
    if(empty($_POST["bookTitle"]) || empty($_POST["bookAuthor"]) || empty($_POST["bookYear"]) || empty($_POST["bookGenre"])){
        $message = '<p style="color:red;">Vous devez renseigner tous les champs.</p>';
    } else {
        // Si on arrive ici, ça signifie que le formulaire a été envoyé
        // On peut donc traiter la demande
        require_once "connect.php";

        // On vérifie si le livre n'est pas déjà présent dans la base de données
        $requete = "SELECT COUNT(id_book) as quantity FROM books WHERE title_book = :title AND author_book = :author AND year_book = :year AND genre_book = :genre";
        $requete = $db->prepare($requete);
        $requete->execute(array(
            "title" => $_POST["bookTitle"],
            "author" => $_POST["bookAuthor"],
            "year" => $_POST["bookYear"],
            "genre" => $_POST["bookGenre"]
        ));

        // Récupèrer les résultats
        $result = $requete->fetch();

        if($result["quantity"] == 0){
            /// Le livre n'est pas encore présent, on peut l'ajouter
            $requete = "INSERT INTO books(title_book, author_book, year_book, genre_book) VALUES(:title, :author, :year, :genre)";

            $requete = $db->prepare($requete);

            $requete->execute(array(
                "genre" => $_POST["bookGenre"],
                "author" => $_POST["bookAuthor"],
                "title" => $_POST["bookTitle"],
                "year" => $_POST["bookYear"],
            ));

            $message = '<p style="color:green;">Le livre a été ajouté à la base données.</p>';
        } else {
            // le livre est déjà présent, on affiche le message d'erreur
            $message = '<p style="color:red;">Le livre est déjà présent dans la base de données, veuillez en ajouter un autre.</p>';
        }

    }

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Ajouter un livre</h1>
        <?=$message;?>
        <form method="post" action="#">
            <div class="mb-3">
                <label for="bookTitle" class="form-label">Titre</label>
                <input type="text" name="bookTitle" class="form-control" id="bookTitle">
            </div>
            <div class="mb-3">
                <label for="bookAuthor" class="form-label">Auteur</label>
                <input type="text" name="bookAuthor" class="form-control" id="bookAuthor">
            </div>
            <div class="mb-3">
                <label for="bookYear" class="form-label">Année</label>
                <input type="number" name="bookYear" class="form-control" id="bookYear">
            </div>
            <div class="mb-3">
                <label for="bookGenre" class="form-label">Genre</label>
                <input type="text" name="bookGenre" class="form-control" id="bookGenre">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Ajouter">
        </form>
    </div>
    
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

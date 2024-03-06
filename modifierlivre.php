<?php 
    $message = null;
    // Si le formulaire a été envoyé, on met à jour les données
    if(!empty($_POST["submit"])){
        require_once "connect.php";
        $requete = "UPDATE books SET title_book = :title, author_book = :author, year_book = :year, genre_book = :genre WHERE id_book = :id";
        $requete = $db->prepare($requete);
        $requete->execute(array(
            "title" => $_POST["bookTitle"],
            "author" => $_POST["bookAuthor"],
            "year" => $_POST["bookYear"],
            "genre" => $_POST["bookGenre"],
            "id" => intval($_GET["id"])
        ));
        header("location: index.php?message=update");
        // $message = '<p style="color:green;">Le livre a été mis à jour.</p>';

    }

    // Faire l'appel à la base de données UNIQUEMENT si j'ai un ID
    if(!empty($_GET["id"])){
        require_once "connect.php";
        $requete = "SELECT * FROM books WHERE id_book = :id";
        $requete = $db->prepare($requete);
        $requete->execute(array(
            "id" => intval($_GET["id"])
        ));

        $data = $requete->fetch();
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Modifier un livre</h1>
        <?=$message;?>
        <form method="post" action="#">
            <div class="mb-3">
                <label for="bookTitle" class="form-label">Titre</label>
                <input type="text" class="form-control" id="bookTitle" name="bookTitle" value="<?=$data["title_book"]?>">
            </div>
            <div class="mb-3">
                <label for="bookAuthor" class="form-label">Auteur</label>
                <input type="text" class="form-control" id="bookAuthor" name="bookAuthor" value="<?=$data["author_book"]?>">
            </div>
            <div class="mb-3">
                <label for="bookYear" class="form-label">Année</label>
                <input type="number" class="form-control" id="bookYear" name="bookYear" value="<?=$data["year_book"]?>">
            </div>
            <div class="mb-3">
                <label for="bookGenre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="bookGenre" name="bookGenre" value="<?=$data["genre_book"]?>">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Modifier">
        </form>
    </div>
    
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

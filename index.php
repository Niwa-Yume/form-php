<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index du site</title>
</head>

<body>
    <!-- page PHP qui permet de faire une recherche sur IMDB -->
    <section>
        <h1>Recherche de films sur IMDB</h1>
        <!-- index.html -->
        <form action="search.php" method="GET">
            <label for="searchQuery">Entrez un mot-clé de recherche :</label>
            <input type="text" id="keyword" name="keyword">
            <button type="submit">Rechercher</button>
        </form>

    </section>
    <!--affichage des films-->
    <section>
        <h2>Films populaires</h2>
        <ul>
        </ul>
    </section>
</body>

</html>

//se connecter à la base de données pour permettre l'affichage des films populaires depuis ma BDD
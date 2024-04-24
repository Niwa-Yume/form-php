<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index du site</title>
</head>

<body>
    <section>
        <h1>Recherche de films sur IMDB</h1>
        <form action="search.php" method="GET">
            <label for="searchQuery">Entrez un mot-clé de recherche :</label>
            <input type="text" id="keyword" name="keyword">
            <button type="submit">Rechercher</button>
        </form>
    </section>

    <section>
        <h2>Films populaires</h2>
        <ul>
            <!-- include display_movies.php pour afficher les films -->
            <?php include 'display_movies.php'; ?>
        </ul>
    </section>
</body>

</html>

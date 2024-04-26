<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index du site</title>
    <!---STYLE CSS --->
    <style>
        body {
            background-color: #f4e9d8;
            color: #5a4634;
            font-family: 'Arial', sans-serif; 
        }

        h1, h2 {
            font-family: 'Helvetica', sans-serif;
            color: #d3ad7f;
        }

        section {
            margin: 20px;
            padding: 20px;
            border: 1px solid #d3ad7f;
            background-color: #fffaf3;
        }

        form {
            background-color: #e6e2d3; /* Fond pour le formulaire */
            padding: 10px;
            border-radius: 8px; /* Bords arrondis */
        }

        input[type="text"] {
            padding: 8px;
            margin: 10px 0;
            border: none;
            border-bottom: 2px solid #d3ad7f;
        }

        button {
            background-color: #b39269;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #9c7c53;
        }

        ul {
            list-style-type: none; /* Supprimer les puces */
            padding: 0;
        }

        li {
            padding: 8px;
            margin-top: 5px;
            border-bottom: 1px solid #d3ad7f;
        }
    </style>

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

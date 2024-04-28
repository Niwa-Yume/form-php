<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index du site</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            color: #333;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1, h2 {
            color: #5a76a8;
            margin-bottom: 0.5em;
        }

        section {
            margin: 20px;
            padding: 20px;
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            background-color: #ffffff;
            border-radius: 10px;
        }

        form {
            background-color: #e6e6e6;
            padding: 15px;
            border-radius: 8px;
        }

        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #5a76a8;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #4872a3;
            transform: translateY(-2px);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            padding: 8px;
            margin-top: 5px;
            border-bottom: 1px solid #ccc;
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
    <h2>Films populaires par année de sortie</h2>
    <ul>
        <?php include 'display_movies.php'; ?>
    </ul>
</section>
</body>

</html>

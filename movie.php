<?php
echo "<h2>$year</h2>";
if (isset($_GET['url'])) {
    $url = filter_var($_GET['url'], FILTER_SANITIZE_URL);

    // Options pour la requête HTTP
    $opts = [
        "http" => [
            "method" => "GET",
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36\r\n"
        ]
    ];
    //sert à simuler une requête HTTP depuis un navigateur
    $context = stream_context_create($opts);

    // Charger le contenu de la page IMDb du film 
    $content = file_get_contents($url, false, $context);

    // Extraire le titre du film

    preg_match('/<h1[^>]*>(.*?)<\/h1>/', $content, $titleMatch);
    $title = $titleMatch[1] ?? 'Titre non disponible';

    // Extraire l'année de sortie
    preg_match('/(\d{4})/i', $content, $yearMatch);  
    $year = $yearMatch[0] ?? 'Année pas dispomible';
        if(preg_match('/.*?(\d{4})./',$matches[1],$match)) {
            $year["Année de sortie:"] = $match[1];
        }
    // (YYYY)
        else if(preg_match('/.*?(\d{4})/',$matches[1],$match)) {
            $year["Année de sortie:"] = $match[1];
        }

    // Extraire la note IMDb
    preg_match('/<span class="sc-bde20123-1 cMEQkK">(.*?)<\/span>/', $content, $ratingMatch);
    $rating = $ratingMatch[1] ?? 'Note non disponible';

    // Extraire l'URL de l'image du film
    preg_match('/<img.*?src="(.*?)"[^>]*class="[^"]*ipc-image[^"]*"[^>]*>/s', $content, $imageMatch);
    $image = $imageMatch[1] ?? 'Aucune image disponible';

    // Extraire les trois premiers acteurs
    if (preg_match_all('/<a data-testid="title-cast-item__actor".*?>(.*?)<\/a>/s', $content, $actorsMatch)) {
        $actors = array_slice($actorsMatch[1], 0, 3);// Extraire les trois premiers acteurs
        $actorsList = implode(", ", $actors);// Convertir le tableau en chaîne de caractères
        //implode() est une fonction qui prend un tableau et le convertit en une chaîne de caractères avec , comme séparateur
    } else {
        $actorsList = 'Acteurs non disponibles';
    }

    // Afficher les résultats
    echo "<h1>Information sur le film $title</h1>";
    echo "<img src='$image' alt='Movie Poster'><br>";
    echo "<p>Année de sortie: $year</p>";
    echo "<p>IMDB Rating: $rating/10</p>";
    echo "<p>Acteurs: $actorsList</p>";
    var_dump($year);//permet de voir le contenu de la variable $year
} else {
    echo "No URL provided.";
}


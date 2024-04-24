<?php
// Initialisation de la variable $year pour éviter l'erreur si elle n'est pas définie par la suite
$year = 'Année non disponible'; 

if (isset($_GET['url'])) {
    $url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
    $opts = ["http" => ["method" => "GET", "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36\r\n"]];
    $context = stream_context_create($opts);
    $content = file_get_contents($url, false, $context);

    preg_match('/<h1[^>]*>(.*?)<\/h1>/', $content, $titleMatch);
    $title = $titleMatch[1] ?? 'Titre non disponible';

    preg_match('/datePublished":"(\d{4})-\d{2}-\d{2}"/', $content, $yearMatch);
    if (isset($yearMatch[1])) {
        $year = $yearMatch[1]; // Définition de $year si l'année est trouvée
    }

    preg_match('/<span class="sc-bde20123-1 cMEQkK">(.*?)<\/span>/', $content, $ratingMatch);
    $rating = $ratingMatch[1] ?? 'Note non disponible';

    preg_match('/<img[^>]+src="([^"]+)"[^>]*>/i', $content, $imageMatch);
    $image = $imageMatch[1];

    if (preg_match_all('/<a data-testid="title-cast-item__actor".*?>(.*?)<\/a>/s', $content, $actorsMatch)) {
        $actors = array_slice($actorsMatch[1], 0, 3);
        $actorsList = implode(", ", $actors);
    } else {
        $actorsList = 'Acteurs non disponibles';
    }

    echo "<h1>Information sur le film $title</h1>";
    echo "<img src='$image' alt='Movie Poster'><br>";
    echo "<p>Année de sortie: $year</p>";
    echo "<p>IMDB Rating: $rating/10</p>";
    echo "<p>Acteurs: $actorsList</p>";

    // Formulaire pour note et commentaire
    echo "<form action='save_movie.php' method='post'>";
    // On met en hidden les données du film pour les envoyer avec le formulaire
    echo "<input type='hidden' name='title' value='" . htmlspecialchars($title) . "'>";
    echo "<input type='hidden' name='year' value='" . htmlspecialchars($year) . "'>";
    echo "<input type='hidden' name='rating' value='" . htmlspecialchars($rating) . "'>";
    echo "<input type='hidden' name='actors' value='" . htmlspecialchars($actorsList) . "'>";
    echo "<input type='hidden' name='image' value='" . htmlspecialchars($image) . "'>";
    echo "<label for='user_rating'>Votre Note:</label>";
    echo "<input type='number' name='user_rating' min='1' max='10' required><br>";
    echo "<label for='user_comment'>Commentaire:</label>";
    echo "<textarea name='user_comment' required></textarea><br>";
    echo "<input type='submit' value='Enregistrer'>";
    echo "</form>";

} else {
    echo "No URL provided.";
}
?>

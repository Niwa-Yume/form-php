<?php
// search.php
if (isset($_GET['keyword'])) {
    $keyword = urlencode($_GET['keyword']);  // Encode le mot clé pour utilisation dans une URL

    // Construire l'URL avec le mot-clé de recherche
    $url = "https://www.imdb.com/find?q=" . $keyword . "&s=tt&ref_=fn_al_tt_mr";

    // Charger le contenu de l'URL
    $content = file_get_contents($url);

    // Regex pour extraire les titres des films et les liens
    $regex = '/<a class="ipc-metadata-list-summary-item__t"[^>]*?href="([^"]*)"[^>]*?>([^<]+)<\/a>/';
    preg_match_all($regex, $content, $matches);
    $titles = $matches[2];
    $links = array_map(function ($link) {
        return "movie.php?url=https://www.imdb.com" . $link; // Passer l'URL complète à movie.php
    }, $matches[1]);

    // Regex pour extraire les images des films
    $image_regex = '/<img[^>]+src="([^"]*)"/';
    preg_match_all($image_regex, $content, $image_matches);
    $images = $image_matches[1];

    // Affichage des résultats
    echo "<h2>Résultats de recherche pour '$keyword'</h2>";
    echo "<ul>";
    foreach ($titles as $index => $title) {
        echo "<li>";
        echo "<img src='" . htmlspecialchars($images[$index]) . "' alt='" . htmlspecialchars($titles[$index]) . "'><br>";
        echo "<a href='" . htmlspecialchars($links[$index]) . "'>" . htmlspecialchars($title) . "</a><br><br>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "Aucun mot-clé fourni.";
}
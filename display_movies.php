<?php
$host = '127.0.0.1';
$dbname = 'tp-php';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    // Requête pour récupérer tous les films
    $query = "SELECT * FROM movies";
    $stmt = $pdo->query($query);
    // Affichage des films avec while loop et fetch pour obtenir chaque ligne de résultat
    //fetch marche comme un curseur, il avance à chaque appel et s'arrête quand il n'y a plus de lignes
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>";
        echo "<img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['title']) . "'><br>";
        echo "<p>Year: " . htmlspecialchars($row['year']) . "</p>";
        echo "<p>IMDb Rating: " . htmlspecialchars($row['imdb_rating']) . "</p>";
        echo "<p>User Rating: " . htmlspecialchars($row['user_rating']) . "</p>";
        echo "<p>Actors: " . htmlspecialchars($row['actors']) . "</p>";
        echo "</li>";
    }
} catch (PDOException $e) {
    die("Erreur lors de la connexion à la base de données : " . $e->getMessage());
}
?>
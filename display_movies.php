<?php
$host = '127.0.0.1';
$dbname = 'tp-php';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    //pas trouver comment faire le dernier ajouté dans la bdd alors j'ai fait par ordre de sortie
    $query = "SELECT * FROM movies ORDER BY year DESC";
    $stmt = $pdo->query($query);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>";
        echo "<img src='" . htmlspecialchars($row['image'] ?? '') . "' alt='" . htmlspecialchars($row['title'] ?? '') . "'><br>";
        echo "<p><b>Année de sortie:</b> " . htmlspecialchars($row['year'] ?? '') . "</p>";
        echo "<p><b>IMDB Note:</b> " . htmlspecialchars($row['imdb_rating'] ?? '') . "</p>";
        echo "<p><b>Utilisateur Note:</b> " . htmlspecialchars($row['user_rating'] ?? '') . "</p>";
        echo "<p><b>Cast principal:</b> " . htmlspecialchars($row['actors'] ?? '') . "</p>";
        //afficher les commentaires
        echo "<p><b>Commentaire:</b> " . htmlspecialchars($row['user_comment'] ?? '') . "</p>";
        //balise bold en html :
        //
        echo "</li>";
    }
} catch (PDOException $e) {
    die("Erreur lors de la connexion à la base de données : " . $e->getMessage());
}
?>

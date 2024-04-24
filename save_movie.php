<?php
// Paramètres de connexion à la base de données
$host = '127.0.0.1';  // Modifié de 'localhost' à '127.0.0.1'
$dbname = 'tp-php';
$username = 'root';
$password = '';

function prepareInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'  // Assurer l'encodage UTF-8
    ]);

    $requiredFields = ['title', 'year', 'rating', 'actors', 'image', 'user_rating', 'user_comment'];
    $missingFields = [];

    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $missingFields[] = $field;
        } else {
            $_POST[$field] = prepareInput($_POST[$field]);
        }
    }

    if (!empty($missingFields)) {
        $missingFieldsList = implode(', ', $missingFields);
        echo "Erreur : Les champs suivants sont requis et manquants : $missingFieldsList.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO movies (title, year, imdb_rating, actors, image, user_rating, user_comment) VALUES (:title, :year, :imdb_rating, :actors, :image, :user_rating, :user_comment)");
        $stmt->bindParam(':title', $_POST['title']);//
        $stmt->bindParam(':year', $_POST['year']);
        $stmt->bindParam(':imdb_rating', $_POST['rating']);
        $stmt->bindParam(':actors', $_POST['actors']);
        $stmt->bindParam(':image', $_POST['image']);
        $stmt->bindParam(':user_rating', $_POST['user_rating']);
        $stmt->bindParam(':user_comment', $_POST['user_comment']);
        $stmt->execute();

        echo "Les informations ont été enregistrées avec succès.";
        //lien qui redirige vers la page d'accueil
        echo "<a href='index.php'>Retour à l'accueil</a>";
    }

} catch (PDOException $e) {
    die("Erreur lors de la connexion à la base de données ou de l'exécution de la requête : " . $e->getMessage());
}
?>

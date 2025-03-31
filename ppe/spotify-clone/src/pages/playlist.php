<?php
session_start();
include '../config/config.php';
include '../components/header.php';
include '../components/sidebar.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Récupérer les playlists de l'utilisateur depuis la base de données
$user_id = $_SESSION['id'];
$query = "SELECT * FROM playlists WHERE user_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id]);
$playlists = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Playlists</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Mes Playlists</h1>
        <a href="create_playlist.php" class="btn">Créer une nouvelle playlist</a>
        <div class="playlist-list">
            <?php if (count($playlists) > 0): ?>
                <ul>
                    <?php foreach ($playlists as $playlist): ?>
                        <li>
                            <a href="playlist_detail.php?id=<?php echo $playlist['id']; ?>">
                                <?php echo htmlspecialchars($playlist['name']); ?>
                            </a>
                            <a href="edit_playlist.php?id=<?php echo $playlist['id']; ?>" class="edit">Éditer</a>
                            <a href="delete_playlist.php?id=<?php echo $playlist['id']; ?>" class="delete">Supprimer</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucune playlist trouvée.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
    <script src="../assets/js/app.js"></script>
</body>
</html>
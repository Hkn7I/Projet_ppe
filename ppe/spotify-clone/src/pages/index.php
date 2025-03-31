<?php

header('Content-Type: text/html; charset=utf-8');
session_start();

include '../config/config.php';
include '../components/header.php';
include '../components/sidebar.php';
include '../components/footer.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Récupérer les données de l'utilisateur
$user_name = isset($_SESSION['prenom']) ? htmlspecialchars($_SESSION['prenom']) : "Utilisateur";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur Spotify Clone</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/app.js" defer></script>
</head>

<body>
    <header>
        <?php include '../components/header.php'; ?>
    </header>

    <aside>
        <?php include '../components/sidebar.php'; ?>
    </aside>

    <main>
        <h1>Bienvenue, <?php echo $user_name; ?> !</h1>
        <p>Découvrez votre musique préférée et explorez de nouvelles playlists.</p>
        <!-- Featured content can be added here -->
    </main>

    <footer>
        <?php include '../components/footer.php'; ?>
    </footer>
</body>

</html>
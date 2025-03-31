<?php

header('Content-Type: text/html; charset=utf-8');
session_start();

include '../config/config.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Vérifiez si le nom de l'utilisateur est défini
$user_name = isset($_SESSION['prenom']) ? htmlspecialchars($_SESSION['prenom']) : "Utilisateur";

include '../src/components/header.php';
include '../src/components/sidebar.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Clone</title>
    <link rel="stylesheet" href="../src/assets/css/style.css">
    <script src="../src/assets/js/app.js" defer></script>
</head>

<body class="bg-accueil">

    <main>
        <h1>Bienvenue, <?php echo $user_name; ?> !</h1>
        <p>Découvrez votre musique préférée.</p>
        <!-- Featured content can be added here -->
    </main>

    <?php include '../src/components/footer.php'; ?>

</body>
</html>
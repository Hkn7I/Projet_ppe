<?php

header('Content-Type: text/html; charset=utf-8');
session_start();

include 'config.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header("Location: connection.php");
    exit();
}

// Récupérez le prénom de l'utilisateur
$user_name = isset($_SESSION['prenom']) ? htmlspecialchars($_SESSION['prenom']) : "Utilisateur";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Bienvenue <?php echo $user_name; ?></title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h2>MonApp</h2>
    <ul>
      <li><a href="#"><i class="fas fa-home"></i> Accueil</a></li>
      <li><a href="#"><i class="fas fa-search"></i> Rechercher</a></li>
      <li><a href="#"><i class="fas fa-music"></i> Ma Musique</a></li>
      <li><a href="#"><i class="fas fa-cog"></i> Paramètres</a></li>
      <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <header>
      <h1>Bienvenue, <?php echo $user_name; ?> !</h1>
    </header>

    <section class="content">
      <h2>Votre bibliothèque</h2>
      <p>Explorez vos playlists et morceaux préférés ici.</p>
      <!-- Exemple de contenu interactif -->
      <div class="playlist">
        <div class="playlist-item">
          <img src="https://via.placeholder.com/150" alt="Playlist 1">
          <p>Playlist 1</p>
        </div>
        <div class="playlist-item">
          <img src="https://via.placeholder.com/150" alt="Playlist 2">
          <p>Playlist 2</p>
        </div>
        <div class="playlist-item">
          <img src="https://via.placeholder.com/150" alt="Playlist 3">
          <p>Playlist 3</p>
        </div>
      </div>
    </section>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>



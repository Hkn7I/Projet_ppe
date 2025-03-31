<?php

header('Content-Type: text/html; charset=utf-8');
session_start();

include '../config/config.php';

// Check if the user is already logged in
if (isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    // Here you would typically add code to handle the registration logic,
    // such as validating input and saving the user to the database.

    // Example validation (this should be expanded with real checks)
    if (empty($prenom) || empty($email) || empty($password)) {
        $error = 'Tous les champs sont requis.';
    } else {
        // Assume registration is successful
        // Redirect to login or index page
        header("Location: login.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-register">

    <?php include '../components/header.php'; ?>

    <div class="registration-container">
        <h1>Créer un compte</h1>
        <?php if ($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="text" name="prenom" placeholder="Prénom" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">S'inscrire</button>
        </form>
        <p>Déjà un compte ? <a href="login.php">Connectez-vous ici</a></p>
    </div>

    <?php include '../components/footer.php'; ?>

    <script src="../assets/js/app.js"></script>
</body>
</html>
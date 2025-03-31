<?php
session_start();
include '../config/config.php';

// Check if the user is already logged in
if (isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

// Initialize variables for error messages
$email = "";
$password = "";
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Validate credentials (this is a placeholder, implement actual validation)
    if ($email == "user@example.com" && $password == "password") {
        $_SESSION['id'] = $email; // Set session variable
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Spotify Clone</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-login">
    <div class="login-container">
        <h1>Se connecter</h1>
        <?php if ($error_message): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>
        <p>Pas encore de compte? <a href="register.php">S'inscrire</a></p>
    </div>
    <script src="../assets/js/app.js"></script>
</body>
</html>
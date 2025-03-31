<?php
session_start();
?>

<header>
    <div class="logo">
        <a href="index.php"><img src="../assets/images/logo.png" alt="Logo"></a>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="playlist.php">Playlists</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </nav>
    <div class="user-info">
        <?php if (isset($_SESSION['prenom'])): ?>
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['prenom']); ?></span>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>
</header>
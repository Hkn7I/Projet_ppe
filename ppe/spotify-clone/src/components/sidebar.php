<?php
// filepath: spotify-clone/spotify-clone/src/components/sidebar.php

session_start();
?>

<div class="sidebar">
    <h2>Navigation</h2>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="playlist.php">Your Playlists</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<style>
.sidebar {
    width: 250px;
    background-color: #181818;
    color: white;
    padding: 20px;
    position: fixed;
    height: 100%;
}

.sidebar h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    margin: 15px 0;
}

.sidebar ul li a {
    color: #b3b3b3;
    text-decoration: none;
    font-size: 18px;
}

.sidebar ul li a:hover {
    color: #1db954;
}
</style>
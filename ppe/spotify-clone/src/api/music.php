<?php

header('Content-Type: application/json');
session_start();

include '../../config/config.php';

// Connect to the database
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Function to fetch all songs
function fetchSongs($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM songs");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to fetch a specific playlist
function fetchPlaylist($pdo, $playlistId) {
    $stmt = $pdo->prepare("SELECT * FROM playlists WHERE id = :id");
    $stmt->bindParam(':id', $playlistId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Handle API requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'getSongs') {
        $songs = fetchSongs($pdo);
        echo json_encode($songs);
    } elseif (isset($_GET['action']) && $_GET['action'] === 'getPlaylist' && isset($_GET['id'])) {
        $playlist = fetchPlaylist($pdo, $_GET['id']);
        echo json_encode($playlist);
    } else {
        echo json_encode(['error' => 'Invalid request']);
    }
} else {
    echo json_encode(['error' => 'Method not allowed']);
}

?>
// filepath: spotify-clone/spotify-clone/src/assets/js/app.js

document.addEventListener('DOMContentLoaded', function() {
    // Initialize event listeners for interactive elements
    initEventListeners();
});

function initEventListeners() {
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const playlistButtons = document.querySelectorAll('.playlist-button');

    if (loginForm) {
        loginForm.addEventListener('submit', handleLogin);
    }

    if (registerForm) {
        registerForm.addEventListener('submit', handleRegister);
    }

    playlistButtons.forEach(button => {
        button.addEventListener('click', handlePlaylistAction);
    });
}

function handleLogin(event) {
    event.preventDefault();
    const formData = new FormData(event.target);
    
    fetch('api/music.php?action=login', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'index.php';
        } else {
            displayError(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}

function handleRegister(event) {
    event.preventDefault();
    const formData = new FormData(event.target);
    
    fetch('api/music.php?action=register', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'login.php';
        } else {
            displayError(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}

function handlePlaylistAction(event) {
    const action = event.target.dataset.action;
    const playlistId = event.target.dataset.id;

    fetch(`api/music.php?action=${action}&id=${playlistId}`)
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updatePlaylistUI(data.playlist);
        } else {
            displayError(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}

function displayError(message) {
    const errorContainer = document.getElementById('error-container');
    if (errorContainer) {
        errorContainer.textContent = message;
        errorContainer.style.display = 'block';
    }
}

function updatePlaylistUI(playlist) {
    // Logic to update the UI with the new playlist data
}
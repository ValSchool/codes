<?php
session_start();

// Toggle between Dutch ('nl') and English ('en')
if ($_SESSION['lang'] === 'nl') {
    $_SESSION['lang'] = 'en';
} else {
    $_SESSION['lang'] = 'nl';
}

// Respond with success
echo json_encode(['success' => true]);

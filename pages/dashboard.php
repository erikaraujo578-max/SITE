<?php
// dashboard.php

// User dashboard functionality
function userDashboard() {
    // Code for user dashboard
    echo '<h1>User Dashboard</h1>';
}

// Recent readings functionality
function recentReadings() {
    // Code for fetching and displaying recent readings
    echo '<h2>Recent Readings</h2>';
    // Example data
    $readings = [
        'Reading 1',
        'Reading 2',
        'Reading 3'
    ];
    foreach ($readings as $reading) {
        echo '<p>' . $reading . '</p>';
    }
}

// Call the functions
userDashboard();
recentReadings();
?>
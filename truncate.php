<?php
require 'config.php';
try {
    $check = $pdo->exec('TRUNCATE TABLE users;');
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
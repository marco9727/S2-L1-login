<?php

session_start();
include __DIR__ . '/db.php';

if (isset($_SESSION['id'])) {
    $stmt = $pdo->prepare("
        SELECT * FROM users
        WHERE id = :id;
    ");

    $stmt->execute([
        'id' => $_SESSION['id'],
    ]);
    $user_logged = $stmt->fetch();
}
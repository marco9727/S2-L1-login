<?php

include_once __DIR__ . "/includes/init.php";

$username = $_POST['username'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(" SELECT * FROM users WHERE username = :username ");
    $stmt->execute(['username' => $username]);

    $user_logged = $stmt->fetch();
}
include_once __DIR__ . "/includes/initial.php";
?>

<div class="col-8">
    <div class="alert alert-primary text-center" role="alert">
        Welcome <?= isset($user_logged) ? $user_logged['username'] : "" ?>
    </div>
    <div class="d-flex justify-content-center"><a href="index.php"><button type="button"
                onclick="<?= session_destroy(); ?> " class="btn btn-danger">Logout</button></a>
    </div>
</div>

<?php include_once __DIR__ . "/includes/end.php";
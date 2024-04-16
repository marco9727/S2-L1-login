<?php
include_once __DIR__ . "/includes/init.php";
$errors = [];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(" SELECT * FROM users WHERE username = :username ");
    $stmt->execute(['username' => $username]);


    $user_logged = $stmt->fetch();

    if ($user_logged) {
        if (password_verify($password, $user_logged['password'])) {
            $_SESSION['id'] = $user_logged['id'];
            header('Location: /esercizi/S2-L1-login/homepage.php');
        } else {
            $errors['credentials'] = 'Invalid credentials';
        }
    }
}

include_once __DIR__ . '/includes/initial.php'; ?>

    <h1>Login</h1>
    <form action="" method="POST" novalidate>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

<?php
include __DIR__ . '/includes/end.php';

?>
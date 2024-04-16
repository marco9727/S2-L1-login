<?php
include_once __DIR__ . "/includes/init.php";

$user = [];
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $pdo->prepare("INSERT INTO users (username,email,password) VALUES (:username,:email,:password)");
    $stmt->execute(['username' => $username, 'email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);

    header('Location: /esercizi/S2-L1-login/homepage.php');
    exit;
}

    
?>

<?php
include __DIR__ . "/includes/initial.php"; ?>

  
    <h1>Register</h1>
    <form action="" method="POST" novalidate>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        <button type="submit" class="btn btn-primary">Registrami</button>
    </form>

<?php
include __DIR__ . '/includes/end.php';


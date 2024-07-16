<?php
include '../config/database.php';

class AuthController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($username, $password, $role) {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $passwordHash, $role]);
    }

    public function login($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            return true;
        }

        return false;
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
    }
}

// Usage example
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new AuthController($pdo);

    if (isset($_POST['register'])) {
        $authController->register($_POST['username'], $_POST['password'], $_POST['role']);
    } elseif (isset($_POST['login'])) {
        $authController->login($_POST['username'], $_POST['password']);
    } elseif (isset($_POST['logout'])) {
        $authController->logout();
    }
}

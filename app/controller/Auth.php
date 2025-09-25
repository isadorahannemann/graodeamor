<?php
namespace controller;

use service\DoadorService;
use service\InstituicaoService;

class Auth {
    private $doadorService;
    private $instituicaoService;

    public function __construct() {
        $this->doadorService = new DoadorService();
        $this->instituicaoService = new InstituicaoService();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $type = $_POST['type']; 

            if ($type === 'doador') {
                $user = $this->doadorService->findByEmail($email);
            } else {
                $user = $this->instituicaoService->findByEmail($email);
            }

            
            error_log("Login attempt - Email: $email, Type: $type, User found: " . ($user ? 'Yes' : 'No'));
            if ($user) {
                error_log("User ID: " . $user['id'] . ", Password hash: " . $user['password']);
                error_log("Password verify result: " . (password_verify($password, $user['password']) ? 'Success' : 'Failed'));
            }

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_type'] = $type;
                header("Location: /graodeamor/graodeamor/app/index.php?controller=Doacao&action=listar");
                exit;
            } else {
                $error = "Credenciais inválidas.";
            }
        }
        include __DIR__ . "/../../public/auth/login.php";
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $type = $_POST['type']; // 'doador' or 'instituicao'
            $data = $_POST;

            try {
                if ($type === 'doador') {
                    $this->doadorService->salvar($data);
                } else {
                    $this->instituicaoService->salvar($data);
                }
                header("Location: /graodeamor/graodeamor/app/index.php?controller=Auth&action=login");
                exit;
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }
        include __DIR__ . "/../../public/auth/register.php";
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /graodeamor/graodeamor/app/index.php?controller=Auth&action=login");
        exit;
    }
}

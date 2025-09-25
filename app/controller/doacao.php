<?php
namespace controller;

use service\DoacaoService;
use service\InstituicaoService;

class Doacao {
    private $service;
    private $instituicaoService;

    public function __construct() {
        $this->service = new DoacaoService();
        $this->instituicaoService = new InstituicaoService();
    }

    public function listar() {
        $doacoes = $this->service->listar();
        $message = $_SESSION['success_message'] ?? null;
        if ($message) {
            unset($_SESSION['success_message']);
        }
        include "../public/doacao/listar.php";
    }

    public function form() {
        $instituicoes = $this->instituicaoService->listar();
        $doacao = null;
        if (isset($_GET['id'])) {
            $doacao = $this->service->obterPorId((int)$_GET['id']);
        }
        include "../public/doacao/form.php";
    }

    public function salvar() {
        $this->service->salvar($_POST);
        header("Location: index.php?controller=Doacao&action=listar");
    }

    public function receber() {
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'instituicao' && isset($_GET['id'])) {
            $this->service->receber((int)$_GET['id']);
            $_SESSION['success_message'] = "Doação recebida com sucesso";
        }
        header("Location: index.php?controller=Doacao&action=listar");
    }
}

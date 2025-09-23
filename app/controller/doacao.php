<?php
namespace controller;

use service\DoacaoService;
use service\DoadorService;
use service\InstituicaoService;

class Doacao {
    private $service;
    private $doadorService;
    private $instituicaoService;

    public function __construct() {
        $this->service = new DoacaoService();
        $this->doadorService = new DoadorService();
        $this->instituicaoService = new InstituicaoService();
    }

    public function listar() {
        $doacoes = $this->service->listar();
        include "../public/doacao/listar.php";
    }

    public function form() {
        $doadores = $this->doadorService->listar();
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

    public function retirar() {
        session_start();
        if ($_SESSION['user_type'] === 'instituicao' && isset($_GET['id'])) {
            $this->service->retirar((int)$_GET['id']);
            header("Location: index.php?controller=Doacao&action=listar");
        } else {
            header("Location: index.php?controller=Doacao&action=listar");
        }
    }
}

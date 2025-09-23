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
        include "public/doacao/listar.php";
    }

    public function form() {
        $doadores = $this->doadorService->listar();
        $instituicoes = $this->instituicaoService->listar();
        include "public/doacao/form.php";
    }

    public function salvar() {
        $this->service->salvar($_POST);
        header("Location: index.php?controller=Doacao&action=listar");
    }
}


<?php
namespace controller;

use service\InstituicaoService;
use service\DoacaoService;

class Instituicao {
    private $service;
    private $doacaoService;

    public function __construct() {
        $this->service = new InstituicaoService();
        $this->doacaoService = new DoacaoService();
    }

    public function listar() {
        $instituicoes = $this->service->listar();
        include "../public/instituicao/listar.php";
    }

    public function form() {
        include "../public/instituicao/form.php";
    }

    public function salvar() {
        $this->service->salvar($_POST);
        header("Location: index.php?controller=Instituicao&action=listar");
    }

    public function doacoes() {
        $doacoes = $this->doacaoService->listar();
        include "../public/instituicao/listar.php";
    }
}

<?php
namespace controller;

use service\InstituicaoService;

class Instituicao {
    private $service;

    public function __construct() {
        $this->service = new InstituicaoService();
    }

    public function listar() {
        $instituicoes = $this->service->listar();
        include "public/instituicao/listar.php";
    }

    public function form() {
        include "public/instituicao/form.php";
    }

    public function salvar() {
        $this->service->salvar($_POST);
        header("Location: index.php?controller=Instituicao&action=listar");
    }
}

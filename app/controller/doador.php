<?php
namespace controller;

use service\DoadorService;

class Doador {
    private $service;

    public function __construct() {
        $this->service = new DoadorService();
    }

    public function listar() {
        $doadores = $this->service->listar();
        include "public/doador/listar.php";
    }

    public function form() {
        include "public/doador/form.php";
    }

    public function salvar() {
        $this->service->salvar($_POST);
        header("Location: index.php?controller=Doador&action=listar");
    }
}

<?php

namespace models;

class VeiculoModel
{
    private $id;
    private $modelo;
    private $marca;
    private $placa;
    private $ano;
    private $status;

    public function __construct($modelo, $marca, $placa, $ano, $status = 'disponivel') {
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->placa = $placa;
        $this->ano = $ano;
        $this->status = $status;
    }

    public function getId() {
        return $this->id;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function getAno() {
        return $this->ano;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}
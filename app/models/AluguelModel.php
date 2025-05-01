<?php

namespace models;

class AluguelModel
{
    private $id;
    private $clienteId;
    private $veiculoId;
    private $dataInicio;
    private $dataFim;
    private $status;

    public function __construct($clienteId, $veiculoId, $dataInicio, $dataFim, $status = 'ativo') {
        $this->clienteId = $clienteId;
        $this->veiculoId = $veiculoId;
        $this->dataInicio = $dataInicio;
        $this->dataFim = $dataFim;
        $this->status = $status;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getClienteId() {
        return $this->clienteId;
    }

    public function getVeiculoId() {
        return $this->veiculoId;
    }

    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function getDataFim() {
        return $this->dataFim;
    }

    public function getStatus() {
        return $this->status;
    }

    // Setters
    public function setClienteId($clienteId) {
        $this->clienteId = $clienteId;
    }

    public function setVeiculoId($veiculoId) {
        $this->veiculoId = $veiculoId;
    }

    public function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }

    public function setDataFim($dataFim) {
        $this->dataFim = $dataFim;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}
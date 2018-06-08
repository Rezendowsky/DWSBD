<?php

class Fatura{
    private $idFatura;
    private $dataFatura;
    private $valor;
    
    public function incluir() {
        $objeto = new pFatura;
        $objeto->set('idFatura', $this->idFatura);
        $objeto->set('dataFatura', $this->dataFatura);
        $objeto->set('valor', $this->valor);
        $objeto->incluir();
    }

    public function alterar() {
        $objeto = new pFatura;
        $objeto->set('idFatura', $this->idFatura);
        $objeto->set('dataFatura', $this->dataFatura);
        $objeto->set('valor', $this->valor);
        $objeto->alterar();
    }

    public function excluir() {
        $objeto = new pFatura;
        $objeto->set('idFatura', $this->idFatura);
        $objeto->excluir();
    }

    public function consultar() {
        $objeto = new pFatura;
        $objeto->set('idFatura', $this->idFatura);
        $objeto->set('dataFatura', $this->dataFatura);
        $objeto->set('valor', $this->valor);
        return $objeto->consultar();
    }
}
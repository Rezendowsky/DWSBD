<?php

class Cronograma{
    
    private $idCronograma;
    private $inicioHora;
    private $terminoHora;
    private $data;
    
    public function set($prop, $value) {
        $this->$prop = $value;
    }

    public function get($prop) {
        return $this->$prop;
    }

    public function incluir() {
        $objeto = new pCronograma;
        $objeto->set('idCronograma', $this->idCronograma);
        $objeto->set('inicioHora', $this->inicioHora);
        $objeto->set('terminoHora', $this->terminoHora);
        $objeto->set('data', $this->data);
        $objeto->incluir();
    }

    public function alterar() {
        $objeto = new pCronograma;
        $objeto->set('idCronograma', $this->idCronograma);
        $objeto->set('inicioHora', $this->inicioHora);
        $objeto->set('terminoHora', $this->terminoHora);
        $objeto->set('data', $this->data);
        $objeto->alterar();
    }

    public function excluir() {
        $objeto = new pCronograma;
        $objeto->set('idCronograma', $this->idCronograma);
        $objeto->excluir();
    }

    public function consultar() {
        $objeto = new pAluno;
        $objeto->set('idCronograma', $this->idCronograma);
        $objeto->set('inicioHora', $this->inicioHora);
        $objeto->set('terminoHora', $this->terminoHora);
        $objeto->set('data', $this->data);
        return $objeto->consultar();
    }

    
}

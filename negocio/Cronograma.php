<?php

class Cronograma{
    
    private $idCronograma;
    private $inicioHora;
    private $terminoHora;
    private $data;
    private $fkFuncionario;
    private $fkPaciente; 
    
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
        $objeto->set('fkFuncionario', $this->fkFuncionario);
        $objeto->set('fkPaciente', $this->fkPaciente);
        $objeto->incluir();
    }

    public function alterar() {
        $objeto = new pCronograma;
        $objeto->set('idCronograma', $this->idCronograma);
        $objeto->set('inicioHora', $this->inicioHora);
        $objeto->set('terminoHora', $this->terminoHora);
        $objeto->set('data', $this->data);
        $objeto->set('fkFuncionario', $this->fkFuncionario);
        $objeto->set('fkPaciente', $this->fkPaciente);
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
        $objeto->set('fkFuncionario', $this->fkFuncionario);
        $objeto->set('fkPaciente', $this->fkPaciente);
        return $objeto->consultar();
    }

    public function consultarCronograma() {
        $objeto = new pAluno;
        $objeto->set('idCronograma', $this->idCronograma);
        $objeto->set('inicioHora', $this->inicioHora);
        $objeto->set('terminoHora', $this->terminoHora);
        $objeto->set('data', $this->data);
        $objeto->set('fkFuncionario', $this->fkFuncionario);
        $objeto->set('fkPaciente', $this->fkPaciente);
        return $objeto->consultarCronograma();
    }
}
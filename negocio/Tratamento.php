<?php

class Tratamento{
    private $idTratamento;
    private $medicacao;
    private $sintomas;
    private $instrucoes;
  
    
    public function incluir() {
        $objeto = new pTratamento;
        $objeto->set('idTratamento', $this->idTratamento);
        $objeto->set('medicacao', $this->medicacao);
        $objeto->set('sintomas', $this->sintomas);
        $objeto->set('instrucoes', $this->instrucoes);
        $objeto->incluir();
    }

    public function alterar() {
        $objeto = new pTratamento;
        $objeto->set('idTratamento', $this->idTratamento);
        $objeto->set('medicacao', $this->medicacao);
        $objeto->set('sintomas', $this->sintomas);
        $objeto->set('instrucoes', $this->instrucoes);
        $objeto->alterar();
    }

    public function excluir() {
        $objeto = new pTratamento;
        $objeto->set('idTratamento', $this->idTratamento);
        $objeto->excluir();
    }

    public function consultar() {
        $objeto = new pTratamento;
        $objeto->set('idTratamento', $this->idTratamento);
        $objeto->set('medicacao', $this->medicacao);
        $objeto->set('sintomas', $this->sintomas);
        $objeto->set('instrucoes', $this->instrucoes);        
        return $objeto->consultar();
    }
    
    public function gerarPrescricao(){
        
    }
}
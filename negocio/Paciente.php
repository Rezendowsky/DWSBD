<?php

class Paciente {
    
    private $idPaciente;
    private $peso;
    private $altura;
    private $tipoSanguineo;
    private $fkPessoa;
    
    public function set($prop, $value) {
        $this->$prop = $value;
    }
    
    public function get($prop){
        return $this->$prop;
    } 
    
    public function incluir(){
        $objeto = new pPaciente;
        $objeto->set('idPaciente', $this->idPaciente);
        $objeto->set('peso', $this->peso);
        $objeto->set('altura', $this->altura);
        $objeto->set('tipoSanguineo', $this->tipoSanguineo);
        $objeto->set('fkPessoa', $this->fkPessoa);
        $objeto->incluir();
    }
    
    public function alterar() {
        $objeto = new pPaciente;
        $objeto->set('idPaciente', $this->idPaciente);
        $objeto->set('peso', $this->peso);
        $objeto->set('altura', $this->altura);
        $objeto->set('tipoSanguineo', $this->tipoSanguineo);
        $objeto->set('fkPessoa', $this->fkPessoa);
        $objeto->alterar();
    }
    
    public function excluir() {
        $objeto = new pPaciente;
        $objeto->set('idPaciente', $this->idPaciente);
        $objeto->excluir();
    }
        
    public function consultar() {
        $objeto = new pPaciente;
        $objeto->set('idPaciente', $this->idPaciente);
        $objeto->set('peso', $this->peso);
        $objeto->set('altura', $this->altura);
        $objeto->set('tipoSanguineo', $this->tipoSanguineo);
        $objeto->set('fkPessoa', $this->fkPessoa);
        return $objeto->consultar();
    }

    public function consultarPaciente() {
        $objeto = new pPaciente;
        $objeto->set('idPaciente', $this->idPaciente);
        $objeto->set('peso', $this->peso);
        $objeto->set('altura', $this->altura);
        $objeto->set('tipoSanguineo', $this->tipoSanguineo);
        $objeto->set('fkPessoa', $this->fkPessoa);
        return $objeto->consultarPaciente();
    }
}
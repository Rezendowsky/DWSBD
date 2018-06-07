<?php

class Paciente{
    
    private $idPaciente;
    
    public function set($prop, $value) {
        $this->$prop = $value;
    }
    
    public function get($prop){
        return $this->$prop;
    } 
    
    public function incluir(){
        $objeto = new pPaciente;
        $objeto->set('idPaciente', $this->idPaciente);
        $objeto->incluir();
    }
    
    public function alterar() {
        $objeto = new pPaciente;
        $objeto->set('idPaciente', $this->idPaciente);
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
        return $objeto->consultar();
    }
}
<?php

class Consulta {
    private $idConsulta;
    private $dataConsulta;
    private $motivo;
    private $fkFuncionario;
    private $fkPaciente;
    
    public function set($prop, $value) {
        $this->$prop = $value;
    }

    public function get($prop) {
        return $this->$prop;
    }

    public function incluir() {
        $objeto = new pConsulta;
        $objeto->set('idConsulta', $this->idConsulta);
        $objeto->set('dataConsulta', $this->dataConsulta);        
        $objeto->set('motivo', $this->motivo);
        $objeto->set('fkFuncionario', $this->fkFuncionario);
        $objeto->set('fkPaciente', $this->fkPaciente);
        $objeto->incluir();
    }

    public function alterar() {
        $objeto = new pConsulta;
        $objeto->set('idConsulta', $this->idConsulta);
        $objeto->set('dataConsulta', $this->dataConsulta);
        $objeto->set('motivo', $this->motivo);
        $objeto->set('fkFuncionario', $this->fkFuncionario);
        $objeto->set('fkPaciente', $this->fkPaciente);
        $objeto->alterar();
    }

    public function excluir() {
        $objeto = new pConsulta();
        $objeto->set('idConsulta', $this->idConsulta);
        $objeto->excluir();
    }

    public function consultar() {
        $objeto = new pConsulta;
        $objeto->set('idConsulta', $this->idConsulta);
        $objeto->set('dataConsulta', $this->dataConsulta);
        $objeto->set('motivo', $this->motivo);
        $objeto->set('fkFuncionario', $this->fkFuncionario);
        $objeto->set('fkPaciente', $this->fkPaciente);
        return $objeto->consultar();
    }

}
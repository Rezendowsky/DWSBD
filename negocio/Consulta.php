<?php

class Consulta{
    private $idConsulta;
    private $dataConsulta;
    private $cronograma;
    private $motivo;
    
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
        $objeto->set('cronograma', $this->cronograma);
        $objeto->set('motivo', $this->motivo);
        $objeto->incluir();
    }

    public function alterar() {
        $objeto = new pConsulta;
        $objeto->set('idConsulta', $this->idConsulta);
        $objeto->set('dataConsulta', $this->dataConsulta);
        $objeto->set('cronograma', $this->cronograma);
        $objeto->set('motivo', $this->motivo);
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
        $objeto->set('cronograma', $this->cronograma);
        $objeto->set('motivo', $this->motivo);
        return $objeto->consultar();
    }

}
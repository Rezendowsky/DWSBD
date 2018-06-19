<?php

class HistoricoMedico{
    private $idHistoricoMedico;
    private $medicoAnterior;
    private $historico;
    private $fkPessoa;
    
    public function incluir() {
        $objeto = new pHistoricoMedico;
        $objeto->set('idHistoricoMedico', $this->idHistoricoMedico);
        $objeto->set('medicoAnterior', $this->medicoAnterior);
        $objeto->set('historico', $this->historico);
        $objeto->set('fkPessoa', $this->fkPessoa);
        $objeto->incluir();
    }

    public function alterar() {
        $objeto = new pHistoricoMedico;
        $objeto->set('idHistoricoMedico', $this->idHistoricoMedico);
        $objeto->set('medicoAnterior', $this->medicoAnterior);
        $objeto->set('historico', $this->historico);
        $objeto->alterar();
    }

    public function excluir() {
        $objeto = new pHistoricoMedico;
        $objeto->set('idHistoricoMedico', $this->idHistoricoMedico);
        $objeto->excluir();
    }

    public function consultar() {
        $objeto = new pHistoricoMedico;
        $objeto->set('idHistoricoMedico', $this->idHistoricoMedico);
        $objeto->set('medicoAnterior', $this->medicoAnterior);
        $objeto->set('historico', $this->historico);
        return $objeto->consultar();
    }
    
}
<?php
// Lucas e Giovani

class Pessoa {
    
    private $idPessoa;
    private $nome;
    private $cpf;
    private $sexo;
    private $nascimento;
    private $telefone;
    
    public function set($prop, $value) {
        $this->$prop = $value;
    }

    public function get($prop) {
        return $this->$prop;
    }
    
     public function incluir() {
        $objeto = new pPessoa;
        $objeto->set('idPessoa', $this->idPessoa);
        $objeto->set('nome', $this->nome);
        $objeto->set('cpf', $this->cpf);
        $objeto->set('sexo', $this->sexo);
        $objeto->set('nascimento', $this->nascimento);
        $objeto->set('telefone', $this->telefone);
        $objeto->incluir();
    }

    public function alterar() {
        $objeto = new pPessoa;
        $objeto->set('idPessoa', $this->idPessoa);
        $objeto->set('nome', $this->nome);
        $objeto->set('cpf', $this->cpf);
        $objeto->set('sexo', $this->sexo);
        $objeto->set('nascimento', $this->nascimento);
        $objeto->set('telefone', $this->telefone);
        $objeto->alterar();
    }

    public function excluir() {
        $objeto = new pPessoa;
        $objeto->set('idPessoa', $this->idPessoa);
        $objeto->excluir();
    }

    public function consultar() {
        $objeto = new pPessoa;
        $objeto->set('idPessoa', $this->idPessoa);
        $objeto->set('nome', $this->nome);
        $objeto->set('cpf', $this->cpf);
        $objeto->set('sexo', $this->sexo);
        $objeto->set('nascimento', $this->nascimento);
        $objeto->set('telefone', $this->telefone);
        return $objeto->consultar();
    }
    
    public function consultarPessoa() {
        $objeto = new pPessoa;
        $objeto->set('idPessoa', $this->idPessoa);
        $objeto->set('nome', $this->nome);
        $objeto->set('cpf', $this->cpf);
        $objeto->set('sexo', $this->sexo);
        $objeto->set('nascimento', $this->nascimento);
        $objeto->set('telefone', $this->telefone);
        return $objeto->consultar();
    }   
}
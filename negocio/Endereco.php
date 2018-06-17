<?php

class Endereco {

    private $idEndereco;
    private $logradouro;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;
    private $fkPessoa;

    public function set($prop, $value) {
        $this->$prop = $value;
    }

    public function get($prop) {
        return $this->$prop;
    }

    public function incluir() {
        $objeto = new pEndereco;
        $objeto->set('idEndereco', $this->idEndereco);
        $objeto->set('logradouro', $this->logradouro);
        $objeto->set('numero', $this->numero);
        $objeto->set('bairro', $this->bairro);
        $objeto->set('cidade', $this->cidade);
        $objeto->set('estado', $this->estado);
        $objeto->set('cep', $this->cep);
        $objeto->set('fkPessoa', $this->fkPessoa);
        $objeto->incluir();
    }

    public function alterar() {
        $objeto = new pEndereco;
        $objeto->set('idEndereco', $this->idEndereco);
        $objeto->set('logradouro', $this->logradouro);
        $objeto->set('numero', $this->numero);
        $objeto->set('bairro', $this->bairro);
        $objeto->set('cidade', $this->cidade);
        $objeto->set('estado', $this->estado);
        $objeto->set('cep', $this->cep);
        $objeto->set('fkPessoa', $this->fkPessoa);
        $objeto->alterar();
    }

    public function excluir() {
        $objeto = new pEndereco;
        $objeto->set('idEndereco', $this->idEndereco);
        $objeto->excluir();
    }

    public function consultar() {
        $objeto = new pEndereco;
        $objeto->set('idEndereco', $this->idEndereco);
        $objeto->set('logradouro', $this->logradouro);
        $objeto->set('numero', $this->numero);
        $objeto->set('bairro', $this->bairro);
        $objeto->set('cidade', $this->cidade);
        $objeto->set('estado', $this->estado);
        $objeto->set('cep', $this->cep);
        $objeto->set('fkPessoa', $this->fkPessoa);
        return $objeto->consultar();
    }

}

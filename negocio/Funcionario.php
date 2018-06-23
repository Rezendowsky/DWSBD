<?php

class Funcionario {    
    private $idFuncionario;
    private $cargo;
    private $salario;
    private $fkPessoa;

    public function set($prop, $value) {
        $this->$prop = $value;
    }

    public function get($prop) {
        return $this->$prop;
    }

    public function incluir() {
        $objeto = new pFuncionario;
        $objeto->set('idFuncionario', $this->idFuncionario);
        $objeto->set('cargo', $this->cargo);
        $objeto->set('salario', $this->salario);
        $objeto->set('fkPessoa', $this->fkPessoa);
        $objeto->incluir();
    }

    public function alterar() {
        $objeto = new pFuncionario;
        $objeto->set('idFuncionario', $this->idFuncionario);
        $objeto->set('cargo', $this->cargo);
        $objeto->set('salario', $this->salario);
        $objeto->set('fkPessoa', $this->fkPessoa);
        $objeto->alterar();
    }

    public function excluir() {
        $objeto = new pFuncionario;
        $objeto->set('idFuncionario', $this->idFuncionario);
        $objeto->excluir();
    }

    public function consultar() {
        $objeto = new pFuncionario;
        $objeto->set('idFuncionario', $this->idFuncionario);
        $objeto->set('cargo', $this->cargo);
        $objeto->set('salario', $this->salario);
        $objeto->set('fkPessoa', $this->fkPessoa);
        return $objeto->consultar();
    }

    public function consultarFuncionario() {
        $objeto = new pFuncionario;
        $objeto->set('idFuncionario', $this->idFuncionario);
        $objeto->set('cargo', $this->cargo);
        $objeto->set('salario', $this->salario);
        $objeto->set('fkPessoa', $this->fkPessoa);        
        return $objeto->consultarFuncionario();
    }
}

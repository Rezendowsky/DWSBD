<?php

/**
 * Negocio da classe Funcionario
 *
 * @author Giovani Paganini <giovanipaganini@outlook.com>
 * @author Eduardo Augusto <eduardo.agms@icloud.com>
 */
class Funcionario extends Pessoa{
    
    private $idFuncionario;
    private $cargo;
    private $salario;

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
        $objeto->incluir();
    }

    public function alterar() {
        $objeto = new pFuncionario;
        $objeto->set('idFuncionario', $this->idFuncionario);
        $objeto->set('cargo', $this->cargo);
        $objeto->set('salario', $this->salario);
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
        return $objeto->consultar();
    }
}

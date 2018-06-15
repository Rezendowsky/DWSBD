<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author giovanipaganini
 */
class Usuario {
    
    private $idUsuario;
    private $login;
    private $senha;
    
    public function set($prop, $value) {
        $this->$prop = $value;
    }

    public function get($prop) {
        return $this->$prop;
    }
    
     public function incluir() {
        $objeto = new pUsuario;
        $objeto->set('idUsuario', $this->idUsuario);
        $objeto->set('login', $this->login);
        $objeto->set('senha', $this->senha);
        $objeto->incluir();
    }

    public function alterar() {
        $objeto = new pUsuario;
        $objeto->set('idUsuario', $this->idUsuario);
        $objeto->set('login', $this->login);
        $objeto->set('senha', $this->senha);
        $objeto->alterar();
    }

    public function excluir() {
        $objeto = new pUsuario;
        $objeto->set('idUsuario', $this->idUsuario);
        $objeto->excluir();
    }

    public function consultar() {
        $objeto = new pUsuario;
        $objeto->set('idUsuario', $this->idUsuario);
        $objeto->set('login', $this->login);
        $objeto->set('senha', $this->senha);
        return $objeto->consultar();
    }
}

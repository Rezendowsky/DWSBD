/**
 * Negocio da classe Endereço
 *
 * @author Eduardo Augusto <eduardo.agms@icloud.com>
 * @author Lucas Rezende <rezende099@icloud.com>
 */
<?php

class Aluno {

    private $lougradouro;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;

    public function set($prop, $value) {
        $this->$prop = $value;
    }

    public function get($prop) {
        return $this->$prop;
    }

    public function incluir() {
        $objeto = new pEndereco;
        $objeto->set('lougradouro', $this->lougradouro);
        $objeto->set('numero', $this->numero);
        $objeto->set('bairro', $this->bairro);
        $objeto->set('cidade', $this->cidade);
        $objeto->set('estado', $this->estado);
        $objeto->set('cep', $this->cep);
        $objeto->incluir();
    }

    public function alterar() {
        $objeto = new pEndereco;
        $objeto->set('lougradouro', $this->lougradouro);
        $objeto->set('numero', $this->numero);
        $objeto->set('bairro', $this->bairro);
        $objeto->set('cidade', $this->cidade);
        $objeto->set('estado', $this->estado);
        $objeto->set('cep', $this->cep);
        $objeto->alterar();
    }

    public function excluir() {
        $objeto = new pEndereco;
        $objeto->set('', $this->);
        $objeto->excluir();
    }

    public function consultar() {
        $objeto = new pEndereco;
        $objeto->set('lougradouro', $this->lougradouro);
        $objeto->set('numero', $this->numero);
        $objeto->set('bairro', $this->bairro);
        $objeto->set('cidade', $this->cidade);
        $objeto->set('estado', $this->estado);
        $objeto->set('cep', $this->cep);
        return $objeto->consultar();
    }

}

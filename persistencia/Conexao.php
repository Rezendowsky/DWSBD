<?php

class Conexao {

    //put your code here
    private $host = 'localhost'; // Host (Servidor) que executa o banco de dados
    private $user = 'root'; // UsuÃ¡rio que se conecta ao servidor de banco de dados
    private $pass = ''; // Senha do usuÃ¡rio para conexÃ£o ao banco de dados
    private $db = 'DSWBD_2018'; // Nome do banco de dados a ser utilizado
    private $sql; // String da consulta SQL a ser executada
    private $con; //Objeto de conexão com o banco MySql
    
    function Conexao(){
        $this->con = mysqli_connect($this->host, $this->user, $this->pass)
                or die($this->erro(mysqli_error($this->con)));
        mysqli_select_db($this->con, $this->db) or 
                die($this->erro(mysqli_error($this->con)));
    }
    //function getConexao() {
    //}

   function set($prop, $value) {
        $this->$prop = $value;
    }

    function query() {
        $qry = mysqli_query($this->con,$this->sql) or 
                die($this->erro(mysqli_error($this->con)));
        return $qry;
    }

    function erro($erro) {
        echo $erro;
    }

    function fechaconexao() {
        mysqli_close($this->con);
    }

}
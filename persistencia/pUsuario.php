<?php
//Lucas e Eduardo

class pUsuario {
    private $idUsuario;
    private $nome = "";
    private $email = "";
    private $login = "";
    private $senha = "";    

    function incluir() {
        try {
            $obj = new Conexao();
            $sql = "INSERT INTO";
            $sql .= " usuario (idUsuario, nome, email, login, senha) ";
            $sql .= " VALUES('$this->idUsuario','$this->nome','$this->email','$this->login', '$this->senha') ";
            $obj->set('sql', $sql);
            $obj->query();
            $obj->fechaconexao();
        } catch (Exception $e) {
            echo($e->getMessage());
        }
    }

    function alterar() {
        try {
            $obj = new Conexao();            
            $sql = "UPDATE usuario";
            $sql .= " SET nome= '$this->nome', email= '$this->email', login= '$this->login', senha= '$this->senha'";
            $sql .= " WHERE idUsuario= '$this->idUsuario'";
            echo("<p class=\"hidden\">" . $sql . "</p>");
            $obj->set('sql', $sql);
            $obj->query();

            $obj->fechaconexao();
        } catch (Exception $e) {
            echo($e->getMessage());
        }
    }

    function excluir() {
        try {
            $obj = new Conexao();
            $sql = "DELETE FROM usuario";
            $sql .= " WHERE idUsuario = '$this->idUsuario'";
            echo("<p class=\"hidden\">" . $sql . "</p>");
            $obj->set('sql', $sql);

            $obj->query();

            $obj->fechaconexao();
        } catch (Exception $e) {
            echo($e->getMessage());
        }
    }

    function consultar() {
        try {
            $obj = new Conexao();            
            $pessoa = array();
            $sql = "SELECT * ";
            $sql .= " FROM usuario";
            echo("<p class=\"hidden\">" . $sql . "</p>");
            $obj->set('sql', $sql);
            $result = $obj->query();
            $i = 0;
            while ($myrow = $result->fetch_assoc()) {
                $pessoa[$i] = $myrow;
                $i++;
            }
            $obj->fechaconexao();
            return $pessoa;
        } catch (Exception $e) {
            echo($e->getMessage());
        }
    }

    function validaLogin(){
        try {
            $obj = new Conexao();

            $usuario=false;
            $sql = "SELECT login, senha ";
            $sql .= " FROM usuario ";
            $sql .= " WHERE login = '$this->login' and senha = '$this->senha' ";
            $obj->set('sql', $sql);

            $result = $obj->query();
            while ($myrow = $result->fetch_assoc()) {
                $usuario= true;
            }
            $obj->fechaconexao();
            return $usuario;
        } catch (Exception $e) {
            echo($e->getMessage());
        }
    }

    function set($prop, $value) {
        $this->$prop = $value;
    }

    function get($prop) {
        return $this->$prop;
    }
}




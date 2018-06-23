<?php

class pFuncionario {
    private $idFuncionario;
    private $cargo;
    private $salario;
    private $fkPessoa;

    function incluir() {
        try {
            $obj = new Conexao();
            $sql = "INSERT INTO";
            $sql .= " funcionario (cargo, salario, fkPessoa) ";
            $sql .= " VALUES('$this->cargo', '$this->salario',(SELECT MAX(idPessoa) FROM pessoa))";
            echo($sql);
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
            $sql = "UPDATE funcionario";
            $sql .= " SET cargo= '$this->cargo', salario= '$this->salario', fkPessoa= '$this->fkPessoa'";
            $sql .= " WHERE idFuncionario = '$this->idFuncionario'";
            echo($sql);
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
            $sql = "DELETE FROM funcionario";
            $sql .= " WHERE idFuncionario = '$this->idFuncionario'";
            echo($sql);
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
            $funcionario = array();
            $sql = "SELECT * ";
            $sql .= " FROM funcionario ";
            echo($sql);
            $obj->set('sql', $sql);
            $result = $obj->query();
            $i = 0;
            while ($myrow = $result->fetch_assoc()) {
                $funcionario[$i] = $myrow;
                $i++;
            }
            $obj->fechaconexao();
            return $funcionario;
        } catch (Exception $e) {
            echo($e->getMessage());
        }
    }

    function consultarFuncionario() {
        try {
            $obj = new Conexao();
            $funcionario = array();
            $sql = "SELECT * ";
            $sql .= " FROM pessoa p INNER JOIN endereco e ON";
            $sql .= " p.idPessoa = e.fkPessoa INNER JOIN funcionario f ON";
            $sql .= " p.idPessoa = f.fkPessoa";
            echo($sql);
            $obj->set('sql', $sql);
            $result = $obj->query();
            $i = 0;
            while ($myrow = $result->fetch_assoc()) {
                $funcionario[$i] = $myrow;
                $i++;
            }
            $obj->fechaconexao();
            return $funcionario;
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
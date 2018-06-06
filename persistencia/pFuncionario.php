<?php

/**
 * Persistencia da classe Funcionario
 *
 * @author Giovani Paganini <giovanipaganini@outlook.com>
 * @author Lucas Rezende <rezende099@icloud.com>
 */
class pFuncionario extends pPessoa{
    private $idFuncionario;
    private $cargo;
    private $salario;

    function incluir() {
        try {
            $obj = new Conexao();

            $sql = "INSERT INTO";
            $sql .= " Funcionario (cargo, salario) ";
            $sql .= " VALUES('$this->cargo', '$this->salario') ";

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
            
            $sql = "UPDATE Funcionario";
            $sql .= " SET cargo= '$this->cargo', salario= '$this->salario'";
            $sql .= " WHERE idFuncionario = '$this->idFuncionario'";

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

            $sql = "DELETE FROM Funcionario";
            $sql .= " WHERE idFuncionario = '$this->idFuncionario'";

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


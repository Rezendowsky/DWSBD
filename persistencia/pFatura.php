<?php

class Fatura{
    
    private $idFatura;
    private $dataFatura;
    private $valor;
    
    function incluir() {
        try {
            $obj = new Conexao();

            $sql = "INSERT INTO";
            $sql .= " fatura (dataFatura, valor) ";
            $sql .= " VALUES('$this->dataFatura', '$this->valor') ";
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
            
            $sql = "UPDATE fatura";
            $sql .= " SET dataFatura= '$this->dataFatura', valor= '$this->valor'";
            $sql .= " WHERE idFatura = '$this->idFatura'";
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

            $sql = "DELETE FROM fatura";
            $sql .= " WHERE idFatura = '$this->idFatura'";
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
            
            $fatura = array();
            $sql = "SELECT * ";
            $sql .= " FROM fatura ";
            echo($sql);
            $obj->set('sql', $sql);
            $result = $obj->query();
            $i = 0;
            while ($myrow = $result->fetch_assoc()) {
                $fatura[$i] = $myrow;
                $i++;
            }
            $obj->fechaconexao();
            return $fatura;
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

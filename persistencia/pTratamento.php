<?php

class Tratamento{
    
    private $idTratamento;
    private $medicacao;
    private $sintomas;
    private $instrucoes;
    
    function incluir() {
        try {
            $obj = new Conexao();

            $sql = "INSERT INTO";
            $sql .= " tratamento (medicacao, sintomas, instrucoes) ";
            $sql .= " VALUES('$this->idTratamento','$this->medicacao', '$this->sintomas', '$this->instrucoes'";
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
            
            $sql = "UPDATE tratamento";
            $sql .= " SET medicacao = '$this->medicacao', sintomas = '$this->sintomas', instrucoes = '$this->instrucoes'";
            $sql .= " WHERE idTratamento = '$this->idTratamento'";
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
            $sql = "DELETE FROM tratamento";
            $sql .= " WHERE idTratamento = '$this->idTratamento'";
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
            
            $tratamento = array();
            $sql = "SELECT * ";
            $sql .= " FROM tratamento";
            echo($sql);
            $obj->set('sql', $sql);
            $result = $obj->query();
            $i = 0;
            while ($myrow = $result->fetch_assoc()) {
                $tratamento[$i] = $myrow;
                $i++;
            }
            $obj->fechaconexao();
            return $tratamento;
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
    


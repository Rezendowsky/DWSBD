<?php

class pConsulta{
    private $idConsulta;
    private $dataConsulta;    
    private $motivo;
    private $fkFuncionario;
    private $fkPaciente;
    
    function incluir() {
        try {
            $obj = new Conexao();
            $sql = "INSERT INTO";
            $sql .= " consulta (dataConsulta, motivo, fkFuncionario, fkPaciente) ";
            $sql .= " VALUES('$this->dataConsulta', '$this->motivo', '$this->fkFuncionario', '$this->fkPaciente')";
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
            $sql = "UPDATE consulta";
            $sql .= " SET dataConsulta= '$this->dataConsulta', motivo= '$this->motivo', fkFuncionario= '$this->fkFuncionario', fkPaciente= '$this->fkPaciente'";
            $sql .= " WHERE idConsulta = '$this->idConsulta'";
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
            $sql = "DELETE FROM consulta";
            $sql .= " WHERE idConsulta = '$this->idConsulta'";
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
            $consulta = array();
            $sql = "SELECT * ";
            $sql .= " FROM consulta ";
            echo($sql);
            $obj->set('sql', $sql);
            $result = $obj->query();
            $i = 0;
            while ($myrow = $result->fetch_assoc()) {
                $consulta[$i] = $myrow;
                $i++;
            }
            $obj->fechaconexao();
            return $consulta;
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
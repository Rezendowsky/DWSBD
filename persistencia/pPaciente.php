<?php

class pPaciente extends pPessoa{
    private $idPaciente;
    private $peso;
    private $altura;
    private $tipoSanguineo; 
    
    function incluir() {
        try {
            $obj = new Conexao();

            $sql = "INSERT INTO";
            $sql .= " paciente (peso, altura, tipoSanguineo) ";
            $sql .= " VALUES('$this->peso', '$this->altura', '$this->tipoSanguineo') ";

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
            
            $sql = "UPDATE paciente";
            $sql .= " SET peso= '$this->peso', altura= '$this->altura', tipoSanguineo= '$this->altura'";
            $sql .= " WHERE idPaciente = '$this->idPaciente'";

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

            $sql = "DELETE FROM paciente";
            $sql .= " WHERE idPaciente = '$this->idPaciente'";

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
            
            $paciente = array();
            $sql = "SELECT * ";
            $sql .= " FROM paciente ";
            $obj->set('sql', $sql);
            $result = $obj->query();
            $i = 0;
            while ($myrow = $result->fetch_assoc()) {
                $paciente[$i] = $myrow;
                $i++;
            }
            $obj->fechaconexao();
            return $paciente;
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
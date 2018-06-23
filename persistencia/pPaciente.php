<?php

class pPaciente {
    private $idPaciente;
    private $peso;
    private $altura;
    private $tipoSanguineo; 
    private $fkPessoa;
    
    function incluir() {
        try {
            $obj = new Conexao();

            $sql = "INSERT INTO";
            $sql .= " paciente (peso, altura, tipoSanguineo, fkPessoa) ";
            $sql .= " VALUES('$this->peso', '$this->altura', '$this->tipoSanguineo',(SELECT MAX(idPessoa) FROM pessoa)) ";
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
            $sql = "UPDATE paciente";
            $sql .= " SET peso= '$this->peso', altura= '$this->altura', tipoSanguineo= '$this->tipoSanguineo', fkPessoa= '$this->fkPessoa'";            echo($sql);
            $sql .= " WHERE idPaciente = '$this->idPaciente'";
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
            $sql = "DELETE FROM paciente";
            $sql .= " WHERE idPaciente = '$this->idPaciente'";
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
            $paciente = array();
            $sql = "SELECT * ";
            $sql .= " FROM paciente ";
            echo($sql);
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

    function consultarPaciente() {
        try {
            $obj = new Conexao();            
            $paciente = array();
            $sql = "SELECT * ";
            $sql .= " FROM pessoa p INNER JOIN endereco e ON"; 
            $sql .= " p.idPessoa = e.fkPessoa INNER JOIN paciente pa ON p.idPessoa = pa.fkPessoa";
            echo($sql);
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
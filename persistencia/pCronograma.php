<?php

class pCronograma {    
    private $idCronograma;
    private $inicioHora;
    private $terminoHora;
    private $data;
    private $fkFuncionario;
    private $fkPaciente;
 
    function incluir() {
        try {
            $obj = new Conexao();
            $sql = "INSERT INTO";
            $sql .= " cronograma (inicioHora, terminoHora, data, fkFuncionario, fkPaciente)";
            $sql .= " VALUES('$this->idCronograma', '$this->inicioHora', '$this->terminoHora', '$this->data', '$this->fkFuncionario', '$this->fkPaciente')";
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
            $sql = "UPDATE cronograma";
            $sql .= " SET inicioHora= '$this->inicioHora', terminoHora= '$this->terminoHora', data= '$this->data', fkFuncionario= '$this->fkFuncionario', fkPaciente= '$this->fkPaciente'";
            $sql .= " WHERE idCronograma = '$this->idCronograma'";
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
            $sql = "DELETE FROM cronograma";
            $sql .= " WHERE idCronograma = '$this->idCronograma'";
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
            $cronograma = array();
            $sql = "SELECT * ";
            $sql .= " FROM cronograma ";
            echo($sql);
            $obj->set('sql', $sql);
            $result = $obj->query();
            $i = 0;
            while ($myrow = $result->fetch_assoc()) {
                $cronograma[$i] = $myrow;
                $i++;
            }
            $obj->fechaconexao();
            return $cronograma;
        } catch (Exception $e) {
            echo($e->getMessage());
        }
    }

    function consultarCronograma() {
        try {
            $obj = new Conexao();            
            $cronograma = array();
            $sql = "SELECT * ";
            $sql .= " FROM cronograma ";
            echo($sql);
            $obj->set('sql', $sql);
            $result = $obj->query();
            $i = 0;
            while ($myrow = $result->fetch_assoc()) {
                $cronograma[$i] = $myrow;
                $i++;
            }
            $obj->fechaconexao();
            return $cronograma;
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
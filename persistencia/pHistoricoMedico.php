<?php

class HistoricoMedico{
    
    private $idHistoricoMedico;
    private $medicoAnterior;
    private $historico;
    private $fkPaciente;
    
    function incluir() {
        try {
            $obj = new Conexao();

            $sql = "INSERT INTO";
            $sql .= " historicoMEdico (idHistoricoMedico, medicoAnterior, historico, fkPaciente) ";
            $sql .= " VALUES('$this->idHistoricoMedico','$this->medicoAnterior', '$this->historico', (SELECT MAX(idPaciente) FROM paciente)) ";

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

            $sql = "UPDATE historicoMedico";
            $sql .= " SET medicoAnterior= '$this->medicoAnterior', "
                    . "historico= '$this->historico', ";
            $sql .= " WHERE idHistoricoMedico = '$this->idHistoricoMedico'";

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

            $sql = "DELETE FROM historicoMedico";
            $sql .= " WHERE idHistoricoMedico = '$this->idHistoricoMedico'";

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

            $historico = array();
            $sql = "SELECT * ";
            $sql .= " FROM historico ";
            
            $obj->set('sql', $sql);
            $result = $obj->query();
            $i = 0;
            while ($myrow = $result->fetch_assoc()) {
                $historico[$i] = $myrow;
                $i++;
            }
            $obj->fechaconexao();
            return $historico;
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
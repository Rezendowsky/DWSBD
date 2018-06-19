<?php
//Lucas e Eduardo

class pPessoa {
    private $idPessoa;
    private $nome;
    private $cpf;
    private $sexo;
    private $nascimento;
    private $telefone;

    function incluir() {
        try {
            $obj = new Conexao();

            $sql = "INSERT INTO";
            $sql .= " pessoa (idPessoa, nome, cpf, sexo, nascimento, telefone) ";
            $sql .= " VALUES('$this->idPessoa','$this->nome', '$this->cpf', '$this->sexo', '$this->nascimento', '$this->telefone') ";
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
            
            $sql = "UPDATE pessoa";
            $sql .= " SET nome = '$this->nome', cpf = '$this->cpf', sexo = '$this->sexo', nascimento = '$this->nascimento', telefone = '$this->telefone'";
            $sql .= " WHERE idPessoa = '$this->idPessoa'";
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
            $sql = "DELETE FROM pessoa";
            $sql .= " WHERE idPessoa = '$this->idPessoa'";
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
            
            $pessoa = array();
            $sql = "SELECT * ";
            $sql .= " FROM pessoa p INNER JOIN endereco e ON";
            $sql .= " p.idPessoa = e.fkPessoa INNER JOIN paciente pa ON p.idPessoa = pa.fkPessoa";
            echo($sql);
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

    function consultarPessoa() {
        try {
            $obj = new Conexao();
            
            $pessoa = array();
            $sql = "SELECT * ";
            $sql .= " FROM pessoa p INNER JOIN endereco e ON";
            $sql .= " WHERE nome = '$this->nome'";
            echo($sql);
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

    function set($prop, $value) {
        $this->$prop = $value;
    }

    function get($prop) {
        return $this->$prop;
    }
}



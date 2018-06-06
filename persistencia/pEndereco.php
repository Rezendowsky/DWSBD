/**
 * Persistencia da classe Funcionario
 *
 * @author Giovani Paganini <giovanipaganini@outlook.com>
 * @author Eduardo Augusto <eduardo.agms@icloud.com>
 */
<?php
class pEndereco {
    private $idendereco;
    private $lougradouro;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;

    function incluir() {
        try {
            $obj = new Conexao();

            $sql = "INSERT INTO";
            $sql .= " endereco (logradouro, numero, bairro, cidade, estado, cep)";
            $sql .= " VALUES('$this->lougradouro','$this->numero','$this->bairro','$this->cidade','$this->estado','$this->cep')";

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
            
            $sql = "UPDATE endereco";
            $sql .= " SET lougradouro= '$this->lougradouro', numero= '$this->numero', bairro= '$this->bairro', cidade= '$this->cidade', estado= '$this->estado', cep= '$this->cep'";
            $sql .= " WHERE idendereco = '$this->idendereco'";

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

            $sql = "DELETE FROM endereco";
            $sql .= " WHERE idendereco = '$this->idendereco'";

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
            
            $endereco = array();
            $sql = "SELECT * ";
            $sql .= " FROM endereco ";
            $obj->set('sql', $sql);
            $result = $obj->query();
            $i = 0;
            while ($myrow = $result->fetch_assoc()) {
                $endereco[$i] = $myrow;
                $i++;
            }
            $obj->fechaconexao();
            return $endereco;
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


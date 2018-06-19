<?php
//Lucas e Eduardo
//1 - Inicializa para o Apache Emitir Erro na tela
//0 - Desabilita o Apache a Emitir Erro na tela
ini_set("display_errors", 1);

include '../persistencia/Conexao.php';
include '../negocio/pessoa.php';
include '../persistencia/pPessoa.php';
include '../negocio/Endereco.php';
include '../persistencia/pEndereco.php';
include '../negocio/Funcionario.php';
include '../persistencia/pFuncionario.php';

$erro = "Ihhh... Parece que essa página esta com erro aguarde enquanto nosso desenvolvedores resolvem este problema! ;)";

//Verifica se foi dado Post na Página
if (!empty($_POST)) {
    $objeto = new Pessoa();
    $objeto->set('idPessoa', $_POST['txtPessoa']);
    $objeto->set('nome', $_POST['txtNome']);
    $objeto->set('cpf', $_POST['txtCpf']);
    $objeto->set('sexo', $_POST['rdbSexo']);
    $objeto->set('nascimento', $_POST['txtNascimento']);
    $objeto->set('telefone', $_POST['txtTelefone']);

    $objetoEndereco = new Endereco();
    $objetoEndereco->set('idEndereco', $_POST['txtEndereco']);
    $objetoEndereco->set('logradouro', $_POST['txtLogradouro']);
    $objetoEndereco->set('numero', $_POST['txtNumero']);
    $objetoEndereco->set('bairro', $_POST['txtBairro']);
    $objetoEndereco->set('cidade', $_POST['txtCidade']);
    $objetoEndereco->set('estado', $_POST['txtEstado']);
    $objetoEndereco->set('cep', $_POST['txtCEP']);
    $objetoEndereco->set('fkPessoa', $_POST['fkPessoa']);

    $objetoFuncionario = new Funcionario();
    $objetoFuncionario->set('idFuncionario', $_POST['txtFuncionario']);
    $objetoFuncionario->set('cargo', $_POST['txtCargo']);
    $objetoFuncionario->set('salario', $_POST['txtSalario']);
    $objetoFuncionario->set('fkPessoa', $_POST['fkPessoa']);

    if ($_POST['txtValor'] == 'gravar') {
        $objeto->incluir();
        $objetoEndereco->incluir();
        $objetoFuncionario->incluir();
    } else if ($_POST['txtValor'] == 'editar') {
        $objeto->alterar();
        $objetoEndereco->alterar();
        $objetoFuncionario->alterar();
    } else if ($_POST['txtValor'] == 'excluir') {
        $objeto->excluir();
    }
}
?>
<html>
    <head>        
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">
            function editar(cod, nome, cpf, nascimento, telefone, sexo,
                    endereco, fkPessoa, logradouro, numero, bairro, cidade, estado, cep,
                    funcionario, cargo, salario) {
                document.frmCad.txtPessoa.value = cod;
                document.frmCad.txtNome.value = nome;
                document.frmCad.txtCpf.value = cpf;
                document.frmCad.txtNascimento.value = nascimento;
                document.frmCad.txtTelefone.value = telefone;
                document.frmCad.rdbSexo.value = sexo;

                document.frmCad.txtEndereco.value = endereco;
                document.frmCad.fkPessoa.value = fkPessoa;
                document.frmCad.txtLogradouro.value = logradouro;
                document.frmCad.txtNumero.value = numero;
                document.frmCad.txtBairro.value = bairro;
                document.frmCad.txtCidade.value = cidade;
                document.frmCad.txtEstado.value = estado;
                document.frmCad.txtCEP.value = cep;

                document.frmCad.txtFuncionario.value = funcionario;
                document.frmCad.txtCargo.value = cargo;
                document.frmCad.txtSalario.value = salario;
                document.frmCad.txtValor.value = "editar";
            }
            function excluir(cod) {
                document.frmCad.txtPessoa.value = cod;
                document.frmCad.txtValor.value = "excluir";
                document.frmCad.submit();
            }
        </script>
    </head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <body>
        <div id="sessao">
            <form name="frmCad" method="post"
                  action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <!--Variável escondida 'hidden' para manipulação do estado do formulário
                Vide: Diagrama de Estado na UML
                -->
                <input type="hidden" name="txtValor" value="gravar">
                <table class="tableForm">
    <!--                <thead class="tableHeader">                    
                        <th>Cadastro de Pessoa</th>                    
                    </thead>-->

                    <tr class="tableHeader">
                        <th class="tdHeader" colspan="6">Agendamentos - Novo</th>
                    </tr>
                    <tr>
                        <td>Paciente:</td>
                        <td><input type="text" name="txtNumero" placeholder="Pesquisar: Joao da Silva"/></td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td><input type="text" name="txtNome" placeholder="Joao da Silva"/></td>
                        <td>Nascimento:</td>
                        <td><input type="date" name="txtNascimento" placeholder="21/09/1954"/></td>
                        <td><input class="btn btnGravar" type="submit" value="Incluir Paciente" name="btnGravar"/></td>

                    </tr>
                    <tr>
                        <td>Cpf:</td>
                        <td><input type="text" name="txtCpf" placeholder="CPF: 701.094.251-58"/></td>
                        <td>Telefone:</td>
                        <td><input type="text" name="txtTelefone" placeholder="(64)992948687"/></td>

                    </tr>
                    <tr>
                        <td>Bairro:</td>
                        <td><input type="text" name="txtBairro" placeholder="Avenida das Dores numero 7"/></td>
                    </tr>
                    <tr>


                        <td>CEP:</td>
                        <td><input type="text" name="txtCEP" placeholder="75650-000"/></td>
                        <td class="hidden"><input readonly="true" type="text" name="fkPessoa" placeholder="75650-000"/></td>
                        <td>Data:</td>
                        <td><input type="date" name="txtNascimento"/></td>

                    </tr>
                    <tr>
                        <td>Sexo:</td>
                        <td><input type="radio" name="rdbSexo" value="M" />Masculino
                            <input type="radio" name="rdbSexo" value="F" />Feminino</td>
                        <td>Motivo:</td>
                        <td><input type="text" name="txtCEP"/></td>

                    </tr>
                    <tr>
                        <td colspan="6">
                            <input class="btn btnGravar" type="submit" value="Gravar" name="btnGravar"/>
                            <input class="btn btnLimpar" type="reset" value="Limpar" name="btnLimpar"/>
                        </td>
                    </tr>
                </table>

                </table>
            </form>
        </div>
    </body>
</html>

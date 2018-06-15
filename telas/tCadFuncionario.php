<?php
//Lucas e Eduardo

//1 - Inicializa para o Apache Emitir Erro na tela
//0 - Desabilita o Apache a Emitir Erro na tela
ini_set("display_errors", 1);

include '../negocio/pessoa.php';
include '../persistencia/Conexao.php';
include '../persistencia/pPessoa.php';

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

    if ($_POST['txtValor'] == 'gravar') {
        $objeto->incluir();
    } else if ($_POST['txtValor'] == 'editar') {
        $objeto->alterar();
    } else if ($_POST['txtValor'] == 'excluir') {
        $objeto->excluir();
    }
}
?>
<html>
    <head>        
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">
            function editar(cod, nome, cpf, sexo, nascimento, telefone) {
                document.frmCad.txtPessoa.value = cod;
                document.frmCad.txtNome.value = nome;
                document.frmCad.txtCpf.value = cpf;
                document.frmCad.txtSexo.value = sexo;
                document.frmCad.txtNascimento.value = nascimento;
                document.frmCad.txtTelefone.value = telefone;
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
                    <th class="tdHeader" colspan="6">Registro de Funcionário</th>
                </tr>
                <tr>
                    <td>Id:</td>
                    <td><input readonly="true" type="text" id="txtPessoa" name="txtPessoa"/></td>
                    <td>Logradouro:</td>
                    <td><input type="text" name="txtLogradouro"/></td>
                    <td>Nº:</td>
                    <td><input type="text" name="txtNumero"/></td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="txtNome"/></td>
                    <td>Bairro:</td>
                    <td><input type="text" name="txtBairro"/></td>
                    <td>Cargo:</td>
                    <td><input type="text" name="txtCargo"/></td>
                </tr>
                <tr>
                    <td>Cpf:</td>
                    <td><input type="text" name="txtCpf"/></td>
                    <td>Cidade:</td>
                    <td><input type="text" name="txtCidade"/></td>
                    <td>Salário:</td>
                    <td><input type="text" name="txtSalario"/></td>
                </tr>
                <tr>
                    <td>Nascimento:</td>
                    <td><input type="text" name="txtNascimento"/></td>
                    <td>Estado:</td>
                    <td><input type="text" name="txtEstado"/></td>
                </tr>
                <tr>
                    <td>Telefone:</td>
                    <td><input type="text" name="txtTelefone"/></td>
                    <td>CEP:</td>
                    <td><input type="text" name="txtCEP"/></td>
                </tr>
                <tr>
                    <td>Sexo:</td>
                    <td><input type="radio" name="rdbSexo" value="Masculino" />Masculino
                        <input type="radio" name="rdbSexo" value="Feminino" />Feminino</td>
                </tr>
                <tr>
                    <td colspan="6">
                        <input class="btn btnGravar" type="submit" value="Gravar" name="btnGravar"/>
                        <input class="btn btnLimpar" type="reset" value="Limpar" name="btnLimpar"/>
                    </td>
                </tr>
            </table>
            <table class="tableResult" cellspacing="1" cellpadding="1">
                <tr>
                    <td>#</td>
                    <td>ID Pessoa</td>
                    <td>Nome</td>
                    <td>Nascimento</td>
                    <td>Telefone</td>
                    <td>Sexo</td>
                    <td>Logradouro</td>
                    <td>Nº</td>
                    <td>Bairro</td>
                    <td>Cidade</td>
                    <td>Estado</td>
                    <td>CEP</td>
                    <td>Cargo</td>
                    <td>Salario</td>               
                </tr>
                <?php
                $count = 0;
                $objeto = new Pessoa();
                if ($objeto->consultar() != null) {
                    foreach ($objeto->consultar() as $valor) {
                    $count += 1;
                    echo ('<tr>');
                        echo("<td>" . $count . "</td>");
                        echo("<td>" . $valor['idPessoa'] . "</td>");
                        echo("<td>" . $valor['nome'] . "</td>");
                        echo("<td>" . $valor['cpf'] . "</td>");
                        echo("<td>" . $valor['sexo'] . "</td>");
                        echo("<td>" . $valor['nascimento'] . "</td>");
                        echo("<td>" . $valor['telefone'] . "</td>");
                        echo("<td><INPUT TYPE='button' VALUE='Editar'
                            onClick='editar(" . $valor['idPessoa'] . ",\"" . $valor['nome'] . $valor[''] ."\");'></td>");
                        echo("<td><INPUT TYPE='button' VALUE='Excluir'
                            onClick='excluir(" . $valor['idAluno'] . ");'></td>");
                        echo ('</tr>');
                    }
                } else {
                    echo("Desculpe! Nenhum registro encontrado.");
                }
                ?>
            </table>
        </form>
        </div>
    </body>
</html>

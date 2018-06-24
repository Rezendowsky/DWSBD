<?php
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
    $objeto->set('nascimento', $_POST['txtNascimento']);
    $objeto->set('telefone', $_POST['txtTelefone']);
    $objeto->set('sexo', $_POST['rdbSexo']);

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
<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">        
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript">
        function editar(cod, fkPessoa, nome, cpf, nascimento, telefone, sexo, 
            endereco, logradouro, numero, bairro, cidade, estado, cep, 
            funcionario, cargo, salario) {
            document.frmCad.txtPessoa.value = cod;
            document.frmCad.fkPessoa.value = fkPessoa;
            document.frmCad.txtNome.value = nome;
            document.frmCad.txtCpf.value = cpf;
            document.frmCad.txtNascimento.value = nascimento;
            document.frmCad.txtTelefone.value = telefone;
            document.frmCad.rdbSexo.value = sexo;
            
            document.frmCad.txtEndereco.value = endereco;                
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

<body>
<header>
            <a href="tMenuPrincipal.php">Home</a>
            <a href="#">Bem vindo, <?php //echo($usuario->get('login')); ?></a>
        </header>
    <div id="sessao">
        <form name="frmCad" method="post"
        action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <!--Variável escondida 'hidden' para manipulação do estado do formulário
                Vide: Diagrama de Estado na UML
            -->
            <input class="hidden" name="txtValor" value="gravar">
            <table class="tableForm">
                <tr class="tableHeader">
                    <th class="tdHeader" colspan="6">Registro de Funcionário</th>
                </tr>
                <tr>
                    <td>Id:</td>
                    <td><input readonly="true" type="text" id="txtPessoa" name="txtPessoa"/></td>
                    <td class="hidden">fkPessoa<input readonly="true" type="text" name="fkPessoa"/></td>
                    <td class="hidden">idEndereco<input readonly="true" type="text" id="txtEndereco" name="txtEndereco"/></td>
                    <td class="hidden">idFuncionario<input readonly="true" type="text" id="txtFuncionario" name="txtFuncionario"/></td>

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
                    <td><input type="date" name="txtNascimento"/></td>
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
                    <td><input type="radio" name="rdbSexo" value="M" />Masculino
                        <input type="radio" name="rdbSexo" value="F" />Feminino</td>
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
                        <td class="hidden">fkPessoa</td>
                        <td>Nome</td>
                        <td>CPF</td>
                        <td>Nascimento</td>
                        <td>Telefone</td>
                        <td>Sexo</td>
                        <td class="hidden">idEndereco</td>                        
                        <td>Logradouro</td>
                        <td>Nº</td>
                        <td>Bairro</td>
                        <td>Cidade</td>
                        <td>Estado</td>
                        <td>CEP</td>                    
                        <td class="hidden">idFuncionario</td>
                        <td>Cargo</td>                    
                        <td>Salario</td>                    
                        <td>&emsp;</td>
                        <td>&emsp;</td>               
                    </tr>
                    <?php
                    $count = 0;
                    $objetoFuncionario = new Funcionario();
                    if ($objetoFuncionario->consultarFuncionario() != null) {
                        foreach ($objetoFuncionario->consultarFuncionario() as $valor) {
                            $count += 1;
                            echo ('<tr>');
                            echo("<td>" . $count . "</td>");
                            echo("<td>" . $valor['idPessoa'] . "</td>");
                            echo("<td class=\"hidden\">" . $valor['fkPessoa'] . "</td>");
                            echo("<td>" . $valor['nome'] . "</td>");
                            echo("<td>" . $valor['cpf'] . "</td>");
                            echo("<td>" . $valor['nascimento'] . "</td>");
                            echo("<td>" . $valor['telefone'] . "</td>");
                            echo("<td>" . $valor['sexo'] . "</td>");
                            echo("<td class=\"hidden\">" . $valor['idEndereco'] . "</td>");
                            echo("<td>" . $valor['logradouro'] . "</td>");
                            echo("<td>" . $valor['numero'] . "</td>");
                            echo("<td>" . $valor['bairro'] . "</td>");
                            echo("<td>" . $valor['cidade'] . "</td>");
                            echo("<td>" . $valor['estado'] . "</td>");
                            echo("<td>" . $valor['cep'] . "</td>");
                            echo("<td class=\"hidden\">" . $valor['idFuncionario'] . "</td>");
                            echo("<td>" . $valor['cargo'] . "</td>");
                            echo("<td>" . $valor['salario'] . "</td>");
                            echo("<td><INPUT class='btn btnEditar' TYPE='button' VALUE='Editar'
                                onClick='editar(" . $valor['idPessoa'] . ",\"" .
                                $valor['fkPessoa'] . "\",\"" .
                                $valor['nome'] . "\",\"" .
                                $valor['cpf'] . "\",\"" .
                                $valor['nascimento'] . "\",\"" .
                                $valor['telefone'] . "\",\"" .
                                $valor['sexo'] . "\",\"" .
                                $valor['idEndereco'] . "\",\"" .
                                $valor['logradouro'] . "\",\"" .
                                $valor['numero'] . "\",\"" .
                                $valor['bairro'] . "\",\"" .
                                $valor['cidade'] . "\",\"" .
                                $valor['estado'] . "\",\"" .
                                $valor['cep'] . "\",\"" .
                                $valor['idFuncionario'] . "\",\"" .
                                $valor['cargo'] . "\",\"" .
                                $valor['salario'] . "\");'></td>");
                            echo("<td><INPUT class='btn btnExcluir' TYPE='button' VALUE='Excluir'
                                onClick='excluir(" . $valor['idPessoa'] . ");'></td>");
                            echo ('</tr>');
                        }
                    } else {
                        echo("Desculpe! Nenhum registro encontrado.");
                    }
                    ?>
                </table>
            </form>
        </div>
        <footer>
            <p>Desenvolvido precariamente por: Eduardo, Giovani e Lucas - Copyright &copy Arenvges Dev Group 2018</p>
        </footer>
    </body>
</html>

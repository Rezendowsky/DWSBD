<?php
    //1 - Inicializa para o Apache Emitir Erro na tela
    //0 - Desabilita o Apache a Emitir Erro na tela
    ini_set("display_errors", 1);

    include '../persistencia/Conexao.php';
    include '../negocio/pessoa.php';
    include '../persistencia/pPessoa.php';
    include '../negocio/Endereco.php';
    include '../persistencia/pEndereco.php';
    include '../negocio/Paciente.php';
    include '../persistencia/pPaciente.php';


    $erro = "Ihhh... Parece que essa página esta com erro aguarde enquanto nosso desenvolvedores resolvem este problema! ;)";

    //Verifica se foi dado Post na Página
    if (!empty($_POST)) {

        $objetoPessoa = new Pessoa();
        $objetoPessoa->set('idPessoa', $_POST['txtPessoa']);
        $objetoPessoa->set('nome', $_POST['txtNome']);
        $objetoPessoa->set('cpf', $_POST['txtCpf']);
        $objetoPessoa->set('sexo', $_POST['rdbSexo']);
        $objetoPessoa->set('nascimento', $_POST['txtNascimento']);
        $objetoPessoa->set('telefone', $_POST['txtTelefone']);

        $objetoPaciente = new Paciente();
        $objetoPaciente->set('idPaciente', $_POST['txtPaciente']);
        $objetoPaciente->set('peso', $_POST['txtPeso']);
        $objetoPaciente->set('altura', $_POST['txtAltura']);
        $objetoPaciente->set('tipoSanguineo', $_POST['txtTipoSanguineo']);
        $objetoPaciente->set('fkPessoa', $_POST['fkPessoa']);

        if ($_POST['txtValor'] == 'gravar') {
            $objeto->incluir();
            $objetoEndereco->incluir();
            $objetoPaciente->incluir();
        } else if ($_POST['txtValor'] == 'editar') {
            $objeto->alterar();
            $objetoEndereco->alterar();
            $objetoPaciente->alterar();
        } else if ($_POST['txtValor'] == 'pesquisar') {            
            $objetoPaciente->consultarPaciente();
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
            paciente, peso, altura, tipoSanguineo,
            endereco, logradouro, numero, bairro, cidade, estado, cep) {
                document.frmCad.txtPessoa.value = cod;
                document.frmCad.fkPessoa.value = fkPessoa;
                document.frmCad.txtNome.value = nome;
                document.frmCad.txtCpf.value = cpf;
                document.frmCad.txtNascimento.value = nascimento;
                document.frmCad.txtTelefone.value = telefone;
                document.frmCad.rdbSexo.value = sexo;
                document.frmCad.txtPaciente.value = paciente;
                document.frmCad.txtPeso.value = peso;
                document.frmCad.txtAltura.value = altura;
                document.frmCad.txtTipoSanguineo.value = tipoSanguineo;
                document.frmCad.txtEndereco.value = endereco;            
                document.frmCad.txtLogradouro.value = logradouro;
                document.frmCad.txtNumero.value = numero;
                document.frmCad.txtBairro.value = bairro;
                document.frmCad.txtCidade.value = cidade;
                document.frmCad.txtEstado.value = estado;
                document.frmCad.txtCEP.value = cep;                    
                document.frmCad.txtValor.value = "editar";
            }
            
            function pesquisar(idPessoa, fkPessoa, nome, cpf, nascimento, telefone, sexo,
            paciente, peso, altura, tipoSanguineo) {
                document.frmCad.txtPessoa.value = cod;
                document.frmCad.fkPessoa.value = fkPessoa;
                document.frmCad.txtNome.value = nome;
                document.frmCad.txtCpf.value = cpf;
                document.frmCad.txtNascimento.value = nascimento;
                document.frmCad.txtTelefone.value = telefone;
                document.frmCad.rdbSexo.value = sexo;
                document.frmCad.txtPaciente.value = paciente;
                document.frmCad.txtPeso.value = peso;
                document.frmCad.txtAltura.value = altura;
                document.frmCad.txtTipoSanguineo.value = tipoSanguineo;
                document.frmCad.txtValor.value = "pesquisar";
            }

            function excluir(cod) {
                document.frmCad.txtPessoa.value = cod;
                document.frmCad.txtValor.value = "excluir";
                document.frmCad.submit();
            }
        </script>
    </head>
    
    <body>
        <div id="sessao">
            <form name="frmCad" method="post"
            action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!--Variável escondida 'hidden' para manipulação do estado do formulário Vide: Diagrama de Estado na UML-->
                <input name="txtValor" value="pesquisar">
                <input type="checkbox" value="esconder">
                <table class="tableForm">                
                    <tr class="tableHeader">
                        <th class="tdHeader" colspan="2">Pesquisar Paciente</th>
                    </tr>
                    <tr>                                            
                        <td colspan="2">Nome: <input type="text" name="txtNome" required/></td>                                                
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="btn btnMenuNeutro" type="submit" value="Pesquisar" name="btnPesquisar"/>                            
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
                        <td class="hidden">idPaciente</td>
                        <td>Peso</td>
                        <td>Altura</td>
                        <td>TipoSanguineo</td>                    
                        <td>&emsp;</td>
                        <td>&emsp;</td>                        
                    </tr>
                    <?php
                        $count = 0;
                        $objetoPaciente = new Paciente();

                        if ($objetoPaciente->consultarPaciente() != null) {
                            foreach ($objetoPaciente->consultarPaciente() as $valor) {
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
                                echo("<td class=\"hidden\">" . $valor['idPaciente'] . "</td>");
                                echo("<td>" . $valor['peso'] . "</td>");
                                echo("<td>" . $valor['altura'] . "</td>");
                                echo("<td>" . $valor['tipoSanguineo'] . "</td>");              
                                echo("<td><INPUT class='btn btnEditar' TYPE='button' VALUE='Editar'
                                    onClick='editar(". $valor['idPessoa'] . ",\"" .
                                        $valor['fkPessoa'] . "\",\"" .
                                        $valor['nome'] . "\",\"" .
                                        $valor['cpf'] . "\",\"" .
                                        $valor['nascimento'] . "\",\"" .
                                        $valor['telefone'] . "\",\"" .
                                        $valor['sexo'] . "\",\"" .
                                        $valor['idPaciente'] . "\",\"" .
                                        $valor['peso'] . "\",\"" .
                                        $valor['altura'] . "\",\"" .
                                        $valor['tipoSanguineo'] ."\");'></td>");
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
    </body>
</html>

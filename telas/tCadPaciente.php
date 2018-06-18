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
        // function editar(cod, nome, cpf, nascimento, telefone, sexo) {
        //     document.frmCad.txtPessoa.value = cod;
        //     document.frmCad.txtNome.value = nome;
        //     document.frmCad.txtCpf.value = cpf;
        //     document.frmCad.txtNascimento.value = nascimento;
        //     document.frmCad.txtTelefone.value = telefone;
        //     document.frmCad.rdbSexo.value = sexo;
        //     document.frmCad.txtValor.value = "editar";
        // }


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
                <input name="txtValor" value="gravar">
                <input type="checkbox" value="esconder">
                <table class="tableForm">                
                    <tr class="tableHeader">
                        <th class="tdHeader" colspan="6">Registro de Paciente</th>
                    </tr>
                    <tr>
                        <td>Id:</td>
                        <td><input readonly="true" type="text" id="txtPessoa" name="txtPessoa" /></td>                        
                        <td class="hidden">fkPessoa<input readonly="true" type="text" name="fkPessoa"/></td>                        
                        <td class="hidden">idEndereco<input readonly="true" type="text" id="txtEndereco" name="txtEndereco"/></td>
                        <td>Logradouro:</td>
                        <td><input type="text" name="txtLogradouro" required/></td>
                        <td>Nº:</td>
                        <td><input type="text" name="txtNumero" required/></td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td><input type="text" name="txtNome" required/></td>
                        <td>Bairro:</td>
                        <td><input type="text" name="txtBairro" required/></td>
                    </tr>
                    <tr>
                        <td>Cpf:</td>
                        <td><input type="text" name="txtCpf" required/></td>
                        <td>Cidade:</td>
                        <td><input type="text" name="txtCidade" required/></td>
                    </tr>
                    <tr>
                        <td>Nascimento:</td>
                        <td><input type="date" name="txtNascimento" required/></td>
                        <td>Estado:</td>
                        <td><input type="text" name="txtEstado" required/></td>
                    </tr>
                    <tr>
                        <td>Telefone:</td>
                        <td><input type="text" name="txtTelefone" required/></td>
                        <td>CEP:</td>
                        <td><input type="text" name="txtCEP" required/></td>                        
                    </tr>
                    <tr>
                        <td>Sexo:</td>
                        <td><input type="radio" name="rdbSexo" value="M" checked required/>Masculino
                        <input type="radio" name="rdbSexo" value="F" required/>Feminino</td>                        
                    </tr>
                    <tr class="hidden">
                        <td>Paciente</td>
                        <td><input readonly="true" type="text" name="txtPaciente" required/></td>
                    </tr>
                    <tr>
                        <td>Peso</td>
                        <td><input type="text" name="txtPeso" required/></td>
                    </tr>
                    <tr>
                        <td>Altura</td>
                        <td><input type="text" name="txtAltura" required/></td>
                    </tr>
                    <tr>
                        <td>Tipo Sanguineo</td>
                        <td><input type="text" name="txtTipoSanguineo" required/></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <input class="btn btnGravar" type="submit" value="Gravar" name="btnGravar"/>
                            <input class="btn btnEditar" type="reset" value="Limpar" name="btnLimpar"/>
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
                        <td class="hidden">idEndereco</td>                        
                        <td>Logradouro</td>
                        <td>Nº</td>
                        <td>Bairro</td>
                        <td>Cidade</td>
                        <td>Estado</td>
                        <td>CEP</td>                    
                        <td>&emsp;</td>
                        <td>&emsp;</td>                        
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
                                echo("<td class=\"hidden\">" . $valor['idEndereco'] . "</td>");                                
                                echo("<td>" . $valor['logradouro'] . "</td>");
                                echo("<td>" . $valor['numero'] . "</td>");
                                echo("<td>" . $valor['bairro'] . "</td>");
                                echo("<td>" . $valor['cidade'] . "</td>");
                                echo("<td>" . $valor['estado'] . "</td>");
                                echo("<td>" . $valor['cep'] . "</td>");                        
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
                                        $valor['tipoSanguineo'] . "\",\"" .
                                        $valor['idEndereco'] . "\",\"" .                                        
                                        $valor['logradouro'] . "\",\"" .
                                        $valor['numero'] . "\",\"" .
                                        $valor['bairro'] . "\",\"" .
                                        $valor['cidade'] . "\",\"" .
                                        $valor['estado'] . "\",\"" .
                                        $valor['cep'] ."\");'></td>");
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

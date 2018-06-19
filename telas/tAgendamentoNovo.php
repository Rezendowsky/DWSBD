<html>
    <head>        
        <link href="style.css" rel="stylesheet" type="text/css"/>
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
                            <input class="btn btnEditar" type="reset" value="Limpar" name="btnLimpar"/>
                        </td>
                    </tr>
                </table>

                </table>
            </form>
        </div>
    </body>
</html>

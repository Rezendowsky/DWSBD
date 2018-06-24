<?php
ini_set("display_errors", 1);
include_once '../persistencia/pUsuario.php';
include_once '../negocio/Usuario.php';
session_start();
?>
<!DOCTYPE HTML>
    <head>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title>Recepcionista</title>
    </head>
    <?php
    // if (strpos($_SERVER["HTTP_REFERER"], "tUsuario.php")): {
    //         $usuario = $_SESSION["usuario"];
    //     }
    ?>
    <body>
        <header>
            <a href="tMenuPrincipal.php">Home</a>
            <a href="#"><?php //echo($usuario->get('nome')); ?></a>
        </header>
        <div id="sessao">
            <table class="tableForm">  
                <tbody id="telaMenu">
                    <tr class="tableHeader">
                        <th class="tdHeader" colspan="3">Recepcionista</th>
                    </tr>
                    <tr>
                        <td><input class="btn btnMenu btnMenuNeutro" type="button" 
                            onclick="location.href='tPesquisaPaciente.php'" value="Pesquisar Paciente" name="btnMenu"/>
                        </td>
                        <td><input class="btn btn btnMenu btnMenuPositivo" type="button" 
                            onclick="location.href='tCadPaciente.php'" value="Registrar Paciente" name="btnMenu"/>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="btn btnMenu btnMenuNeutro" type="button" 
                            onclick="location.href='tPesquisaFuncionario.php'" value="Pesquisar Funcionário" name="btnMenu"/>
                        </td>
                        <td><input class="btn btnMenu btnMenuPositivo" type="button" 
                            onclick="location.href='tCadFuncionario.php'" value="Registrar Funcionario" name="btnMenu"/>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="btn btnMenu btnMenuNeutro" type="button" 
                            onclick="location.href='tAgendamentoNovo.php'" value="Agendamentos" name="btnMenu"/>
                        </td>
                        <td><input class="btn btnMenu btnMenuNeutro" type="button" 
                            onclick="location.href='tTratamentos.php'" value="Tratamentos" name="btnMenu"/>
                        </td>
                    </tr>
                </tbody>
            </table>            
        </div> 
        <footer>
            <p>Desenvolvido precariamente por: Eduardo, Giovani e Lucas - Copyright &copy Arenvges Dev Group 2018</p>
        </footer>
    </body>
    <?php //endif; ?>
</html>

<?php
ini_set("display_errors", 1);
include_once '../persistencia/pUsuario.php';
include_once '../negocio/Usuario.php';
session_start();
?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title>Recepcionista</title>
    </head>
    <?php
    if (strpos($_SERVER["HTTP_REFERER"], "tUsuario.php")): {
            $usuario = $_SESSION["usuario"];
        }
    ?>
    <body>
        <header>
            <a href="tMenuPrincipal.php">Home</a>
            <a href="#">Bem vindo, <?php echo($usuario->get('login')); ?></a>
        </header>
        <div id="sessao">
            <table class="tableForm">  
                <tbody id="telaMenu">                    
                    <tr class="tableHeader">
                        <th class="tdHeader" colspan="2">Menu Principal</th>
                        <td>Bem vindo, <?php echo($usuario->get('login'));?> </td>
                    </tr>                    
                    <tr>
                        <td colspan=""><input class="btn btnMenu btnMenuNeutro" type="button" 
                            onclick="location.href='tMenuRecepcionista.php'" value="Recepcionista" name="btnMenu"/>
                        </td>
                        <td colspan=""><input class="btn btn btnMenu btnMenuNeutro" type="button"
                            onclick="location.href='tMenuMedico.php'" value="Médico" name="btnMenu"/>
                        </td>
                    </tr>                                            
                </tbody>
            </table>            
        </div>
        <footer>
            <p>Desenvolvido precariamente por: Eduardo, Giovani e Lucas - Copyright &copy Arenvges Dev Group 2018</p>
        </footer>        
    </body>
    <?php endif; ?>
</html>

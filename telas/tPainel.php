<?php
ini_set("display_errors", 1);
include_once '../persistencia/pUsuario.php';
include_once '../negocio/Usuario.php';
session_start();
?>
<HTML>
    <HEAD>
        <TITLE>Painel de Controle</TITLE>
        <LINK href="estilo.css" type="text/css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    </HEAD>
    <?php
    if (strpos($_SERVER["HTTP_REFERER"], "tUsuario.php")): {
            $usuario = $_SESSION["usuario"];
        }
    ?>
        <body leftMargin="0" topMargin="0" scroll="no" marginheight="0" marginwidth="0">
            <table border=1 width="880" height="100%">
                <tr>
                    <td colspan="2">
                        Administrador: <?php echo($usuario->get('nome')); ?> <br/>
                        Login: <?php echo($usuario->get('login')) ?> <br/>
                        E-mail: <?php echo($usuario->get('email')) ?>
                    </td>
                </tr>
                <tr>
                    <td><?php include 'telas/menu.php' ?></td>
                    <td><IFRAME border="0" name="inicial" marginWidth="0"
                                marginHeight="0" src="telas/pagina.php"
                                frameBorder="0" width="100%" scrolling="auto"
                                height="100%"></IFRAME></td>
                </tr>
                <tr>
                    <td colspan="2"><?php include 'telas/rodape.php' ?></td>
                </tr>
            </table>
            <table class="bordaGeral" height="100%" cellSpacing="0" cellPadding="0" width="780" align="center"
                   border="0">
                <tr>
                    <td colspan="2" height="10">
                        <table class="bordamenu" border="0" width="100%" height="100%" cellSpacing="1" cellPadding="1">
                            <tr>
                                <TD rowspan="5" width="150" class="textoCabecalho"></TD>
                                <td height=40 colspan=2 class="textoCabecalho"><b>Seja bem-vindo</b>
                                </td>
                            </tr>
                            <tr>
                                <td class="textoCabecalho" width="10%">Site:</td>
                                <td class="textoCabecalho"><b></b></td>
                            </tr>
                            <tr>
                                <td class="textoCabecalho" width="100">Administrador:</td>
                                <td class="textoCabecalho"><b><?php echo($usuario->get('nome')); ?></b></td>
                            </tr>
                            <tr>
                                <td class="textoCabecalho" width="100">Login:</td>
                                <td class="textoCabecalho"><b><?php echo($usuario->get('login')) ?></b></td>
                            </tr>
                            <tr>
                                <td class="textoCabecalho" width="100">E-mail:</td>
                                <td class="textoCabecalho"><b><?php echo($usuario->get('email')) ?></b></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td vAlign="top" width="130"><?php include_once 'telas/menu.php'; ?></td>
                    <td width="650">
                        <IFRAME border="0" name="inicial" marginWidth="0" marginHeight="0" src="telas/pagina.php" frameBorder="0"
                                width="100%" scrolling="auto" height="100%"></IFRAME>
                    </td>
                </tr>
                <tr>
                    <td colSpan="2" height="20"><?php include_once 'telas/rodape.php'; ?></td>
                </tr>
            </table>
        </body>
    <?php endif; ?>
</HTML>

<?Php
ob_start();
//1 - Inicializa para o Apache Emitir Erro na tela
//0 - Desabilita o Apache a Emitir Erro na tela
ini_set("display_errors", 1);

include_once '../persistencia/Conexao.php';
include_once '../persistencia/pUsuario.php';
include_once '../negocio/Usuario.php';

$erro = "";

//Verifica se foi dado Post na Página
if (!empty($_POST)) {

    $objeto = new Usuario();    
    $objeto->set('login', $_POST['txtLogin']);
    $objeto->set('senha', $_POST['txtSenha']);

    if ($objeto->validaLogin()) {
        session_start();
        $_SESSION["usuario"] = $objeto;
        //Redireciona para outra p�gina
        header("Location: ../telas/tPainel.php");
    } else {
        //Emite uma mensagem
        $erro = "Desculpe, nenhum registro encontrado!";
    }
}
?>

<HTML>
    <HEAD>
        <TITLE>Tela de Login</TITLE>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    </HEAD>
    <BODY>
        <div id="conteiner" style="height: 100%;" align="center">
            <form name="frmLogin" method="post"
                  action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div style="margin-top: 200px; width:302; height:127; background-image: url(imagens/login.jpg); background-repeat: no-repeat;" align="left">
                    <div id="linha1" class="textoLogin">
                        <label>SmartMED </label>
                    </div>
                    <div id="linha2" class="textoLogin">
                        <label>Login: </label> <input class="caixatexto" name="txtLogin" type="text" id="txtLogin" size="20">
                    </div>
                    <div id="linha3" class="textoLogin">
                        <label>Senha: </label> <input class="caixatexto" name="txtSenha" type="password" id="txtSenha" size="20">
                    </div>
                    <div id="linha4" align="center">
                        <input class="botao" name="btnEntrar" type="submit" id="btEntrar" value="Entrar">
                        <input class="botao" name="btnLimpar" type="reset" value="Limpar" ID="btnLimpar">
                    </div>
                    <div id="linha5" align="center">
                        <br><label id="txterro" class="alerta"><?php echo($erro) ?></label>
                    </div>
                </div>
            </form>
        </div>
    </BODY>
</HTML>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title>Recepcionista</title>
    </head>
    <body>
        <div id="sessao">
            <table class="tableForm">  
                <tbody id="telaMenu">
                    <tr class="tableHeader">
                        <th class="tdHeader" colspan="3">Recepcionista</th>
                    </tr>
                    <tr>
                        <td><input class="btn btnMenu btnMenuNeutro" type="button" 
                            onclick="location.href='tPesquisaPaciente.php'" value="Pesquisar Paciente" name="btnMenu"/></td>
                        <td><input class="btn btn btnMenu btnMenuPositivo" type="button" value="Registrar Paciente" name="btnMenu"/></td>
                    </tr>
                    <tr>
                        <td><input class="btn btnMenu btnMenuNeutro" type="submit" value="Pesquisar Funcionário" name="btnMenu"/></td>
                        <td><input class="btn btnMenu btnMenuPositivo" type="submit" value="Registrar Funcionario" name="btnMenu"/></td>
                    </tr>
                    <tr>
                        <td><input class="btn btnMenu btnMenuNeutro" type="submit" value="Agendamentos" name="btnMenu"/></td>
                        <td><input class="btn btnMenu btnMenuNeutro" type="submit" value="Tratamentos" name="btnMenu"/></td>
                    </tr>
                </tbody>
            </table>            
        </div>        
        <?php
        // put your code here
        ?>
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <title>Adicionar Veículo</title>
        <link rel="stylesheet" href="../style/style.css">
    </head>
<body>
        <?php
            include_once '../Controller/ControllerCar.php';
            $carController = new ControllerCar();

            if (isset($_POST['Submit'])) {
            $carController->addCar();
        }
        ?>

        <form method="post" name="form1" action="">
            <center>
            <h1>Formulário - Incluir carro</h1>
    </center>
    <table width="588" border="0" align="center">
        <tr>
            <td width="118">
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Marca:</font>
    </td>
    <td width="460">
        <input name="marca" type="text" class="formbutton" id="marca" size="52" maxlength="150">
    </td>
    </tr>


    <tr>
        <td>
            <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Modelo:</font>
    </td>
    <td>
        <font size="2">
            <input name="modelo" type="text" id="modelo" size="15" maxlength="150" class="formbutton">
    </font>
    </td>
    </tr>
        <tr>
        <td>
            <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Ano de Fabricação:</font>
    </td>
    <td>
        <font size="2">
            <input name="ano_fabricacao" type="date" id="ano" class="formbutton">
    </font>
    </td>
    </tr>
    <tr>
        <td>
            <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Cor:</font>
    </td>
    <td>
        <font size="2">
            <input name="cor" type="text" id="cor" class="formbutton">
    </font>
    </td>
    </tr>
    <tr>
        <td>
            <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Preço:</font>
    </td>
    <td>
        <font size="2">
            <input name="preco" type="text" id="preco" class="formbutton">
    </font>
    </td>
    </tr>

    <tr>
        <td></td>
        <td><input type="submit" name="Submit" value="Cadastrar">
            <button type = 'submit' formaction='../View/view-cars.php'>Consultar</button>
    </td>
    </tr>
    </table>
</form>
</body>
</html>
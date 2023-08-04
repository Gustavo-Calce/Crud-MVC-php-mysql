<!DOCTYPE html>
<head>   
    <title>Visualizar Carros</title>
</head>
<body>
<?php
    include_once '../Controller/ControllerCar.php';
    $carController = new ControllerCar();
    $cars = $carController->viewCars();
    ?>
    <h2 size = "1" style="font-family: Verdana, Arial, Helvetica, sans-serif;"> Adicionar Novo Carro</h2>
    <button size = "1" style="font-family: Verdana, Arial, Helvetica, sans-serif;" class="styled-button"
    onclick="window,location.href='add-car.php'">Adicionar Novo Carro</button>
    <br>
    <br>

    <table width='80%' border=0 align='center'>
        <tr bgcolor='#CCCCCC'>
            <td>
                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Código<strong></font>
            </td>
            <td>
                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Marca<strong></font>
            </td>
            <td>
                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modelo<strong></font>
            </td>
            <td>
                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Ano de Fabricação<strong></font>
            </td>
            <td>
                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cor<strong></font>
            </td>
            <td>
                <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Preço<strong></font>
            </td>
</tr>
<?php
foreach ($cars as $car) {
    echo "<tr>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $car['id'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $car['marca'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $car['modelo'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $car['ano_fabricacao'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $car['cor'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $car['preco'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''><a href=\"edit-car.php?id={$car['id']}\">Editar</a> | <a href=\"delete-car.php?id={$car['id']}\" onClick=\"return confirm('Tem certeza que deseja excluir?')\">Excluir</a> | <a href \"../index.php\">Adicionar</a>
    </a></a></td>";

}
?>
</table>
</body>
</html>
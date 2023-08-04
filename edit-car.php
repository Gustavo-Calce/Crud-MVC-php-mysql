<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editar Carro</title>
</head>
<body>
    <?php
    include_once '../Controller/ControllerCar.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $carController = new ControllerCar();
        $car = $carController->getCarById($id);

        if (!$car) {
            echo 'Carro não encontrado';
            exit;
        }

        $marca = $car['marca'] ?? '';
        $modelo = $car['modelo'] ?? '';
        $ano_fabricacao = $car['ano_fabricacao'] ?? '';
        $cor = $car['cor'] ?? '';
        $preco = $car['preco'] ?? '';

        if (isset($_POST['Submit'])) {
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $ano_fabricacao = $_POST['ano_fabricacao'];
            $cor = $_POST['cor'];
            $preco = $_POST['preco'];

            $carController->updateCar($id, $marca, $modelo, $ano_fabricacao, $cor, $preco);
        }
    } else {
        echo 'ID do carro não fornecido';
        exit;
    }
    ?>
    <form name="form1" method="post" action="">
        <table border="0">
            <tr>
                <td>Marca</td>
                <td><input type="text" name="marca" value="<?php echo $marca; ?>"></td>
            </tr>
            <tr>
                <td>Modelo</td>
                <td><input type="text" name="modelo" value="<?php echo $modelo; ?>"></td>
            </tr>
            <tr>
                <td>Ano de Fabricação</td>
                <td><input type="date" name="ano_fabricacao" value="<?php echo $ano_fabricacao; ?>"></td>
            </tr>
            <tr>
                <td>Cor</td>
                <td><input type="text" name="cor" value="<?php echo $cor; ?>"></td>
            </tr>
            <tr>
                <td>Preço</td>
                <td><input type="text" name="preco" value="<?php echo $preco; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="Submit" value="Atualizar"></td>
                <td><button type="submit" formaction="../View/view-cars.php">Voltar</button></td>
            </tr>
        </table>
    </form>
</body>
</html>

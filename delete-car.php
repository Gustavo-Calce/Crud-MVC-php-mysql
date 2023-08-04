<?php include_once '../Controller/ControllerCar.php';
if (isset($_GET['id'])){
    $id = $_GET['id'];

    $carController = new ControllerCar();
    $carController->deleteCar($id);
}
?>
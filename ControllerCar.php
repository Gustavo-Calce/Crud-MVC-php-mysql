<?php
include_once '../Models/Crud.php';
include_once '../Models/Validation.php';

class ControllerCar
{
    private $crud;
    private $validation;

    public function __construct()
    {
        $this->crud = new Crud();
        $this->validation = new Validation();
    }

    public function addCar()
    {
        if (isset($_POST['Submit'])) {
            $marca = $this->crud->escape_string($_POST['marca']);
            $modelo = $this->crud->escape_string($_POST['modelo']);
            $ano_fabricacao = $this->crud->escape_string($_POST['ano_fabricacao']);
            $cor = $this->crud->escape_string($_POST['cor']);
            $preco = $this->crud->escape_string($_POST['preco']);

            $msg = $this->validation->check_empty($_POST, array('marca', 'modelo', 'ano_fabricacao', 'cor', 'preco'));
            if ($msg == null) {
                // Chama a procedure para inserir o carro na tabela cars
                $query = "CALL sp_insert_car('$marca', '$modelo', '$ano_fabricacao', '$cor', '$preco')";
                $result = $this->crud->execute($query);

                if (!$result) {
                    // erro de inserção
                }

                header("Location:../view/view-cars.php");
            }
        }
    }
    
    public function viewCars()
    {
        $query = "SELECT * FROM view_carros ORDER BY id";
        $result = $this->crud->getData($query);
        return $result;
    }

    public function deleteCar($id)
    {
        $table = 'cars';
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $this->crud->delete($query);
        if ($result) {
            header("Location:../View/view-cars.php");
        }
    }

    public function updateCar($id, $marca, $modelo, $ano_fabricacao, $cor, $preco)
    {
        $id = $this->crud->escape_string($id);
        $marca = $this->crud->escape_string($marca);
        $modelo = $this->crud->escape_string($modelo);
        $ano_fabricacao = $this->crud->escape_string($ano_fabricacao);
        $cor = $this->crud->escape_string($cor);
        $preco = $this->crud->escape_string($preco);
    
        $msg = $this->validation->check_empty($_POST, array('marca', 'modelo', 'ano_fabricacao', 'cor', 'preco'));
        if ($msg == null) {
            $query = "UPDATE cars SET ano_fabricacao='$ano_fabricacao', cor='$cor', preco='$preco' WHERE id=$id";
            $result = $this->crud->execute($query);
    
            $query = "UPDATE modelos SET modelo='$modelo' WHERE id_modelo=(SELECT id_modelo FROM cars WHERE id=$id)";
            $result = $this->crud->execute($query);
    
            $query = "UPDATE marcas SET marca='$marca' WHERE id_marca=(SELECT id_marca FROM cars WHERE id=$id)";
            $result = $this->crud->execute($query);
    
            if ($result) {
                header("Location:../View/view-cars.php");
            }
        }
    }
    


    public function getCarById($id)
    {
        $id = $this->crud->escape_string($id);

        $query = "SELECT * FROM cars WHERE id=$id";
        $result = $this->crud->getData($query);

        if (!empty($result)) {
            return $result[0];
        } else {
            return null;
        }
    }
}
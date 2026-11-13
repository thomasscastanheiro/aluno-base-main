<?php
    require_once __DIR__ . '/../classes/Cargos.php';
    $objCargo = new Cargos();
   
    if (isset($_GET['id'])) {
        $cargoID = $_GET['id'];
        $cargo = $objCargo->exibirCargo($cargoID);
    } else {
        $cargo = [
            'CargoID' => '',
            'Nome' => '',
            'TetoSalarial' => ''
        ];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./actions/cargos.php" method="post">
        <input type="hidden" name="acao" value="salvar">
        CargoID <input type="text" name="CargoID" value="<?php echo $cargo['CargoID'];?>" readonly> <br>
        Nome <input type="text" name="Nome" id="" value="<?php echo $cargo['Nome'];?>"> <br>
        Teto Salarial <input type="text" name="TetoSalarial" id="" value="<?php echo $cargo['TetoSalarial'];?>"> <br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
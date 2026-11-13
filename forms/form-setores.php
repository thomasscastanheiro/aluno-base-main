<?php
    require_once __DIR__ . '/../classes/Setores.php';
    $objSetores = new Setores();
   
    if (isset($_GET['id'])) {
        $setorID = $_GET['id'];
        $setor = $objSetores->exibirSetor($setorID);
    } else {
        $setor = [
            'SetorID' => '',
            'Nome' => '',
            'Andar' => '',
            'Cor' => ''
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
    <form action="./actions/setores.php" method="post">
        <input type="hidden" name="acao" value="salvar">
        SetorID <input type="text" name="SetorID" value="<?php echo $setor['SetorID'];?>" readonly> <br>
        Nome <input type="text" name="Nome" id="" value="<?php echo $setor['Nome'];?>"> <br>
        Andar <input type="text" name="Andar" id="" value="<?php echo $setor['Andar'];?>"> <br>
        Cor <input type="text" name="Cor" id="" value="<?php echo $setor['Cor'];?>"> <br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
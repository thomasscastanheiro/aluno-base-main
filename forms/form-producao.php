<?php
    require_once __DIR__ . '/../classes/Producao.php';
    $objProducao = new Producao();
   
    if (isset($_GET['id'])) {
        $producaoID = $_GET['id'];
        $producao = $objProducao->exibirProducao($producaoID);
    } else {
        $producao = [
            'ProducaoID' => '',
            'ProdutoID' => '',
            'FuncionarioID' => '',
            'ClienteID' => '',
            'DataProducao' => '',
            'DataEntrega' => ''
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
    <form action="./actions/producao.php" method="post">
        <input type="hidden" name="acao" value="salvar">
        ProducaoID <input type="text" name="ProducaoID" value="<?php echo $producao['ProducaoID'];?>" readonly> <br>
        ProdutoID <input type="text" name="ProdutoID" id="" value="<?php echo $producao['ProdutoID'];?>" readonly> <br>
        FuncionarioID <input type="text" name="FuncionarioID" id="" value="<?php echo $producao['FuncionarioID'];?>" readonly> <br>
        ClienteID <input type="text" name="ClienteID" id="" value="<?php echo $producao['ClienteID'];?>" readonly> <br>
        Data Produção <input type="text" name="DataProducao" id="" value="<?php echo $producao['DataProducao'];?>"> <br>
        Data Entrega <input type="text" name="DataEntrega" id="" value="<?php echo $producao['DataEntrega'];?>"> <br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
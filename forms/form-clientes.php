<?php
    require_once __DIR__ . '/../classes/Clientes.php';
    $objClientes = new Clientes();
   
    if (isset($_GET['id'])) {
        $clienteID = $_GET['id'];
        $cliente = $objClientes->exibirCliente($clienteID);
    } else {
        $cliente = [
            'ClienteID' => '',
            'Nome' => '',
            'Telefone' => '',
            'Email' => '',
            'Endereco' => '',
            'CNPJ' => '',
            'Estado' => '',
            'Cidade' => '',
            'Empresa' => ''
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
    <form action="./actions/clientes.php" method="post">
        <input type="hidden" name="acao" value="salvar">
        ClienteID <input type="text" name="ClienteID" value="<?php echo $cliente['ClienteID'];?>" readonly> <br>
        Nome <input type="text" name="Nome" id="" value="<?php echo $cliente['Nome'];?>"> <br>
        Telefone <input type="text" name="Telefone" id="" value="<?php echo $cliente['Telefone'];?>"> <br>
        Email <input type="text" name="Email" id="" value="<?php echo $cliente['Email'];?>"> <br>
        Endereco <input type="text" name="Endereco" id="" value="<?php echo $cliente['Endereco'];?>"> <br>
        CNPJ <input type="text" name="CNPJ" id="" value="<?php echo $cliente['CNPJ'];?>"> <br>
        Estado <input type="text" name="Estado" id="" value="<?php echo $cliente['Estado'];?>"> <br>
        Cidade <input type="text" name="Cidade" id="" value="<?php echo $cliente['Cidade'];?>"> <br>
        Empresa <input type="text" name="Empresa" id="" value="<?php echo $cliente['Empresa'];?>"> <br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
<?php
require_once __DIR__ . '/../classes/Clientes.php';

$objClientes = new Clientes();
$resultado = $objClientes->exibirClientes();
?>

<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Endereço</th>
        <th>CNPJ</th>
        <th>Estado</th>
        <th>Cidade</th>
        <th>Empresa</th>
    </tr>
    <?php
    foreach ($resultado as $key => $value) {
    ?>
    <tr>
        <td><?php echo $value['ClienteID'];?></td>
        <td><?php echo $value['Nome'];?></td>
        <td><?php echo $value['Telefone'];?></td>
        <td><?php echo $value['Email'];?></td>
        <td><?php echo $value['Endereco'];?></td>
        <td><?php echo $value['CNPJ'];?></td>
        <td><?php echo $value['Estado'];?></td>
        <td><?php echo $value['Cidade'];?></td>
        <td><?php echo $value['Empresa'];?></td>
        <td>
            <a href="#">Visualizar</a>
            <a href="./actions/clientes.php?id=<?php echo $value['ClienteID'];?>&acao=excluir">Excluir</a>
            <a href="../forms/form-clientes.php?id=<?php echo $value['ClienteID']; ?>&acao=atualizar">Atualizar</a>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="10"><a href="../forms/form-clientes.php">Adicionar Cliente</a></td>
    </tr>
    <tr>
        <td colspan="10">Total de <?php echo count($resultado);?> Cliente(s) cadastrado(s)</td>
    </tr>
</table>
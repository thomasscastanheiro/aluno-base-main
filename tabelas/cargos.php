<?php
require_once __DIR__ . '/../classes/Cargos.php';

$objCargos = new Cargos();
$resultado = $objCargos->exibirCargos();

?>
<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Teto Salarial</th>
    </tr>
    <?php
    foreach ($resultado as $key => $value) {
    ?>
    <tr>
        <td><?php echo $value['CargoID'];?></td>
        <td><?php echo $value['Nome'];?></td>
        <td><?php echo $value['TetoSalarial'];?></td>
        <td>
            <a href="#">Visualizar</a>
            <a href="./actions/cargos.php?id=<?php echo $value['CargoID'];?>&acao=excluir">Excluir</a>
            <a href="../forms/form-cargos.php?id=<?php echo $value['CargoID']; ?>&acao=atualizar">Atualizar</a>
        </td>
    </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="4"><a href="../forms/form-cargos.php">Adicionar Cargo</a></td>
    </tr>
    <tr>
        <td colspan="4">Total de <?php echo count($resultado);?> Cargo(s) cadastrado(s)</td>
    </tr>
</table>
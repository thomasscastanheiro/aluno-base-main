<?php
require_once __DIR__ . '/../classes/Producao.php';

$objProducao = new Producao();
$resultado = $objProducao->exibirProducoes();
?>

<table border='1'>
    <tr>
        <th>ID</th>
        <th>ProdutoID</th>
        <th>FuncionarioID</th>
        <th>ClienteID</th>
        <th>Data de Produção</th>
        <th>Data de Entrega</th>
    </tr>
    <?php
    foreach ($resultado as $key => $value) {
    ?>
    <tr>
        <td><?php echo $value['ProducaoID'];?></td>
        <td><?php echo $value['ProdutoID'];?></td>
        <td><?php echo $value['FuncionarioID'];?></td>
        <td><?php echo $value['ClienteID'];?></td>
        <td><?php echo $value['DataProducao'];?></td>
        <td><?php echo $value['DataEntrega'];?></td>
        <td>
            <a href="#">Visualizar</a> 
            <a href="./actions/producao.php?id=<?php echo $value['ProducaoID'];?>&acao=excluir">Excluir</a>
            <a href="../forms/form-producao.php?id=<?php echo $value['ProducaoID']; ?>&acao=atualizar">Atualizar</a>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="7"><a href="../forms/form-producao.php">Adicionar Produção</a></td>
    </tr>
    <tr>
        <td colspan="7">Total de <?php echo count($resultado);?> Produção(ões) cadastrado(s)</td>
    </tr>
</table>
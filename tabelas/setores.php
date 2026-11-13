<?php
require_once __DIR__ . '/../classes/Setores.php';

$objSetores = new Setores();
$resultado = $objSetores->exibirSetores();
?>
<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Andar</th>
        <th>Cor</th>
        <th>Ação</th>
    </tr>   
    <?php
    foreach ($resultado as $key => $value) {
    ?>
    <tr>
        <td><?php echo $value['SetorID'];?></td>
        <td><?php echo $value['Nome'];?></td>
        <td><?php echo $value['Andar'];?></td>
        <td><?php echo $value['Cor'];?></td>
        <td>
            <a href="#">Visualizar</a>
            <a href="./actions/setores.php?id=<?php echo $value['SetorID'];?>&acao=excluir">Excluir</a>
            <a href="../forms/form-setores.php?id=<?php echo $value['SetorID']; ?>&acao=atualizar">Atualizar</a>
        </td>
    </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="5"><a href="../forms/form-setores.php">Adicionar Setor</a></td>
    </tr>
    <tr>
        <td colspan="5">Total de <?php echo count($resultado);?> Setor(es) cadastrado(s)</td>
    </tr>
</table>
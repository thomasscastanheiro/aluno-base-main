<?php
require_once __DIR__ . '/../classes/Categorias.php';

$objCategorias = new Categorias();
$resultado = $objCategorias->exibirCatergorias();
?>

<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
    </tr>
    <?php
    foreach ($resultado as $key => $value) {
    ?>
    <tr>
        <td><?php echo $value['CategoriaID'];?></td>
        <td><?php echo $value['Nome'];?></td>
        <td><?php echo $value['Descricao'];?></td>
        <td>
            <a href="#">Visualizar</a>
            <a href="./actions/categorias.php?id=<?php echo $value['CategoriaID'];?>&acao=excluir">Excluir</a>
            <a href="../forms/form-categorias.php?id=<?php echo $value['CategoriaID']; ?>&acao=atualizar">Atualizar</a>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="4"><a href="../forms/form-categorias.php">Adicionar Categoria</a></td>
    </tr>
    <tr>
        <td colspan="4">Total de <?php echo count($resultado);?> Categoria(s) encontrada(s)</td>
    </tr>
</table>
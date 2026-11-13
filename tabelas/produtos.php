<?php
require_once __DIR__ . '/../classes/Produtos.php';

$objProdutos = new Produtos();
$resultado = $objProdutos->exibirProdutos();
?>

<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>CategoriaID</th>
        <th>Referência</th>
        <th>Descrição</th>
        <th>Peso</th>
    </tr>
    <?php
    foreach ($resultado as $key => $value) {
    ?>
    <tr>
        <td><?php echo $value['ProdutoID'];?></td>
        <td><?php echo $value['Nome'];?></td>
        <td><?php echo $value['Preco'];?></td>
        <td><?php echo $value['CategoriaID'];?></td>
        <td><?php echo $value['Referencia'];?></td>
        <td><?php echo $value['Descricao'];?></td>
        <td><?php echo $value['Peso'];?></td>
        <td>
            <a href="#">Visualizar</a> 
            <a href="./actions/produtos.php?id=<?php echo $value['ProdutoID'];?>&acao=excluir">Excluir</a>
            <a href="../forms/form-produtos.php?id=<?php echo $value['ProdutoID']; ?>&acao=atualizar">Atualizar</a>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="8"><a href="../forms/form-produtos.php">Adicionar Produto</a></td>
    </tr>
    <tr>
        <td colspan="8">Total de <?php echo count($resultado);?> Produto(s) cadastrado(s)</td>
    </tr>
</table>
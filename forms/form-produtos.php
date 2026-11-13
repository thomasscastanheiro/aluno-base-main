<?php
    require_once __DIR__ . '/../classes/Produtos.php';
    $objProdutos = new Produtos();
   
    if (isset($_GET['id'])) {
        $produtoID = $_GET['id'];
        $produto = $objProdutos->exibirProduto($produtoID);
    } else {
        $produto = [
            'ProdutoID' => '',
            'Nome' => '',
            'Preco' => '',
            'CategoriaID' => '',
            'Referencia' => '',
            'Descricao' => '',
            'Peso' => ''
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
    <form action="./actions/produtos.php" method="post">
        <input type="hidden" name="acao" value="salvar">
        ProdutoID <input type="text" name="ProdutoID" value="<?php echo $produto['ProdutoID'];?>" readonly> <br>
        Nome <input type="text" name="Nome" id="" value="<?php echo $produto['Nome'];?>"> <br>
        Preço <input type="text" name="Preco" id="" value="<?php echo $produto['Preco'];?>"> <br>
        CategoriaID <input type="text" name="CategoriaID" id="" value="<?php echo $produto['CategoriaID'];?>"> <br>
        Referência <input type="text" name="Referencia" id="" value="<?php echo $produto['Referencia'];?>"> <br>
        Descrição <input type="text" name="Descricao" id="" value="<?php echo $produto['Descricao'];?>"> <br>
        Peso <input type="text" name="Peso" id="" value="<?php echo $produto['Peso'];?>"> <br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
<?php
    require_once __DIR__ . '/../classes/Categorias.php';
    $objCategorias = new Categorias();
   
    if (isset($_GET['id'])) {
        $categoriaID = $_GET['id'];
        $categoria = $objCategorias->exibirCategoria($categoriaID);
    } else {
        $categoria = [
            'CategoriaID' => '',
            'Nome' => '',
            'Descricao' => ''
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
    <form action="./actions/categorias.php" method="post">
        <input type="hidden" name="acao" value="salvar">
        CategoriaID <input type="text" name="CategoriaID" value="<?php echo $categoria['CategoriaID'];?>" readonly> <br>
        Nome <input type="text" name="Nome" id="" value="<?php echo $categoria['Nome'];?>"> <br>
        Descricao <input type="text" name="Descricao" id="" value="<?php echo $categoria['Descricao'];?>"> <br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
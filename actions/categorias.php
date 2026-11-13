<?php
include_once '../classes/Categorias.php';
$objCategoria = new Categorias();

//variavel que captura a acao que o usuario informa
$acao = $_REQUEST['acao'];

//escolhe qual acao executar conforme a escolha do usuario
switch ($acao) {
    case 'excluir':
        //captura o id via url para informar qual setor deve ser excluido
        $categoriaID = $_GET['id'];
        //executa o metodo dentro da classe com o parametro de ID
        $objCategoria->excluirCategoria($categoriaID);
        break;
    case 'salvar':
        //capturando os dados preenchidos pelo usuario no form
        $categoriaID = $_POST['CategoriaID'];

        //envia os valores para os atributos da classe
        $objCategoria->Nome = $_POST['Nome'];
        $objCategoria->Descricao = $_POST['Descricao'];
        
        //executa a classe
        $objCategoria->salvarCategoria($categoriaID);
        break;
}
//redirecionar para outra pagina
header("Location: ../index.php");
//fim do processo
exit();
?>
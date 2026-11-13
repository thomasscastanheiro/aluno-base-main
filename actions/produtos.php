<?php
include_once '../classes/Produtos.php';
$objProdutos = new Produtos();

//variavel que captura a acao que o usuario informa
$acao = $_REQUEST['acao'];

//escolhe qual acao executar conforme a escolha do usuario
switch ($acao) {
    case 'excluir':
        //captura o id via url para informar qual setor deve ser excluido
        $produtoID = $_GET['id'];
        //executa o metodo dentro da classe com o parametro de ID
        $objProdutos->excluirProduto($produtoID);
        break;
    case 'salvar':
        //capturando os dados preenchidos pelo usuario no form
        $produtoID = $_POST['ProdutoID'];

        //envia os valores para os atributos da classe
        $objProdutos->Nome = $_POST['Nome'];
        $objProdutos->Preco = $_POST['Preco'];
        $objProdutos->CategoriaID = $_POST['CategoriaID'];
        $objProdutos->Referencia = $_POST['Referencia'];
        $objProdutos->Descricao = $_POST['Descricao'];
        $objProdutos->Peso = $_POST['Peso'];
        
        //executa a classe
        $objProdutos->salvarProduto($produtoID);
        break;
}
//redirecionar para outra pagina
header("Location: ../index.php");
//fim do processo
exit();
?>
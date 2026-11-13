<?php
include_once '../classes/Producao.php';
$objProducao = new Producao();

//variavel que captura a acao que o usuario informa
$acao = $_REQUEST['acao'];

//escolhe qual acao executar conforme a escolha do usuario
switch ($acao) {
    case 'excluir':
        //captura o id via url para informar qual setor deve ser excluido
        $producaoID = $_GET['id'];
        //executa o metodo dentro da classe com o parametro de ID
        $objProducao->excluirProducao($producaoID);
        break;
    case 'salvar':
        //capturando os dados preenchidos pelo usuario no form
        $producaoID = $_POST['ProducaoID'];

        //envia os valores para os atributos da classe
        $objProducao->ProdutoID = $_POST['ProdutoID'];
        $objProducao->FuncionarioID = $_POST['FuncionarioID'];
        $objProducao->ClienteID = $_POST['ClienteID'];
        $objProducao->DataProducao = $_POST['DataProducao'];
        $objProducao->DataEntrega = $_POST['DataEntrega'];
        
        //executa a classe
        $objProducao->salvarProducao($producaoID);
        break;
}
//redirecionar para outra pagina
header("Location: ../index.php");
//fim do processo
exit();
?>
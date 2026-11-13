<?php
include_once '../classes/Setores.php';
$objSetores = new Setores();

//variavel que captura a acao que o usuario informa
$acao = $_REQUEST['acao'];

//escolhe qual acao executar conforme a escolha do usuario
switch ($acao) {
    case 'excluir':
        //captura o id via url para informar qual setor deve ser excluido
        $setorID = $_GET['id'];
        //executa o metodo dentro da classe com o parametro de ID
        $objSetores->excluirSetor($setorID);
        break;
    case 'salvar':
        //capturando os dados preenchidos pelo usuario no form
        $setorID = $_POST['SetorID'];

        //envia os valores para os atributos da classe
        $objSetores->Nome = $_POST['Nome'];
        $objSetores->Andar = $_POST['Andar'];
        $objSetores->Cor = $_POST['Cor'];
        
        //executa a classe
        $objSetores->salvarSetor($setorID);
        break;
}
//redirecionar para outra pagina
header("Location: ../index.php");
//fim do processo
exit();
?>
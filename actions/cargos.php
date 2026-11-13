<?php
include_once '../classes/Cargos.php';
$objCargo = new Cargos();

//variavel que captura a acao que o usuario informa
$acao = $_REQUEST['acao'];

//escolhe qual acao executar conforme a escolha do usuario
switch ($acao) {
    case 'excluir':
        //captura o id via url para informar qual setor deve ser excluido
        $cargoID = $_GET['id'];
        //executa o metodo dentro da classe com o parametro de ID
        $objCargo->excluirCargo($cargoID);
        break;
    case 'salvar':
        //capturando os dados preenchidos pelo usuario no form
        $cargoID = $_POST['CargoID'];

        //envia os valores para os atributos da classe
        $objCargo->Nome = $_POST['Nome'];
        $objCargo->TetoSalarial = $_POST['TetoSalarial'];
        
        //executa a classe
        $objCargo->salvarCargo($setorID);
        break;
}
//redirecionar para outra pagina
header("Location: ../index.php");
//fim do processo
exit();
?>
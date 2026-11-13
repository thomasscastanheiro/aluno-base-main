<?php
include_once '../classes/Clientes.php';
$objCliente = new Clientes();

//variavel que captura a acao que o usuario informa
$acao = $_REQUEST['acao'];

//escolhe qual acao executar conforme a escolha do usuario
switch ($acao) {
    case 'excluir':
        //captura o id via url para informar qual setor deve ser excluido
        $clienteID = $_GET['id'];
        //executa o metodo dentro da classe com o parametro de ID
        $objCliente->excluirCliente($clienteID);
        break;
    case 'salvar':
        //capturando os dados preenchidos pelo usuario no form
        $clienteID = $_POST['ClienteID'];

        //envia os valores para os atributos da classe
        $objCliente->Nome = $_POST['Nome'];
        $objCliente->Telefone = $_POST['Telefone'];
        $objCliente->Email = $_POST['Email'];
        $objCliente->Endereco = $_POST['Endereco'];
        $objCliente->CNPJ = $_POST['CNPJ'];
        $objCliente->Estado = $_POST['Estado'];
        $objCliente->Cidade = $_POST['Cidade'];
        $objCliente->Empresa = $_POST['Empresa'];
        
        //executa a classe
        $objCliente->salvarCliente($clienteID);
        break;
}
//redirecionar para outra pagina
header("Location: ../index.php");
//fim do processo
exit();
?>
<?php
include_once '../classes/Funcionarios.php';
$objFuncionario = new Funcionarios();

//variavel que captura a acao que o usuario informa
$acao = $_REQUEST['acao'];

//escolhe qual acao executar conforme a escolha do usuario
switch ($acao) {
    case 'excluir':
        //captura o id via url para informar qual setor deve ser excluido
        $funcionarioID = $_GET['id'];
        //executa o metodo dentro da classe com o parametro de ID
        $objFuncionario->excluirFuncionario($funcionarioID);
        break;
    case 'salvar':
        //capturando os dados preenchidos pelo usuario no form
        $funcionarioID = $_POST['FuncionarioID'];

        //envia os valores para os atributos da classe
        $objFuncionario->Nome = $_POST['Nome'];
        $objFuncionario->DataNascimento = $_POST['DataNascimento'];
        $objFuncionario->Email = $_POST['Email'];
        $objFuncionario->Ramal = $_POST['Ramal'];
        $objFuncionario->CargoID = $_POST['CargoID'];
        $objFuncionario->SetorID = $_POST['SetorID'];
        $objFuncionario->Salario = $_POST['Salario'];
        $objFuncionario->Sexo = $_POST['Sexo'];
        $objFuncionario->Altura = $_POST['Altura'];
        $objFuncionario->CPF = $_POST['CPF'];
        $objFuncionario->RG = $_POST['RG'];
        
        //executa a classe
        $objFuncionario->salvarFuncionario($funcionarioID);
        break;
}
//redirecionar para outra pagina
header("Location: ../index.php");
//fim do processo
exit();
?>
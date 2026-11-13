<?php
    require_once __DIR__ . '/../classes/Funcionarios.php';
    $objFuncionarios = new Funcionarios();
   
    if (isset($_GET['id'])) {
        $funcionarioID = $_GET['id'];
        $funcionario = $objFuncionarios->exibirFuncionario($funcionarioID);
    } else {
        $funcionario = [
            'FuncionarioID' => '',
            'Nome' => '',
            'DataNascimento' => '',
            'Email' => '',
            'Ramal' => '',
            'CargoID' => '',
            'SetorID' => '',
            'Salario' => '',
            'Sexo' => '',
            'Altura' => '',
            'CPF' => '',
            'RG' => ''
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
    <form action="./actions/funcionarios.php" method="post">
        <input type="hidden" name="acao" value="salvar">
        FuncionarioID <input type="text" name="FuncionarioID" value="<?php echo $funcionario['FuncionarioID'];?>" readonly> <br>
        Nome <input type="text" name="Nome" id="" value="<?php echo $funcionario['Nome'];?>"> <br>
        Data de Nascimento <input type="text" name="DataNascimento" id="" value="<?php echo $funcionario['DataNascimento'];?>"> <br>
        Email <input type="text" name="Email" id="" value="<?php echo $funcionario['Email'];?>"> <br>
        Ramal <input type="text" name="Ramal" id="" value="<?php echo $funcionario['Ramal'];?>"> <br>
        CargoID <input type="text" name="CargoID" id="" value="<?php echo $funcionario['CargoID'];?>" readonly> <br>
        SetorID <input type="text" name="SetorID" id="" value="<?php echo $funcionario['SetorID'];?>" readonly> <br>
        Salario <input type="text" name="Salario" id="" value="<?php echo $funcionario['Salario'];?>"> <br>
        Sexo <input type="text" name="Sexo" id="" value="<?php echo $funcionario['Sexo'];?>"> <br>
        Altura <input type="text" name="Altura" id="" value="<?php echo $funcionario['Altura'];?>"> <br>
        CPF <input type="text" name="CPF" id="" value="<?php echo $funcionario['CPF'];?>"> <br>
        RG <input type="text" name="RG" id="" value="<?php echo $funcionario['RG'];?>"> <br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
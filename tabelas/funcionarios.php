<?php
require_once __DIR__ . '/../classes/Funcionarios.php';

$objFuncionarios = new Funcionarios();
$resultado = $objFuncionarios->exibirFuncionarios();
?>

<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Data de Nascimento</th>
        <th>Email</th>
        <th>Ramal</th>
        <th>CargoID</th>
        <th>SetorID</th>
        <th>Salário</th>
        <th>Sexo</th>
        <th>Altura</th>
        <th>CPF</th>
        <th>RG</th>
    </tr>
    <?php
    foreach ($resultado as $key => $value) {
    ?>
    <tr>
        <td><?php echo $value['FuncionarioID'];?></td>
        <td><?php echo $value['Nome'];?></td>
        <td><?php echo $value['DataNascimento'];?></td>
        <td><?php echo $value['Email'];?></td>
        <td><?php echo $value['Ramal'];?></td>
        <td><?php echo $value['CargoID'];?></td>
        <td><?php echo $value['SetorID'];?></td>
        <td><?php echo $value['Salario'];?></td>
        <td><?php echo $value['Sexo'];?></td>
        <td><?php echo $value['Altura'];?></td>
        <td><?php echo $value['CPF'];?></td>
        <td><?php echo $value['RG'];?></td>
        <td>
            <a href="#">Visualizar</a>
            <a href="./actions/funcionarios.php?id=<?php echo $value['FuncionarioID'];?>&acao=excluir">Excluir</a>
            <a href="../forms/form-funcionarios.php?id=<?php echo $value['FuncionarioID']; ?>&acao=atualizar">Atualizar</a>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="14"><a href="../forms/form-funcionarios.php">Adicionar Funcionário</a></td>
    </tr>
    <tr>
        <td colspan="14">Total de <?php echo count($resultado);?> Funcionário(s) cadastrado(s)</td>
    </tr>
</table>
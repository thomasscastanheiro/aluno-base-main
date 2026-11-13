<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/Setores.php';
require_once __DIR__ . '/../classes/Cargos.php';

class Funcionarios{
    public $FuncionarioID;
    public $Nome;
    public $DataNascimento;
    public $Email;
    public $Ramal;
    public $CargoID;
    public $SetorID;
    public $Salario;
    public $Sexo;
    public $Altura;
    public $CPF;
    public $RG;
    public $ConexaoDB;

    function __construct(){
        $this->ConexaoDB = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    }

    public function exibirFuncionarios(){
        $sql = 'SELECT * FROM funcionarios';
        $resultado = $this->ConexaoDB->query($sql);

        if ($resultado->num_rows > 0) {
            $registros = array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($registros,$row);
            }
            return $registros;
        } else {
            return 'Sem registros';
        }
    }

    public function exibirFuncionario($funcionarioID){
        if ($funcionarioID != '' && is_numeric($funcionarioID)) {
            $sql = 'SELECT * FROM funcionarios WHERE FuncionarioID ='.$funcionarioID;
            $resultado = $this->ConexaoDB->query($sql);

            if ($resultado->num_rows > 0) {
                $dados = $resultado->fetch_assoc();
                
                $objCargo = new Cargos();
                $objSetor = new Setores();
                
                $funcionario = $dados;

                $funcionario['Cargo'] = $objCargo->exibirCargo($dados['CargoID']);
                $funcionario['Setor'] = $objSetor->exibirSetor($dados['SetorID']);
                
                return $funcionario;
            } else {
                return 'Registro não localizado';
            }
        } else {
            return 'FuncionarioID inválido';
        }
    }

    public function excluirFuncionario($funcionarioID){
        if ($funcionarioID != '' && is_numeric($funcionarioID)) {
            $sql = 'DELETE FROM funcionarios WHERE FuncionarioID ='.$funcionarioID;
            $resultado = $this->ConexaoDB->query($sql);

            if ($this->ConexaoDB->query($sql) === TRUE) {
                return 'Funcionário excluído com sucesso!';
            } else {
                return 'Erro ao excluir FuncionarioID ='.$funcionarioID;
            }
        } else {
            return 'FuncionárioID inválido';
        }
    }

    public function salvarFuncionario($funcionarioID = ''){
        if (is_numeric($funcionarioID)) {
            $sql = 'UPDATE funcionarios
                    SET Nome = "'.$this->Nome.'",
                        DataNascimento = '.$this->DataNascimento.',
                        Email = "'.$this->Email.'",
                        Ramal = "'.$this->Ramal.'",
                        Salario = '.$this->Salario.',
                        Sexo = "'.$this->Sexo.'",
                        Altura = '.$this->Altura.',
                        CPF = '.$this->CPF.',
                        RG = '.$this->RG.'
                    WHERE FuncionarioID = '.$this->FuncionarioID;

        } else {
            $sql = 'INSERT INTO funcionarios (Nome,DataNascimento,Email,Ramal,Salario,Sexo,Altura,CPF,RG)
                    VALUES("'.$this->Nome.'",'.$this->DataNascimento.',"'.$this->Email.'","'.$this->Ramal.'",'.$this->Salario.',"'.$this->Sexo.'",'.$this->Altura.','.$this->CPF.','.$this->RG.')';
        }
        if ($this->ConexaoDB->query($sql) === TRUE) {
            return 'Registro de funcionários salvo com sucesso!';
        } else {
            return 'Erro ao salvar registro de funcionários';
        }
        exit($sql);
    }

    function __destruct(){
        $this->ConexaoDB->close();
        $this->ConexaoDB = null;
    }
}
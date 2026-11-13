<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/Produtos.php';
require_once __DIR__ . '/../classes/Funcionarios.php';
require_once __DIR__ . '/../classes/Clientes.php';

class Producao{
    public $ProducaoID;
    public $ProdutoID;
    public $FuncionarioID;
    public $ClienteID;
    public $DataProducao;
    public $DataEntrega;
    public $ConexaoDB;

    function __construct(){
        $this->ConexaoDB = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    }

    public function exibirProducoes(){
        $sql = 'SELECT * FROM producao';
        $resultado = $this->ConexaoDB->query($sql);
        if ($resultado->num_rows > 0) {
            $registros = array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($registros,$row);
            }
            return $registros;
        } else {
            return 'Sem registros de produção';
        }
    }

    public function exibirProducao($producaoID){
        if ($producaoID != '' && is_numeric($producaoID)) {
            $sql = 'SELECT * FROM producao WHERE ProducaoID ='.$producaoID;
            $resultado = $this->ConexaoDB->query($sql);

            if ($resultado->num_rows > 0) {
                $dados = $resultado->fetch_assoc();

                $objProdutos = new Produtos();
                $objFuncionarios = new Funcionarios();
                $objClientes = new Clientes();

                $producao = $dados;

                $producao['Produto'] = $objProdutos->exibirProduto($dados['ProdutoID']);
                $producao['Funcionario'] = $objFuncionarios->exibirFuncionario($dados['FuncionarioID']);
                $producao['Cliente'] = $objClientes->exibirCliente($dados['ClienteID']);
                
                return $producao;
            } else {
                return 'Registro de produção não localizado';
            }
        } else {
            return 'ProducaoID inválido';
        }
    }

    public function excluirProducao($producaoID){
        if ($producaoID != '' && is_numeric($producaoID)) {
            $sql = 'DELETE FROM producao WHERE ProducaoID ='.$producaoID;
            $resultado = $this->ConexaoDB->query($sql);

            if ($this->ConexaoDB->query($sql) === TRUE) {
                return 'Produção excluída com sucesso!';
            } else {
                return 'Erro ao excluir a ProducaoID ='.$producaoID;
            }
        } else {
            return 'ProducaoID inválido';
        }
    }

    public function salvarProducao($producaoID = ''){
        if(is_numeric($producaoID)){
            $sql = 'UPDATE producao
                    SET DataProducao = '.$this->DataProducao.',
                        DataEntrega = '.$this->DataEntrega.'
                    WHERE ProducaoID = '.$producaoID;
        } else {
            $sql = 'INSERT INTO producao (DataProducao,DataEntrega)
                    VALUES('.$this->DataProducao.','.$this->DataEntrega.')';
        }
        if ($this->ConexaoDB->query($sql) === TRUE) {
            return 'Registro de produção salvo com sucesso!';
        } else {
            return 'Erro ao salvar o registro de produção';
        }
        exit($sql);
    }

    function __destruct(){
        $this->ConexaoDB->close();
        $this->ConexaoDB = null;
    }
}
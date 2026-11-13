<?php
require_once __DIR__ . '/../includes/config.php';

class Clientes{
    public $ClienteID;
    public $Nome;
    public $Telefone;
    public $Email;
    public $Endereco;
    public $CNPJ;
    public $Estado;
    public $Cidade;
    public $Empresa;
    public $ConexaoDB;

    function __construct(){
        $this->ConexaoDB = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    }

    public function exibirClientes(){
        $sql = 'SELECT * FROM clientes';
        $resultado = $this->ConexaoDB->query($sql);

        if($resultado->num_rows > 0){
            $registros = array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($registros,$row);
            }
            return $registros;
        } else {
            return 'Sem registros';
        }
    }

    public function exibirCliente($clienteID){
        if ($clienteID != '' && is_numeric($clienteID)) {
            $sql = 'SELECT * FROM clientes WHERE ClienteID ='.$clienteID;
            $resultado = $this->ConexaoDB->query($sql);
            if($resultado->num_rows > 0){
                $dados = $resultado->fetch_assoc();
                return $dados;
            } else {
                return 'Registro não localizado';
            }
        } else {
            return 'ClienteID inválido';
        }
    }

    public function excluirCliente($clienteID){
        if ($clienteID != '' && is_numeric($clienteID)) {
            $sql = 'DELETE FROM clientes WHERE ClienteID ='.$clienteID;
            $resultado = $this->ConexaoDB->query($sql);

            if ($this->ConexaoDB->query($sql) === TRUE) {
                return 'Cargo excluído com sucesso!';
            } else {
                return 'Erro ao excluir ClienteID ='.$clienteID;
            }
        } else {
            return 'ClienteID inválido';
        }
    }

    public function salvarCliente($clienteID = ''){
        if (is_numeric($clienteID)) {
            $sql = 'UPDATE clientes
                    SET Nome = "'.$this->Nome.'",
                        Telefone = '.$this->Telefone.',
                        Email = "'.$this->Email.'",
                        Endereco = "'.$this->Endereco.'",
                        CNPJ = '.$this->CNPJ.',
                        Estado = "'.$this->Estado.'",
                        Cidade = "'.$this->Cidade.'",
                        Empresa = "'.$this->Empresa.'"
                    WHERE ClienteID = '.$clienteID;
        } else {
            $sql = 'INSERT INTO clientes (Nome,Telefone,Email,Endereco,CNPJ,Estado,Cidade,Empresa
            VALUES("'.$this->Nome.'",'.$this->Telefone.',"'.$this->Email.'","'.$this->Endereco.'",'.$this->CNPJ.',"'.$this->Estado.'","'.$this->Cidade.'","'.$this->Empresa.'")';
        }
        if ($this->ConexaoDB->query($sql) === TRUE) {
            return 'Registro de cliente salvo com sucesso!';
        } else {
            return 'Erro ao salvar o registro de cliente';
        }
        exit($sql);
    }

    function __destruct(){
        $this->ConexaoDB->close();
        $this->ConexaoDB = null;
    }

}
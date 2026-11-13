<?php
// incluit os dados de configuraçao do banco
// ../ = sai do um diretorio/pasta  ./ mesma pasta
//include_once './includes/config.php';
require_once __DIR__ . '/../includes/config.php';

class Cargos{

    // os atributos - no minimo os nomes dos campos da tabela
    public $CargoID;
    public $Nome;
    public $TetoSalarial;
    public $ConexaoDB; // atributo do banco de dados/conexao

    //construtor - 
    function __construct(){
        // atribuindo ao atributo a conexao com o banco de dados
        $this->ConexaoDB = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    }

 
    // metodos da entidade/classe
    public function exibirCargos(){
        // monta a SQL que ira consultar no banco
        $sql = 'SELECT * FROM cargos';
        // executa no banco a query SQL e coloca o resultado no variavel
        $resultado = $this->ConexaoDB->query($sql);

        if($resultado->num_rows > 0){
            //cria o array
            $registros = array();
            //laco de repeticao que retorna os dados
            while($row = $resultado->fetch_assoc()){
                array_push($registros,$row);
            }
            return $registros;
        }else{
            return 'Sem registros';
        }
    }

    public function exibirCargo($cargoID){
        // verificacao da existencia do cargo informado
        if ($cargoID != '' && is_numeric($cargoID)) {
            // faz a consulta no banco
            // monta o sql de consulta
            $sql = 'SELECT * FROM cargos WHERE CargoID ='.$cargoID;
            $resultado = $this->ConexaoDB->query($sql);

            // verifica se houve retorno de registros
            if ($resultado->num_rows > 0) {
                $dados = $resultado->fetch_assoc();
                return $dados;
            } else {
                return 'Registro não localizado';
            }
        } else {
            return 'CargoID inválido';
        }
    }

    public function excluirCargo($cargoID){
        if($cargoID != '' && is_numeric($cargoID)){
            $sql = 'DELETE FROM cargos WHERE CargoID = '.$cargoID;
            $resultado = $this->ConexaoDB->query($sql);

            if ($this->ConexaoDB->query($sql) === TRUE) {
                return 'Cargo excluído com sucesso!';
            } else {
                return 'Erro ao excluir o CargoID ='.$cargoID;
            }
        } else{
            return 'CargoID inválido';
        }
    }
                                // condiçao se cargoID se nao for enviado fica vazio
    public function salvarCargo($cargoID = ''){
        if (is_numeric($cargoID)) {
            //uptade na tabela
            $sql = 'UPDATE cargos 
                    SET Nome = "'.$this->Nome.'",
                        TetoSalarial = '.$this->TetoSalarial.'
                    WHERE CargoID = '.$cargoID;
        } else {
            //include na tabela
            $sql = 'INSERT INTO cargos (Nome,TetoSalarial) 
                    VALUES("'.$this->Nome.'",'.$this->TetoSalarial.')';
        }
        if ($this->ConexaoDB->query($sql) === TRUE) {
            return 'Registro salvo com sucesso!';
        }else{
            return 'Erro ao salvar o registro!';
        }
        exit($sql);
    }
    
    // destrutor da classe
    function __destruct(){
        // desconectar do banco de dados
        $this->ConexaoDB->close();
        // anular a conexao
        $this->ConexaoDB = null;    
    }
    
}
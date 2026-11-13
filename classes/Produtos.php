<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/Categorias.php';

class Produtos{
    public $ProdutoID;
    public $Nome;
    public $Preco;
    public $CategoriaID;
    public $Referencia;
    public $Descricao;
    public $Peso;
    public $ConexaoDB;

    function __construct(){
        $this->ConexaoDB = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    }

    public function exibirProdutos(){
        $sql = 'SELECT * FROM produtos';
        $resultado = $this->ConexaoDB->query($sql);

        if ($resultado->num_rows > 0) {
            $registros = array();
            while ($row = $resultado->fetch_assoc()) {
                array_push($registros,$row);
            }
            return $registros;
        } else {
            return 'Sem registros de produto';
        }
    }

    public function exibirProduto($produtoID){
        if ($produtoID != '' && is_numeric($produtoID)) {
            $sql = 'SELECT * FROM produtos WHERE ProdutoID ='.$produtoID;
            $resultado = $this->ConexaoDB->query($sql);

            if ($resultado->num_rows > 0) {
                $dados = $resultado->fetch_assoc();

                $objCategoria = new Categorias();

                $produto = $dados;

                $produto['Categoria'] = $objCategoria->exibirCategoria($dados['CategoriaID']);

                return $produto;
            } else {
                return 'Registro de produto não localizado';
            }
        } else {
            return 'ProdutoID inválido';
        }
    }

    public function excluirProduto($produtoID){
        if ($produtoID != '' && is_numeric($produtoID)) {
            $sql = 'DELETE FROM produtos WHERE ProdutoID ='.$produtoID;
            $resultado = $this->ConexaoDB->query($sql);

            if ($this->ConexaoDB->query($sql) === TRUE) {
                return 'Produto excluído com sucesso!';
            } else {
                return 'Erro ao excluir o ProdutoID ='.$produtoID;
            }
        } else {
            return 'ProdutoID inválido';
        }
    }

    public function salvarProduto($produtoID = ''){
        if (is_numeric($produtoID)) {
            $sql = 'UPDATE produtos
                    SET Nome = "'.$this->Nome.'",
                        Preco = '.$this->Preco.',
                        Referencia = '.$this->Referencia.',
                        Descricao = "'.$this->Descricao.'",
                        Peso = '.$this->Peso.'
                    WHERE ProdutoID ='.$produtoID;
        } else {
            $sql = 'INSERT INTO produtos (Nome,Preco,Referencia,Descricao,Peso)
                    VALUES("'.$this->Nome.'",'.$this->Preco.','.$this->Referencia.',"'.$this->Descricao.'",'.$this->Peso.')';
        }
        if ($this->ConexaoDB->query($sql) === TRUE) {
            return 'Registro de produto salvo com sucesso!';
        } else {
            return 'Erro ao salvar o registro do produto';
        }
        exit($sql);
    }

    function __destruct(){
        $this->ConexaoDB->close();
        $this->ConexaoDB = null;
    }
}
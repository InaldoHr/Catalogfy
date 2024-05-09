<?php
require_once('Banco.class.php');
 
class Carrinho{
    public $id;
    public $id_produto;
   
   
    public function AdicionarCarrinho(){
        $sql = "INSERT INTO carrinho (id_produto) VALUES (?)";
        $conexao = Banco::conectar();
        $comando = $conexao->prepare($sql);
        $comando->execute([$this->id_produto]);
        $linhas = $comando->rowCount();
        Banco::desconectar();
        return $linhas;
    }
    public function Listar(){
        $sql = "SELECT * FROM carrinhoitems";
        $conexao = Banco::conectar();
        $comando = $conexao->prepare($sql);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $resultado;
    }
}
 
?>
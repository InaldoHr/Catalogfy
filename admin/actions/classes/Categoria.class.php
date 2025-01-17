<?php
require_once('Banco.class.php');
 
class Categoria{
    public $id;
    public $nome;
   
   
    public function Cadastrar(){
        $sql = "INSERT INTO categorias (nome) VALUES (?)";
        $conexao = Banco::conectar();
        $comando = $conexao->prepare($sql);
        // Obter o hash sha256 da senha:
        $comando->execute([$this->nome]);
        $linhas = $comando->rowCount();
        Banco::desconectar();
        return $linhas;
    }
    public function Listar(){
        $sql = "SELECT * FROM categorias";
        $conexao = Banco::conectar();
        $comando = $conexao->prepare($sql);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $resultado;
    }
}
 
?>
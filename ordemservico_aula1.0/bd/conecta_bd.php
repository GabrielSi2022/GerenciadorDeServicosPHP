<?php 

function conecta_db(){

    $servidor = "localhost";
    $usuario_db = "root";
    $senha_db = "";
    $banco = "ordemservico";

    //Abre uma conexao
    $conexao = mysqli_connect($servidor,$usuario_db,$senha_db,$banco);
    
    //Teste de conexao
    if (mysqli_connect_error($conexao)) {
        echo "Erro ao conectar o banco de dados!";
        die();
    }
    return $conexao;
}

?>

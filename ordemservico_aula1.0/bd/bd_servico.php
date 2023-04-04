<?php 

require_once("conecta_bd.php");

function listaServicos(){
    $conexao = conecta_db();
    $usuarios = array();
    $query = "SELECT * 
              FROM  servico
              ORDER by nome";
  
    $resultado = mysqli_query($conexao,$query);
    while($dados = mysqli_fetch_array($resultado)) {
      array_push($usuarios,$dados);
    }
  
    return $usuarios;
}

function cadastraServico($nome,$valor,$data){
  $conexao = conecta_db();
  $query = "INSERT INTO servico(nome,valor,data) 
            VALUES ('$nome','$valor','$data')";

  $resultado = mysqli_query($conexao,$query);
  $dados = mysqli_affected_rows($conexao);

  return $dados;
}
?>
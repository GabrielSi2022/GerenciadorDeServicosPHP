<?php 

require_once("conecta_bd.php");

function checaCliente($email,$senha){
    $conexao = conecta_db();
    $senhaMD5 = md5($senha);
    $query = "SELECT * 
              FROM 	cliente
              WHERE email='$email' and 
                senha='$senhaMD5'";

    $resultado = mysqli_query($conexao,$query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function listaClientes(){
  $conexao = conecta_db();
  $usuarios = array();
  $query = "SELECT * 
            FROM cliente 
            ORDER by nome";

  $resultado = mysqli_query($conexao,$query);
  while($dados = mysqli_fetch_array($resultado)) {
    array_push($usuarios,$dados);
  }

  return $usuarios;
}

function buscaCliente($email){
  $conexao = conecta_db();
  $query = "SELECT * 
            FROM cliente 
            WHERE email='$email'";

  $resultado = mysqli_query($conexao,$query);
  $dados = mysqli_num_rows($resultado);

  return $dados;
}

function cadastraCliente($nome,$email,$senha,$endereco,$numero,$bairro,$cidade,$telefone,$status,$perfil,$data){
  $conexao = conecta_db();
  $query = "INSERT INTO cliente(nome,email,senha,endereco,numero,bairro,cidade,telefone,status,perfil,data) 
            VALUES ('$nome','$email','$senha','$endereco','$numero','$bairro','$cidade','$telefone','$status','$perfil','$data')";

  $resultado = mysqli_query($conexao,$query);
  $dados = mysqli_affected_rows($conexao);

  return $dados;
}
?>
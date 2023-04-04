<?php 

require_once("conecta_bd.php");

function checaTerceirizado($email,$senha){
    $conexao = conecta_db();
    $senhaMD5 = md5($senha);
    $query = "SELECT * 
              FROM terceirizado 
              WHERE email='$email' and 
                senha='$senhaMD5'";

    $resultado = mysqli_query($conexao,$query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function listaTerceirizados(){
  $conexao = conecta_db();
  $usuarios = array();
  $query = "SELECT * 
            FROM  terceirizado
            ORDER by nome";

  $resultado = mysqli_query($conexao,$query);
  while($dados = mysqli_fetch_array($resultado)) {
    array_push($usuarios,$dados);
  }

  return $usuarios;
}

function buscaTerceirizado($email){
  $conexao = conecta_db();
  $query = "SELECT * 
            FROM terceirizado
            WHERE email='$email'";

  $resultado = mysqli_query($conexao,$query);
  $dados = mysqli_num_rows($resultado);

  return $dados;
}

function cadastraTerceirizado($nome,$email,$telefone,$senha,$status,$perfil,$data){
  $conexao = conecta_db();
  $query = "INSERT INTO terceirizado(nome,email,telefone,senha,status,perfil,data) 
            VALUES ('$nome','$email','$telefone','$senha','$status','$perfil','$data')";

  $resultado = mysqli_query($conexao,$query);
  $dados = mysqli_affected_rows($conexao);

  return $dados;
}
?>
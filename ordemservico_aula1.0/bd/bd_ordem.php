<?php 

require_once("conecta_bd.php");

function consultaStatusUsuario($status){
    $conexao = conecta_db();
    $query = "SELECT count(*) AS total
                FROM ordem
            WHERE status = '$status'";
    $resultado = mysqli_query($conexao,$query);
    $total  = mysqli_fetch_assoc($resultado);
    return $total;
}

function consultaStatusCliente( $cod_usuario,$status){
    $conexao = conecta_db();
    $query = "SELECT count(*) AS total
                FROM ordem
            WHERE cod_cliente='$cod_usuario' and status = '$status'";
    $resultado = mysqli_query($conexao,$query);
    $total  = mysqli_fetch_assoc($resultado);
    return $total;
}

function consultaStatusTerceirizado( $cod_usuario,$status){
    $conexao = conecta_db();
    $query = "SELECT count(*) AS total
                FROM ordem
            WHERE cod_cliente='$cod_usuario' and status = '$status'";
    $resultado = mysqli_query($conexao,$query);
    $total  = mysqli_fetch_assoc($resultado);
    return $total;
}

function listaOrdem(){
    $conexao = conecta_db();
    $ordem = array();
    $query = "SELECT
              o.cod AS cod,
              c.nome AS nome_cliente,
              t.nome AS nome_terceirizada,
              s.nome AS nome_servico,
              o.data_servico AS data_servico,
              o.status AS status
              FROM  ordem o,servico s, cliente c, terceirizado t
              where o.cod_cliente = c.cod AND
                    o.cod_servico = s.cod AND
                    o.cod_terceirizado = t.cod
              ORDER by o.status ASC";
  
    $resultado = mysqli_query($conexao,$query);
    while($dados = mysqli_fetch_array($resultado)) {
      array_push($ordem,$dados);
    }
  
    return $ordem;
}

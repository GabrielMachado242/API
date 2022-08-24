<?php

//Cabecalhos obrigatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET,PUT,POST,DELETE");


include_once 'conexao.php';

$response_json = file_get_contents("php://input");
$dados = json_decode($response_json, true);

if($dados){

$query_fornecedor = "INSERT INTO fornecedor (cnpj, nome, sobrenome, senha, telefone, email) VALUES (:cnpj, :nome, :sobrenome, :senha, :telefone, :email)";
$cad_fornecedor = $pdo->prepare($query_fornecedor);

$cad_fornecedor->bindParam(':cnpj', $dados['fornecedor']['cnpj']);
$cad_fornecedor->bindParam(':nome', $dados['fornecedor']['Nome']);
$cad_fornecedor->bindParam(':telefone', $dados['fornecedor']['telefone']);
$cad_fornecedor->bindParam(':email', $dados['fornecedor']['email']);
//$cad_fornecedor->bindParam(':nasc', $dados['fornecedor']['Data']);
$cad_fornecedor->bindParam(':sobrenome', $dados['fornecedor']['sobrenome']);
$cad_fornecedor->bindParam(':senha', $dados['fornecedor']['senha']);

$cad_fornecedor->execute();

if($cad_fornecedor->rowCount()){

    
    $response = [
        "erro" => false,
        "mensagem" => "Fornecedor cadastrado com sucesso!!!"
    ];

}else{

    $response = [
        "erro" => true,
        "mensagem" => "Fornecedor nao cadastrado com sucesso!!!"
    ];

}

}else{
    $response = [
        "erro" => true,
        "mensagem" => "Fornecedor nao cadastrado com sucesso!!!"
    ];
}

http_response_code(200);
echo json_encode($response);

?>
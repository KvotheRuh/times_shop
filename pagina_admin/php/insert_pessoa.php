<?php
// Cabeçalhos para evitar o CORS
header("Access-Control-Allow-Origin: http://127.0.0.1:5501");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Dados do servidor no MySQL
$host = "localhost";
$port = "3307"; 
$usuario = "root";
$senha = "PUC@1234";
$banco = "loja";

// Conexão com o banco de dados
$conexao = new mysqli($host, $usuario, $senha, $banco, $port);

// Verifica se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Falha ao conectar ao banco de dados: " . $conexao->connect_error);
}


// Obtenção dos valores por meio do POST 
$nome = $_POST['nome_funcionario'];
$email = $_POST['email_funcionario'];
$senha = $_POST['senha_funcionario'];

// Cadastra as informações do cliente
$sql = "INSERT INTO loja.administradores (nome, email,senha, ) VALUES ('$nome','$email', '$senha')";
// Confirmação da inserção dos dados no banco de dados
if ($conexao->query($sql) === TRUE) {
    $alerta = array("sucesso" => true, "mensagem" => "Cadastro efetuado com sucesso!");
    echo json_encode($alerta);
} 
else {
    $alerta = array("sucesso" => false, "mensagem" => "Erro efetuar o cadastro: " .$conexao -> error);
    echo json_encode($alerta);
}

// Encerra a conexão com o banco de dados
$conexao->close();
?>
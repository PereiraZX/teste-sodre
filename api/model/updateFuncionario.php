<?php

include_once '../conexao/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $id_cargo = $_POST['id_cargo']; 
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $nome_funcionario = $_POST['nome_funcionario'];
    
    // Atualizar o cargo do funcionário
    $sql = "UPDATE funcionario SET id_cargo = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_cargo, $id]);

    // Atualizar o nome e endereço do funcionário
    $sql = "UPDATE funcionario SET nome_funcionario = ?, rua = ?, numero = ?, cidade = ?, estado = ?  WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome_funcionario, $rua, $numero, $cidade, $estado, $id]);


    header("Location: http://localhost/teste-sodre/");
    exit();
}
?>

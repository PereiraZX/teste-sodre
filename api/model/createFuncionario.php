<?php

include_once '../conexao/conn.php';

//CREATE

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_funcionario = $_POST['nome_funcionario'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $id_cargo = $_POST['id_cargo']; 
    $salario = $_POST['salario']; 


    // Inserir o funcionário com o cargo selecionado
    $sql_funcionario = "INSERT INTO funcionario (nome_funcionario, rua, numero, cidade, estado, id_cargo) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_funcionario = $pdo->prepare($sql_funcionario);
    $stmt_funcionario->execute([$nome_funcionario, $rua, $numero, $cidade, $estado, $id_cargo]);

    header("Location: http://localhost/teste-sodre/");
    exit();
}
?>

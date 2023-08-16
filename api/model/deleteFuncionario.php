<?php

include_once '../conexao/conn.php'; 
// DELETE

// GET para passar o id pela URL
    $id = $_GET['id'];

    // Deletar o funcionário
    $sql = "DELETE FROM funcionario WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header("Location: http://localhost/teste-sodre/");
    exit();


?>
<?php

include_once 'api/conexao/conn.php'; 

$sql = "SELECT c.nome_cargo AS Cargo, COUNT(f.id) AS 'Qtde Funcionários', SUM(c.salario) AS 'Total de Salários'
FROM cargo AS c
LEFT JOIN funcionario AS f ON c.id = f.id_cargo
GROUP BY c.id;";
$resultado = $pdo->query($sql);
$cargos = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Cargos</title>
    <link rel="stylesheet" href="./assets/css/recordsFuncionario.css">
</head>

<body>
    <button id="botaoVoltar" class="button-submit-voltar">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
        <a href="index.php">VOLTAR</a>
    </button>

    <!-- Tabela para exibir os registros -->
    <table>
        <thead>
            <tr>
                <th>Cargo</th>
                <th>Qtde Funcionários</th>
                <th>Total de Salários</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cargos as $cargo) {
                echo '<tr>';
                echo '<td>' . $cargo['Cargo'] . '</td>';
                echo '<td>' . $cargo['Qtde Funcionários'] . '</td>';
                echo '<td>' . "R$ " . number_format($cargo['Total de Salários'], 2, ',', '.') . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

    <!-- Adicionando evento para o botão voltar -->
    <script src="./assets/js/voltar.js" defer></script>
</body>
</html>

<?php

include_once 'api/conexao/conn.php'; 

// Verifique se o ID do funcionário a ser editado foi fornecido
if (isset($_GET['id'])) {
    $idFuncionario = $_GET['id'];
    $sql = "SELECT f.id, f.nome_funcionario, f.rua, f.numero, f.cidade, f.estado, f.id_cargo, c.salario
            FROM funcionario AS f
            JOIN cargo AS c ON f.id_cargo = c.id
            WHERE f.id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idFuncionario]);
    $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$funcionario) {
        echo "Funcionário não encontrado";
        exit;
    }

    $sql_cargos = "SELECT id, nome_cargo, salario FROM cargo";
    $stmt_cargos = $pdo->query($sql_cargos);
} else {
    echo "ID inválido";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>

    <!-- link-css -->
    <link rel="stylesheet" href="./assets/css/editarFuncionario.css">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <section class="edit-container">
        <form id="edit-funcionario" method="post" action="./api/model/updateFuncionario.php">
            <div class="container">
                <h1 class="title">
                    Editar Funcionário
                </h1>

                <div class="input-group">

                    <div class="input-block">
                        <div class="input-container">
                            <input type="text" id="nome_funcionario" name="nome_funcionario" value="<?php echo htmlentities($funcionario['nome_funcionario']); ?>" required>
                        </div>
                    </div>

                    <div class="input-block">
                        <div class="input-container">
                            <input type="text" id="rua" name="rua" value="<?php echo htmlentities($funcionario['rua']); ?>" required>
                        </div>
                    </div>

                    <div class="input-block">
                        <div class="input-container">
                            <input type="number" id="numero" name="numero" value="<?php echo htmlentities($funcionario['numero']); ?>" required>
                        </div>
                    </div>

                    <div class="input-block">
                        <div class="input-container">
                            <input type="text" id="cidade" name="cidade" value="<?php echo htmlentities($funcionario['cidade']); ?>" required>
                        </div>
                    </div>

                    <div class="input-block">
                        <div class="input-container">
                            <input type="text" id="estado" name="estado" value="<?php echo htmlentities($funcionario['estado']); ?>" required>
                        </div>
                    </div>

                    <div class="input-block">
                        <div class="input-container select-container">
                            <select name="id_cargo" id="cargo" required>
                                <option value="" disabled>Selecione um cargo</option>
                                    <?php
                                        while ($cargo = $stmt_cargos->fetch(PDO::FETCH_ASSOC)) {
                                            $selected = ($cargo['id'] == $funcionario['id_cargo']) ? 'selected' : '';
                                            echo "<option value='{$cargo['id']}' data-salario='{$cargo['salario']}' {$selected}>{$cargo['nome_cargo']}</option>";
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>

                    <div class="input-block">
                        <div class="input-container">
                            <input type="number" step="0.01" id="salario" name="salario" value="<?php echo htmlentities($funcionario['salario']); ?>"  readonly required>
                        </div>
                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo $funcionario['id']; ?>">
                    
                        <button type="submit" class="button-submit-cadastro">
                            Atualizar
                        </button>

                        <button type="submit" class="button-submit-voltar">
                            <a href="index.php">Voltar</a>
                        </button>
                </div>
            </div>
        </form>
    </section>

    <!-- Adicionando evento para o edit do campo do salario -->
    <script src="./assets/js/editSalario.js" defer></script>

</body>
</html>

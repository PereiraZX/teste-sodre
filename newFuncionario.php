<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Dados</title>

    <!-- link-css -->
    <link rel="stylesheet" href="./assets/css/formStyles.css">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section class="cadastro-container">
        <form id="cadastro-funcionario" method="post" action="api/model/createFuncionario.php">

        <div class="container">
                <h1 class="title">
                    Cadastro Funcionario
                </h1>

            <div class="input-group">

                <div class="input-block">
                    <div class="input-container">
                        <input type="text" name="nome_funcionario" id="nome_funcionario" placeholder="Digite o nome do funcionário" required autocomplete="off">
                    </div>
                </div>

                <div class="input-block">
                    <div class="input-container">
                        <input type="text" name="rua" id="rua" placeholder="Digite a rua" required autocomplete="off">
                    </div>
                </div>

                <div class="input-block">
                    <div class="input-container">
                        <input type="number" name="numero" id="numero" placeholder="Digite o numero" required autocomplete="off">
                    </div>
                </div>

                <div class="input-block">
                    <div class="input-container">
                        <input type="text" name="cidade" id="cidade" placeholder="Digite a cidade" required autocomplete="off">
                    </div>
                </div>

                <div class="input-block">
                    <div class="input-container">
                        <input type="text" name="estado" id="estado" placeholder="Digite o estado" required autocomplete="off">
                    </div>
                </div>

                <div class="input-block">
    <div class="input-container select-container">
        <select class="custom-select" name="id_cargo" id="cargo" required>
            <option value="" disabled selected>Selecione um cargo</option>
            <?php
            include_once 'api/conexao/conn.php'; 
            $sql_cargos = "SELECT id, nome_cargo, salario FROM cargo";
            $stmt_cargos = $pdo->query($sql_cargos);
            while ($cargo = $stmt_cargos->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$cargo['id']}' data-salario='{$cargo['salario']}'>{$cargo['nome_cargo']}</option>";
            }
            ?>
        </select>
    </div>
</div>

                <div class="input-block">
                    <div class="input-container">
                        <input type="number" step="0.01" name="salario" id="salario" placeholder="Salário" readonly required>
                    </div>
                </div>

            </div>
                <button type="submit" class="button-submit-cadastro">
                    Finalizar 
                </button>

                <button class="button-submit-voltar">
                        <a href="index.php">Voltar</a>
                </button>
        </div>
        </form>
    </section>
        <!-- Adicionando evento para o campo do salario -->
        <script src="./assets/js/inputSalario.js" defer></script>
</body>
</html>

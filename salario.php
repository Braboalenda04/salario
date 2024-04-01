<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Salário para Vendedores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #652906;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #665666
        }
        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #007bff;
        }
        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .resultado {
            margin-top: 20px;
            padding: 10px;
            background-color: #f7f7f7;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculadora de Salário para Vendedores</h2>
        <form action="" method="post">
            <label for="nome">Nome do Vendedor:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="meta_semanal">Meta de Venda Semanal (em R$):</label>
            <input type="number" id="meta_semanal" name="meta_semanal" required>
            <label for="meta_mensal">Meta de Venda Mensal (em R$):</label>
            <input type="number" id="meta_mensal" name="meta_mensal" required>
            <input type="submit" value="Calcular Salário">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];
            $meta_semanal = $_POST["meta_semanal"];
            $meta_mensal = $_POST["meta_mensal"];

            $salario_minimo = 1500; // Salário mínimo do vendedor
            $percentual_meta_semanal = 0.01; // 1% sobre o valor da meta semanal
            $percentual_excedente_semanal = 0.05; // 5% sobre o excedente da meta semanal
            $percentual_excedente_mensal = 0.10; // 10% sobre o excedente da meta mensal

            // Cálculo do valor sobre a meta semanal
            $bonus_meta_semanal = $meta_semanal * $percentual_meta_semanal;

            // Cálculo do excedente da meta semanal
            $excedente_semanal = 0;
            if ($meta_semanal > 20000) {
                $excedente_semanal = ($meta_semanal - 20000) * $percentual_excedente_semanal;
            }

            // Cálculo do excedente da meta mensal
            $excedente_mensal = 0;
            if ($meta_mensal > 80000) {
                $excedente_mensal = ($meta_mensal - 80000) * $percentual_excedente_mensal;
            }

            // Salário final
            $salario_final = $salario_minimo + $bonus_meta_semanal + $excedente_semanal + $excedente_mensal;
        ?>
        <div class="resultado">
            <h3>Resultado para <?php echo $nome; ?>:</h3>
            <p>Salário Final: R$ <?php echo number_format($salario_final, 2, ',', '.'); ?></p>
        </div>
        <?php } ?>
    </div>
</body>
</html>


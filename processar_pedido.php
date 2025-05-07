<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resumo da Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="super-header text-white">
        <h1>Supermercado Popular</h1>
        <p>Resumo da compra</p>
    </div>

    <div class="container mt-4 caixa-box">
        <h2 class="text-center mb-4">Detalhes da Compra</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Receber os dados do formulário
            $cliente = isset($_POST['cliente']) ? htmlspecialchars($_POST['cliente']) : 'Cliente Desconhecido';
            $nome_pedido1 = isset($_POST['nome_pedido1']) ? htmlspecialchars($_POST['nome_pedido1']) : 'Produto sem nome';
            $nome_pedido2 = isset($_POST['nome_pedido2']) ? htmlspecialchars($_POST['nome_pedido2']) : 'Produto sem nome';
            $produto1 = isset($_POST['produto1']) ? floatval($_POST['produto1']) : 0;
            $produto2 = isset($_POST['produto2']) ? floatval($_POST['produto2']) : 0;
            $valor_pago = isset($_POST['valor_pago']) ? floatval($_POST['valor_pago']) : 0;

            
            $total = $produto1 + $produto2;
            $troco = $valor_pago - $total;

            echo "<p><strong>Cliente:</strong> " . $cliente . "</p>";
            echo "<p><strong>Produto 1:</strong> " . $nome_pedido1 . "</p>";
            echo "<p><strong>Produto 1:</strong> " . $nome_pedido1 . "</p>";
            echo "<p><strong>Total da compra:</strong> R$ " . number_format($total, 2, ',', '.') . "</p>";
            echo "<p><strong>Valor pago:</strong> R$ " . number_format($valor_pago, 2, ',', '.') . "</p>";

         
            if ($troco < 0) {
                echo "<p class='text-danger'><strong>Valor insuficiente:</strong> Faltam R$ " . number_format(abs($troco), 2, ',', '.') . "</p>";
            } else {
                echo "<p class='text-success'><strong>Troco:</strong> R$ " . number_format($troco, 2, ',', '.') . "</p>";
            }
        } else {
            echo "<p class='text-danger'>Erro ao processar a compra.</p>";
        }
        ?>

        <a href="index.html" class="btn btn-warning w-100 mt-3">Nova Compra</a>
    </div>
</body>
</html>


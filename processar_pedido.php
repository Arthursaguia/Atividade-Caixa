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
            // Receber nome do cliente
            $cliente = isset($_POST['cliente']) ? htmlspecialchars($_POST['cliente']) : 'Cliente Desconhecido';
            
            $produto1 = isset($_POST['produto1']) ? floatval($_POST['produto1']) : 0;
            $produto2 = isset($_POST['produto2']) ? floatval($_POST['produto2']) : 0;
            $valor_pago = isset($_POST['valor_pago']) ? floatval($_POST['valor_pago']) : 0;

            // Calculando total e troco
            $total = $produto1 + $produto2;
            $troco = $valor_pago - $total;

            // Exibir detalhes
            echo "<p><strong>Cliente:</strong> " . $cliente . "</p>";
            echo "<p><strong>Total da compra:</strong> R$ " . number_format($total, 2, ',', '.') . "</p>";
            echo "<p><strong>Valor pago:</strong> R$ " . number_format($valor_pago, 2, ',', '.') . "</p>";

            // Mostrar troco ou valor insuficiente
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


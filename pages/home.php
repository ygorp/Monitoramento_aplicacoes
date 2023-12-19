<?php

session_start();
    if (!isset($_SESSION['username'])) {
        // O usuário não está autenticado
        http_response_code(401);
        echo "Não autenticado";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Monitoramento</title>

    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <main>
        <h2>Monitoramento de Aplicações</h2>
        <table id="tabelaAplicacoes">
            <tr>
                <th>Nome</th>
                <th>Status</th>
                <th>Última Verificação</th>
            </tr>
        </table>
    </main>



    <script src="../js/script.js"></script>
</body>
</html>
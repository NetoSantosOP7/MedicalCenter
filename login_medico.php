<?php
// Iniciar a sessão se ainda não estiver iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Verificar se há mensagem de erro na sessão
if (isset($_SESSION['erro_login'])) {
    echo '<p style="color: red;">' . $_SESSION['erro_login'] . '</p>';
    // Limpar a mensagem de erro da sessão
    unset($_SESSION['erro_login']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Médico</title>
</head>
<body>
    <h1>Login do Médico</h1>

    <form action="processar_login_medico.php" method="POST">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>

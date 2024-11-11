<?php
// Iniciar a sessão se ainda não estiver iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Incluir o arquivo de conexão com o banco de dados
include('connection.php');

// Verificar se os dados de login foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do formulário de login
    $login_input = $_POST['email']; // Nome ou email do médico
    $password_login = $_POST['password'];

    // Sanitizando a entrada para evitar injeção de SQL (opcional, mas altamente recomendado)
    $login_input = $conn->real_escape_string($login_input);
    $password_login = $conn->real_escape_string($password_login);

    // Consulta para obter os dados de email e senha do médico
    $sql_medico = "SELECT * FROM medicos WHERE email = '$login_input'";
    $result_medico = $conn->query($sql_medico);

    if ($result_medico->num_rows == 1) {
        // Médico encontrado, obter os dados de email e senha
        $row_medico = $result_medico->fetch_assoc();
        $id_medico = $row_medico['id'];
        $email_medico = $row_medico['email'];
        $senha_medico = $row_medico['senha'];

        // Comparar os dados fornecidos pelo usuário com os dados do médico
        if ($email_medico == $login_input && $senha_medico == $password_login) {
            // Login bem-sucedido, redirecionar para a página do médico
            $_SESSION['id_medico'] = $id_medico;
            header("Location: tela_medico.php");
            exit();
        } else {
            // Email ou senha incorretos
            $_SESSION['erro_login'] = "Email ou senha incorretos";
            header("Location: login_medico.php");
            exit();
        }
    }

    $_SESSION['erro_login'] = "Email ou senha incorretos";
    header("Location: login_medico.php");
    exit();
}

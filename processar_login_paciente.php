<?php

if (!isset($_SESSION)) {
    session_start();
}


include('connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login_input = $_POST['email'];
    $password_login = $_POST['password'];


    $login_input = $conn->real_escape_string($login_input);
    $password_login = $conn->real_escape_string($password_login);


    $sql_paciente = "SELECT * FROM pacientes WHERE email = '$login_input'";
    $result_paciente = $conn->query($sql_paciente);

    if ($result_paciente->num_rows == 1) {

        $row_paciente = $result_paciente->fetch_assoc();
        $id_paciente = $row_paciente['id'];
        $email_paciente = $row_paciente['email'];
        $senha_paciente = $row_paciente['senha'];


        if ($email_paciente == $login_input && $senha_paciente == $password_login) {

            $_SESSION['id_paciente'] = $id_paciente;
            header("Location: tela_paciente.php");
            exit();
        } else {

            $_SESSION['erro_login'] = "Email ou senha incorretos";
            header("Location: login_paciente.php");
            exit();
        }
    }

    $_SESSION['erro_login'] = "Email ou senha incorretos";
    header("Location: login_paciente.php");
    exit();
}
?>

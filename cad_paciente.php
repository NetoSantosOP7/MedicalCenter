<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_paciente = $_POST['nome_paciente'];
    $email_paciente = $_POST['email_paciente'];
    $telefone_paciente = $_POST['telefone_paciente'];

    // Consulta para verificar se o paciente já está cadastrado pelo e-mail
    $sql_verificar = "SELECT * FROM pacientes WHERE email = '$email_paciente'";
    $result_verificar = $conn->query($sql_verificar);

    if ($result_verificar->num_rows > 0) {
        echo "Erro: Paciente já cadastrado com este e-mail.";
    } else {
        // Inserir o paciente no banco de dados
        $sql_inserir = "INSERT INTO pacientes (nome, email, telefone) VALUES ('$nome_paciente', '$email_paciente', '$telefone_paciente')";
        
        if ($conn->query($sql_inserir) === TRUE) {
            echo "Paciente cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar paciente: " . $conn->error;
        }
    }
}
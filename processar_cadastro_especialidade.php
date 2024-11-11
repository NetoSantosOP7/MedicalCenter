<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_especialidade = $_POST['nome_especialidade'];

    $sql = "INSERT INTO especialidades (nome) VALUES ('$nome_especialidade')";

    if ($conn->query($sql) === TRUE) {
        echo "Especialidade cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar especialidade: " . $conn->error;
    }
}
?>

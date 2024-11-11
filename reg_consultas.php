<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente_consulta = $_POST['paciente_consulta'];
    $diagnostico = $_POST['diagnostico'];
    $receituario = $_POST['receituario'];

    $sql_inserir = "INSERT INTO consultas (id_paciente, diagnostico, receituario) VALUES ('$paciente_consulta', '$diagnostico', '$receituario')";

    if ($conn->query($sql_inserir) === TRUE) {
        echo "Consulta registrada com sucesso!";
    } else {
        echo "Erro ao registrar consulta: " . $conn->error;
    }
}
?>

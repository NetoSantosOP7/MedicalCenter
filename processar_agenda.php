<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_medico = $_POST['id_medico'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];


    $sql_inserir = "INSERT INTO agenda (id_medico, data, horario) VALUES ('$id_medico', '$data', '$horario')";

    if ($conn->query($sql_inserir) === TRUE) {
        echo "Agenda do médico criada/modificada com sucesso!";
    } else {
        echo "Erro ao criar/modificar agenda do médico: " . $conn->error;
    }
}
?>

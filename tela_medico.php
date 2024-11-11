<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Médico</title>
</head>
<body>
    <h1>Painel do Médico</h1>


    <h2>Chamar Paciente</h2>
    <form action="chamar_paciente.php" method="POST">
        <label for="paciente_chamar">Paciente:</label>
        <select id="paciente_chamar" name="paciente_chamar" required>
        <?php
                include('connection.php');

                $query = "SELECT * FROM `pacientes`";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                }
            ?>
        </select><br><br>

        <input type="submit" value="Chamar Paciente">
    </form>

<h2>Registrar Consulta</h2>
<form action="reg_consultas.php" method="POST">
    <label for="paciente_consulta">Paciente:</label>
    <select id="paciente_consulta" name="paciente_consulta" required>
        <?php
        include 'connection.php';

        $sql_pacientes = "SELECT id, nome FROM pacientes";
        $result_pacientes = $conn->query($sql_pacientes);

        if ($result_pacientes->num_rows > 0) {
            while ($row = $result_pacientes->fetch_assoc()) {
                echo '<option value="' . $row["id"] . '">' . $row["nome"] . '</option>';
            }
        }
        ?>
    </select><br><br>
    
    <label for="diagnostico">Diagnóstico:</label>
    <input type="text" id="diagnostico" name="diagnostico" required><br><br>
    
    <label for="receituario">Receituário:</label>
    <textarea id="receituario" name="receituario" required></textarea><br><br>
    
    <input type="submit" value="Registrar Consulta">
</form>


    <h2>Visualizar Agenda Pessoal</h2>
    <?php

    if (!isset($_SESSION)) {
        session_start();
    }

    include('connection.php');

    $id_medico = $_SESSION['id_medico'];
    $sql_agenda = "SELECT * FROM agenda WHERE id_medico = $id_medico";
    $result_agenda = $conn->query($sql_agenda);

    if ($result_agenda->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Data</th><th>Horário</th></tr>";
        while ($row = $result_agenda->fetch_assoc()) {
            echo "<tr><td>" . $row["data"] . "</td><td>" . $row["horario"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum registro na agenda.";
    }
    ?>


    <h2>Visualizar Prontuário</h2>
    <form action="visualizar_prontuario.php" method="POST">
        <label for="paciente_prontuario">Paciente:</label>
        <select id="paciente_prontuario" name="paciente_prontuario" required>
        <?php
                include('connection.php');

                $query = "SELECT * FROM `pacientes`";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                }
        ?>
        </select><br><br>

        <input type="submit" value="Visualizar Prontuário">
    </form>
</body>
</html>

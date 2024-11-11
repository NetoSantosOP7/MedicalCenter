<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel da Recepção</title>
</head>
<body>
    <h1>Painel da Recepção</h1>


    <h2>Cadastrar Paciente</h2>
    <form action="cad_paciente.php" method="POST">
        <label for="nome_paciente">Nome do Paciente:</label>
        <input type="text" id="nome_paciente" name="nome_paciente" required><br><br>

        <label for="email_paciente">E-mail do Paciente:</label>
        <input type="email" id="email_paciente" name="email_paciente" required><br><br>

        <label for="telefone_paciente">Telefone do Paciente:</label>
        <input type="text" id="telefone_paciente" name="telefone_paciente" required><br><br>

        <input type="submit" value="Cadastrar Paciente">
    </form>


    <h2>Marcar Consulta</h2>
    <form action="marcar_consulta.php" method="POST">
        <label for="paciente_consulta">Paciente:</label>
        <select id="paciente_consulta" name="paciente_consulta" required>
            <?php
                include('connection.php');

                $query = "SELECT * FROM `pacientes`";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                }
            ?>
        </select><br><br>
        
        <label for="medico_consulta">Médico:</label>
        <select id="medico_consulta" name="medico_consulta" required>
            <?php
                include('connection.php');

                $query = "SELECT * FROM `medicos`";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                }
            ?>
        </select><br><br>
        
        <label for="data_consulta">Data da Consulta:</label>
        <input type="date" id="data_consulta" name="data_consulta" required><br><br>
        
        <label for="horario_consulta">Horário da Consulta:</label>
        <input type="time" id="horario_consulta" name="horario_consulta" required><br><br>
        
        <input type="submit" value="Marcar Consulta">
    </form>


    <h2>Confirmar Presença</h2>
    <form action="confirmar_presenca.php" method="POST">
        <label for="paciente_presenca">Paciente:</label>
        <select id="paciente_presenca" name="paciente_presenca" required>
            <?php
                include('connection.php');

                $query = "SELECT * FROM `pacientes`";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                }
            ?>
        </select><br><br>
        
        <input type="submit" value="Confirmar Presença">
    </form>


    <h2>Encaminhar para Pré-Exame</h2>
    <form action="encaminhar_pre_exame.php" method="POST">
        <label for="paciente_pre_exame">Paciente:</label>
        <select id="paciente_pre_exame" name="paciente_pre_exame" required>  
            <?php
                include('connection.php');

                $query = "SELECT * FROM `pacientes`";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                }
            ?>    
        </select><br><br>
        
        <label for="exame_pre_exame">Exame Pré-Exame:</label>
        <input type="text" id="exame_pre_exame" name="exame_pre_exame" required><br><br>
        
        <input type="submit" value="Encaminhar para Pré-Exame">
    </form>

    
    <h2>Confirmar Autorização do Plano</h2>
    <form action="confirmar_autorizacao_plano.php" method="POST">
        <label for="paciente_autorizacao">Paciente:</label>
        <select id="paciente_autorizacao" name="paciente_autorizacao" required>
            <?php
                include('connection.php');

                $query = "SELECT * FROM `pacientes`";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                }
            ?>  
        </select><br><br>
        
        <input type="submit" value="Confirmar Autorização do Plano">
    </form>

    
    <h2>Visualizar Agenda dos Médicos</h2>
    <?php
        include('connection.php');

        $sql_medicos = "SELECT * FROM medicos";
        $result_medicos = $conn->query($sql_medicos);
        
        echo '<form action="#" method="post">';
        echo '<select onchange="exibirAgenda()" id="agenda-medico" name="agenda-medico">';
        echo "<option value='#'>Selecione--</option>";

        while ($row = mysqli_fetch_assoc($result_medicos)) {
            echo "<option class='options' value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
        }

        echo '</select>';
        echo '<input type="submit" value="Ver">';
        echo '</form>';

        $sql_agenda = "SELECT * FROM agenda INNER JOIN medicos on medicos.id = agenda.id_medico WHERE medicos.id = " . $_COOKIE['selecionado'];
        $result_agenda = mysqli_query($conn, $sql_agenda);

        echo '<div id="agenda">'; 
        echo '<p>Vizualizando a agenda de ' . $_COOKIE['nome'] . '</p>';
        if (mysqli_num_rows($result_agenda) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Data</th><th>Horário</th></tr>";
            while ($row = mysqli_fetch_assoc($result_agenda)) {
                echo "<tr><td>" . $row["data"] . "</td><td>" . $row["horario"] . "</td></tr>";
            }
            echo "</table>";
            echo '</div>';
        } else {
            echo 'Esse médico não possui consultas marcadas.';
        }

    ?>

    
    <h2>Chamar Paciente</h2>
    <form action="chamar_paciente.php" method="POST">
        <label for="paciente_chamar">Paciente:</label>
        <select id="paciente_autorizacao" name="paciente_autorizacao" required>
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

    <script>
        function exibirAgenda() {
            let agendaSelect = document.getElementById('agenda-medico');
            let agenda = document.getElementById("agenda");

            document.cookie = "nome = " + agendaSelect.options[agendaSelect.selectedIndex].text;

            document.cookie = "selecionado = " + agendaSelect.value;
        }

    </script>
</body>
</html>

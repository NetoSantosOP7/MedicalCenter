<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar/Modificar Agenda do Médico</title>
</head>
<body>
    <h1>Criar/Modificar Agenda do Médico</h1>
    
    <form action="processar_agenda.php" method="POST">
        <label for="id_medico">ID do Médico:</label>
        <input type="text" id="id_medico" name="id_medico" required><br><br>
        
        <label for="data">Data:</label>
        <input type="date" id="data" name="data" required><br><br>
        
        <label for="horario">Horário:</label>
        <input type="time" id="horario" name="horario" required><br><br>
        
        <input type="submit" value="Salvar Agenda">
    </form>
</body>
</html>

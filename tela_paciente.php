<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Paciente</title>
</head>
<body>
    <h1>Painel do Paciente</h1>

    <h2>Consulta Agendada</h2>
    <div>
        <p>Data e Horário: 25/03/2024 às 10:00</p>
        <p>Médico: Dr. João Silva</p>
    </div>

    <h2>Notificações</h2>
    <div id="notificacoes">
    </div>


    <script>

        function atualizarNotificacoes() {

            var notificacao1 = "O médico Dr. João Silva está chamando você para a consulta.";
            var notificacao2 = "Sua consulta agendada para amanhã foi confirmada.";


            var notificacoesDiv = document.getElementById("notificacoes");
            notificacoesDiv.innerHTML = "";
            notificacoesDiv.innerHTML += "<p>" + notificacao1 + "</p>";
            notificacoesDiv.innerHTML += "<p>" + notificacao2 + "</p>";
        }


        setInterval(atualizarNotificacoes, 5000);
    </script>
</body>
</html>

<?php
$tipo_usuario = $_POST['tipo_usuario'];

switch ($tipo_usuario) {
    case 'gestor':
        header("Location: tela_gestor.php");
        break;
    case 'recepcao':
        header("Location: tela_recepcao.php");
        break;
    case 'medico':
        header("Location: login_medico.php");
        break;
    case 'tempo':
        header("Location: tela_tempo.php");
        break;
    case 'paciente':
        header("location: login_paciente.php");
        break;
    default:
        echo "Tipo de usuário inválido!";
}
?>

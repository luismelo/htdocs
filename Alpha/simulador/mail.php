<?php
$_REQUEST['nome'];
$nome = $_POST['nome'];
if(isset($_POST['button_pressed']))
{
    $to      = 'luis.melo@sequencialctp.com.br';
    $subject = 'Proposta de acordo feito pelo sistema de simulação de acordo';
    $message = 'Proposta feita pelo aluno: '.$nome.'';
    $headers = 'Isso é uma mensagem automática, caso respondida ela se auto-destruirá em 5 segundos';
    mail($to, $subject, $message, $headers);

    echo 'Prosposta enviada para '.$to.'.';
}

?>
?>
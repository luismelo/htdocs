<?PHP

$_REQUEST['valor_total'];
$_REQUEST['parcelas'];
$_REQUEST['juros'];
$_REQUEST['nome'];

$valor_total = $_POST['valor_total'];
$parcelas = $_POST['parcelas'];
$juros = $_POST['juros'];
$nome = $_POST['nome'];
$curr_timestamp = date('Y-m-d H:i:s');


    $to      = 'luis.melo@sequencialctp.com.br';
    $subject = 'Proposta de acordo feito pelo sistema de simulação de acordo';
    $message = 'Proposta feita pelo aluno: '.$nome.'';
    $headers = 'Isso é uma mensagem automática, caso respondida ela se auto-destruirá em 5 segundos';
    mail($to, $subject, $message, $headers);

    echo 'Prosposta enviada para '.$to.'.';


function calcParcelaJuros($valor_total, $parcelas, $juros = 0) {
	if ($juros == 0) {
		$string = '<p>PARCELA - VALOR <br /><hr></p>';
		for ($i = 1; $i < ($parcelas + 1); $i++) {
			$string .= '<p>'.$i . 'x (Sem Juros) - R$ ' . number_format($valor_total / $parcelas, 2, ",", ".") . '</p> <br />';
		}
		return $string;
	} else {
		$string = '<p>PARCELA - VALOR <br /><hr><p/>';
		for ($i = 1; $i < ($parcelas + 1); $i++) {
			$I = $juros / 100.00;
			$valor_parcela = $valor_total * $I * pow((1 + $I), $parcelas) / (pow((1 + $I), $parcelas) - 1);
			$string .= $i . 'x (Juros de: ' . $juros . '%) - R$ ' . number_format($valor_parcela, 2, ",", ".") . ' <br />';
		}
		return $string;
	}
}
	if($parcelas <= 4){
		echo "<div class ='content'><p class ='result-header'>Resultado da simulação de acordo <br/>\n<br></p>";
		echo "<p>Simulação realizada em: ".$curr_timestamp."</p>" ;
		echo "<p>Valor Total é: R$ " . $valor_total . "!</p>\n";
		print(calcParcelaJuros($valor_total, $parcelas, $juros))."</div>";
		echo "<br>
		<input type='submit' class='btn-back' onclick='history.back()'value='Retornar'></a>
		
		<input class= 'btn-send' type='submit'' value='Enviar proposta para analise' />
		
    	";
			
	}
	else {
		echo "<p style='font-weight:normal;
	color:#000000;
	background-color:#C9FCFB;
	border: 11px solid #ADE7F2;
	letter-spacing:5pt;
	border-radius: 28px;
	word-spacing:2pt;
	font-size:19px;
	text-align:center;
	font-family:arial, helvetica, sans-serif;
	line-height:2;
	margin-left:290px;
	margin-right:290px;
	padding:10px;'>
	Número de parcelas não permitido!
</p><br>
<input class='btn-back' a href='#' onclick='history.back()' name='return' value='Retornar'/>";
	};


?>
<html>
	<link href='css/7590.css' media='all' rel='Stylesheet' type='text/css' />
</html>
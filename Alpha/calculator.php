<?php
@session_start();
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
$_REQUEST['valor_total'];
$_REQUEST['parcelas'];
$_REQUEST['juros'];
$_REQUEST["nome"];
$_REQUEST['telefone'];
$_REQUEST['email'];


$cpf = $_REQUEST['cpf'];
$valor_total = $_POST['valor_total'];
$parcelas = $_POST['parcelas'];
$juros = $_POST['juros'];
$nome = $_POST["nome"];
$telefone =$_POST['telefone'];
$email = $_POST['email'];
$curr_timestamp = date('Y-m-d H:i:s');


function calcParcelaJuros($valor_total, $parcelas, $juros = 0) {
	$cpf = $_REQUEST['cpf'];
	$valor_total = $_POST['valor_total'];
	$parcelas = $_POST['parcelas'];
	//$juros = $_POST['juros'];	
	$nome = $_POST["nome"];
	$telefone =$_POST['telefone'];
	$email = $_POST['email'];
	
	
	if ($juros == 0 || $parcelas == 1) {
		$string = '<h3>PARCELA - VALOR <br /><br/><hr><br/></h3>';
		for ($i = 1; $i < ($parcelas + 1); $i++) {
			$string .= '<p>'.$i . 'x (Sem Juros) - R$ ' . number_format($valor_total / $parcelas, 2, ",", ".") . '</p> <br />';
		}
		
		return $string;
	} else {
		
		$string = '<h3>PARCELA - VALOR <br /><br/><hr><br/><h3/>';
		for ($i = 1; $i < ($parcelas + 1); $i++) {
			$I = $juros / 100.00;
			$valor_parcela = $valor_total * $I * pow((1 + $I), $parcelas) / (pow((1 + $I), $parcelas) - 1);
			$string .= $i . 'x (Juros de: ' . $juros . '%) - R$ ' . number_format($valor_parcela, 2, ",", ".") . ' <br />';
			$_SESSION['valor_parcela'] = $valor_parcela;
		}
		return  $string;
	
	}

}
	if($parcelas <= 4 && $parcelas != "" || $parcelas > 0 && $parcelas <=4){
		echo "<div class ='container-last'><h2>Resultado da simulação de acordo<br/>\n</h2>";
		echo "<h2>".$nome."</h2><br/>";
		echo "<h2>".$cpf."</h2><br/>";
		echo "<h3>Simulação realizada em: ".$curr_timestamp."</h3><br/>" ;
		echo "<p>Valor Total é: R$ " . $valor_total . "!</p><br/>\n";
		print(calcParcelaJuros($valor_total, $parcelas, $juros))."";
		echo "<form class='form' action='sender.php' id='dados' method='post'>";
		echo "<input type='checkbox' id='check1' required name='check1'/><label for='check1'> Aceito os termos e condições</label>";
		echo "<br/><input type='submit'  name='confirm' value='Fechar Acordo!'><br/><br/>";
    	echo "<input type ='hidden' name='nome' value='".$nome."'>";
    	echo "<input type ='hidden' name='valor' value=".$valor_total.">";
    	echo "<input type ='hidden' name='parcelas' value=".$parcelas.">";
    	echo "<input type ='hidden' name='juros' value=".$juros.">";
    	echo "<input type ='hidden' name='telefone' value=".$telefone.">";
    	echo "<input type ='hidden' name='mail' value=".$email.">";
    	echo "<input type ='hidden' name='cpf' value=".$cpf.">";
    	echo "<button class='button' align='center' onclick='history.back(-1)'>Retornar</button>";
    	echo "</form>";
    	echo "<ul class='bg-bubbles'>
		<li></li>
		<li></li>
		<li></li>		
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
	
		</div>
		";
	}
	else {
		echo  "
	<link href='css/style.css' media='all' rel='Stylesheet' type='text/css' />
	<body class= 'wrapper-error'>
		<div class='container-error'>
		<h1>
	Número de parcelas não permitido!
</h1>
<br>
</div>
<button class='button'  align='center' onclick='history.back()'>Retornar</button>
<ul class='bg-bubbles'>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</body>";
	};
	if (isset($_POST['check1'])) {
   		// Checkbox is selected
   		
		} else{
?>
	
<?php
		}
?>
	
	<link href="css/style.css" media='all' rel='Stylesheet' type='text/css' />
	<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
	<body class="wrapper-last">
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
		alert ("ATENÇÃO: Ao clicar \"Fechar Acordo!\",serão gerados os boletos, o acordo será válido até o cumprimento do mesmo, no caso de dúvidas ou necessidade de condições diferenciadas, ligue para nós.\nÉ necessário aceitar os termos e condições para prosseguir.")
	</SCRIPT>
	</body>

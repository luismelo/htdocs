<?php 
session_start();
//

echo "<html>
<body class='wrapper'>
	<link href='css/style.css' media='all' rel='Stylesheet' type='text/css' />
	<script src='js/index.js'></script>
	<div class='container'>
		<form class='form' action='index.php' method='POST'>
			<h2>Insira seu CPF (apenas números):</h2>
			<input type='text' class='form-4' pattern=\d* name='cpf' placeholder='Digite aqui o CPF' required='required'>
			<input list='unidades' type='text' class='form-4' placeholder='Selecione a unidade' name='unidades'>
			<datalist name='unidades' id='unidades'>
				<option value='Unidade X'><option value='Unidade 1'><option value='Unidade 2'><option value='Unidade 3'><option value='Unidade 4'>
			</datalist>

			<input type='submit' class='button' name='submit1' id='submit1' value='Verifique o CPF' />
		</form>

		<br>
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
	</div>
</body>
</html>";

if (isset($_POST['submit1'])) {
	include 'connection.php';	
	$cpf = $_POST['cpf'];
	$_SESSION['cpf'] = $cpf;
	$unidade = $_POST['unidades'];
	$_SESSION['unidades'] = $unidade;
	$selected = mysql_select_db('inativos', $dbhandle) or die('Não chegou a selecionar o BD');
	$result = mysql_query("SELECT * FROM alunos_inativos where cpf='$cpf' AND ativo='N'");
	If ($result = TRUE){
		echo "<form class='form-4' action='data_input.php'>
		<input type='text' name='cpf' value='$cpf'>
		<input type='submit' class='button' value='Iniciar acordo'>
		</form>";
	} else{
		echo 'CPF não cadastrado';
	}
	
	//echo session_id();
	//echo $_SESSION['unidades'];
	
	//include 'data_input.php';
//var_dump($_SESSION['unidades']);
} else {
	//echo session_id();
	
}
?>
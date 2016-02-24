<?php
include 'index.php';
$username = "root";
$password = "";
$hostname = "localhost";

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) or die("Não conectou MySQL");

//select a database to work with
$selected = mysql_select_db("inativos", $dbhandle) or die("Não chegou a selecionar o BD");
$cpf = $_POST['cpf'];
//execute the SQL query and return records
$result = mysql_query("SELECT * FROM alunos_inativos where cpf=" . $cpf . "");

//fetch tha data from the database
if (@mysql_num_rows($result) > 0) {
	while ($row = mysql_fetch_array($result)) {
		echo "


 <head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<link href='css/7590.css' media='all' rel='Stylesheet' type='text/css' />
		<script src='js/jquery-1.11.3.js'></script>
		<script src='js/jquery.maskMoney.min.js'></script>

		<title>Calculador de Parcelas</title>
		<meta name='author' content='bacelar' />
		<!-- Date: 2015-08-25 -->
	</head>
	<body>
		<div class='content'>
   
	<form action='calculator.php' method='post'>
      <p>Nome: " . $row{'nome'} . " CPF: " . //display the results
		$row{'cpf'} . "</p>\n
		
			<p>Nome:</p>
			<input type='text' id='aluno' style='text-align:left' 
			name='nome' value= ".$row{'nome'}." readonly>
			<br />
			<p>Valor total:</p>
			<input type='text' id='money' style='text-align:left' 
			name='valor_total' value= " . $row{'divida'} . " readonly>
			<br />
			<p>Parcelas:</p>
			<input type='number' style='text-align:left' name='parcelas' />
			<br />
			<p>Juros:</p>
			<input type='number' style='text-align:left' name='juros' />
			<br />
			<br>
			<input class='btn' type='submit' name='submit' value='Enviar! ( ͡° ͜ʖ ͡°)' />

		</form>
		</div>
	</body>
</html>";
	}
} else {
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
	Cpf não encontrado!
</p>";
}
?>

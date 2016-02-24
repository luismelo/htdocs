<?php
@session_start();
$hostname = $_REQUEST['unidades'];

if ($hostname == '') {
	$hostname = "Selecione uma unidade.";
};

if ($hostname == 'Unidade X') {
	$hostname = "localhost";
};
$username = "root";
$password = "";
$hostname = $hostname;

//connection to the database
$dbhandle = @mysql_connect($hostname, $username, $password) or die("<p>
	Unidade incorreta selecionada!
	$hostname
</p>");

?>
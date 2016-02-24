<?php
$username = "root";
$password = "";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Não conectou MySQL");
echo "Conectado MySQL<br>";

//select a database to work with
$selected = mysql_select_db("inativos",$dbhandle) 
  or die("Não chegou a selecionar o BD");

//execute the SQL query and return records
$result = mysql_query("SELECT cpf, nome, divida FROM alunos_inativos");

//fetch tha data from the database 
while ($row = mysql_fetch_array($result)) {
   echo "<p> Nome: ".$row{'nome'}." CPF: ". //display the results
   $row{'cpf'}." Divida: R$ " .$row{'divida'}.",00</p>\n";
}
//close the connection
mysql_close($dbhandle);
?>
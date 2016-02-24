<?php @session_start();
@ini_set('max_execution_time', 3);
error_reporting(0);
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
include 'connection2.php';

$selected = mysql_select_db("inativos", $dbhandle) or die("Não chegou a selecionar o BD");
$valor_total = $_REQUEST['valor'];
$parcelas = $_REQUEST['parcelas'];
$juros = $_POST['juros'];
$nome = $_POST["nome"];
$telefone = $_POST['telefone'];
$email = $_REQUEST['mail'];
$cpf = $_SESSION['cpf'];
if (isset($_POST['confirm']) && $parcelas == 1 || $juros == 0 && $parcelas > 1) {
	$valor_total = $valor_total;
	$parcelas = $parcelas;
	$juros = $_POST['juros'];
	$nome = $_POST["nome"];
	$telefone = $_POST['telefone'];
	$email = $email;
	$v = $valor_total;
	$p = $parcelas;
	$v_p = $valor_total / $parcelas;
	//echo "recebido ".$nome. " ".$valor_total." ".$telefone." ".$valor_parcela."  ".$email."";
	// DADOS DO BOLETO PARA O SEU CLIENTE
	$dias_de_prazo_para_pagamento = 5;
	$taxa_boleto = 2.95;
	$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));
	// Prazo de X dias OU informe data: "13/04/2006";
	$valor_cobrado = $valor_total;
	// Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
	$valor_cobrado = str_replace(",", ".", $valor_cobrado);
	$valor_boleto = number_format($valor_cobrado + $taxa_boleto, 2, ',', '');

	$dadosboleto["nosso_numero"] = "000000000";
	// Nosso numero sem o DV - REGRA: Máximo de 11 caracteres!
	$dadosboleto["numero_documento"] = $dadosboleto["nosso_numero"];
	// Num do pedido ou do documento = Nosso numero
	$dadosboleto["data_vencimento"] = $data_venc;
	// Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
	$dadosboleto["data_documento"] = date("d/m/Y");
	// Data de emissão do Boleto
	$dadosboleto["data_processamento"] = date("d/m/Y");
	// Data de processamento do boleto (opcional)
	$dadosboleto["valor_boleto"] = $valor_boleto;
	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

	// DADOS DO SEU CLIENTE
	$dadosboleto["sacado"] = $nome;
	$dadosboleto["endereco1"] = $email;
	$dadosboleto["endereco2"] = "Cidade - Estado -  CEP: 00000-000";

	// INFORMACOES PARA O CLIENTE
	$dadosboleto["demonstrativo1"] = "Pagamento de parcela do Instituto Sequencial";
	$dadosboleto["demonstrativo2"] = "Mensalidade referente ao mês de : " . date("m/Y	") . "
<br>Taxa bancária - R$ " . number_format($taxa_boleto, 2, ',', '');
	$dadosboleto["demonstrativo3"] = "Instituto Sequencial - http://www.sequencialctp.com.br";
	$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
	$dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
	$dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: financeiro@sequencialctp.com.br";
	$dadosboleto["instrucoes4"] = "&nbsp;";

	// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
	$dadosboleto["quantidade"] = "001";
	$dadosboleto["valor_unitario"] = $valor_boleto;
	$dadosboleto["aceite"] = "";
	$dadosboleto["especie"] = "R$";
	$dadosboleto["especie_doc"] = "DS";

	// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //

	// DADOS DA SUA CONTA - Bradesco
	$dadosboleto["agencia"] = "1100";
	// Num da agencia, sem digito
	$dadosboleto["agencia_dv"] = "0";
	// Digito do Num da agencia
	$dadosboleto["conta"] = "0102003";
	// Num da conta, sem digito
	$dadosboleto["conta_dv"] = "4";
	// Digito do Num da conta

	// DADOS PERSONALIZADOS - Bradesco
	$dadosboleto["conta_cedente"] = "0102003";
	// ContaCedente do Cliente, sem digito (Somente Números)
	$dadosboleto["conta_cedente_dv"] = "4";
	// Digito da ContaCedente do Cliente
	$dadosboleto["carteira"] = "06";
	// Código da Carteira: pode ser 06 ou 03

	// SEUS DADOS
	$dadosboleto["identificacao"] = "Instituto Sequencial";
	$dadosboleto["cpf_cnpj"] = "";
	$dadosboleto["endereco"] = "Rua Dr. Bacelar, 173 - 3º Andar, Vila Clementino";
	$dadosboleto["cidade_uf"] = "São Paulo / SP";
	$dadosboleto["cedente"] = "Instituto Educacional Sequencial Ltda EPP";

	// NÃO ALTERAR!
	for ($j = 01; $j <= ($parcelas); $j++) {

				$nome = $nome;
				$dadosboleto["numero_documento"] = $dadosboleto["nosso_numero"];
				$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400 * $j));
				$date1 = str_replace("/","-",$data_venc);
			    $data_db=date("Y-m-d",strtotime($date1));
				$dadosboleto["data_vencimento"] = $data_venc;
				$dadosboleto["valor_boleto"] = number_format(($valor_total / $parcelas)+$taxa_boleto, 2, ",", ".");
				$valor_boleto = $dadosboleto["valor_boleto"];
				$dadosboleto["num_parcela"] = $j;
				
				
				echo "<h3>$j";
				echo "/";
				echo "$parcelas";
				echo " $valor_boleto";
				echo " $data_venc ";
				echo "$cpf";
				echo " $nome</h3>";
				
				
				$saver = "INSERT IGNORE INTO boletos_renego (parcela, total_parc, valor_parc, cpf, nome_recibo, data_venc) 
		VALUES(" . $j . "," . $parcelas . ", " . number_format(($valor_cobrado + $taxa_boleto), 2, '', '') . ",  $cpf, '$nome', '$data_db')
		";
				
				if (mysql_query($saver)) {
					mysql_query("UPDATE alunos_inativos SET ativo='S'WHERE nome='$nome'");
					echo "
					<body class='wrapper'>
					<link href='css/style.css' media='all' rel='Stylesheet' type='text/css' />
					
					<form class='form-last' action='boleto.php' type='POST' target=_blank>
    					<input type='submit' name='bol_ger' value='Gerar Boleto!' />
    					<input type='hidden' id='aluno' style='text-align:left' 
			name='nome' value= '" . $nome . "' readonly>
						<input type='hidden' id='aluno' style='text-align:left' 
			name='data_venc' value= " . $data_venc . " readonly>
			<input type='hidden' id='aluno' style='text-align:left' 
			name='valor_boleto' value= " . $valor_boleto . " readonly>
			<input type='hidden' id='position' style='text-align:left' 
			name='position' value= " . $j . " readonly>
			</form><ul class='bg-bubbles'>
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
				} else {
					echo "ERROR: Could not able to execute $saver. " . mysql_error($saver);
				}
				echo "<p class='quebra-aqui'>&nbsp;</p>";

				if ($j == $parcelas) {
				
					
					}
			}

}

for ($i = 1; $i < ($parcelas + 1); $i++) {

	$I = $juros / 100.00;
	$valor_parcela = $valor_total * $I * pow((1 + $I), $parcelas) / (pow((1 + $I), $parcelas) - 1);
	if (isset($_POST['confirm']) && $juros != 0 || $parcelas !=1) {
		for ($j = 1; $j <= $parcelas, $j++; ) {
			$valor_total = $valor_total;
			$parcelas = $parcelas;
			$juros = $_POST['juros'];
			$nome = $_POST["nome"];
			$telefone = $_POST['telefone'];
			$email = $email;
			$v = $valor_total;
			$p = $parcelas;
			$v_p = $valor_total / $parcelas;
			//echo "recebido ".$nome. " ".$valor_total." ".$telefone." ".$valor_parcela."  ".$email."";
			// DADOS DO BOLETO PARA O SEU CLIENTE
			$dias_de_prazo_para_pagamento = 5;
			$taxa_boleto = 2.95;
			$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));
			// Prazo de X dias OU informe data: "13/04/2006";
			$valor_cobrado = $valor_parcela;
			// Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
			$valor_cobrado = str_replace(",", ".", $valor_cobrado);
			$valor_boleto = number_format($valor_cobrado + $taxa_boleto, 2, ',', '');

			$dadosboleto["nosso_numero"] = "000000000";
			// Nosso numero sem o DV - REGRA: Máximo de 11 caracteres!
			$dadosboleto["numero_documento"] = $dadosboleto["nosso_numero"];
			// Num do pedido ou do documento = Nosso numero
			$dadosboleto["data_vencimento"] = $data_venc;
			// Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
			$dadosboleto["data_documento"] = date("d/m/Y");
			// Data de emissão do Boleto
			$dadosboleto["data_processamento"] = date("d/m/Y");
			// Data de processamento do boleto (opcional)
			$dadosboleto["valor_boleto"] = $valor_boleto;
			$valor_final = $dadosboleto["valor_boleto"];
			// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

			// DADOS DO SEU CLIENTE
			$dadosboleto["sacado"] = $nome;
			$dadosboleto["endereco1"] = $email;
			$dadosboleto["endereco2"] = "Cidade - Estado -  CEP: 00000-000";

			// INFORMACOES PARA O CLIENTE
			$dadosboleto["demonstrativo1"] = "Pagamento de parcela do Instituto Sequencial";
			$dadosboleto["demonstrativo2"] = "Mensalidade referente ao mês de : " . date("m/Y	") . "
<br>Taxa bancária - R$ " . number_format($taxa_boleto, 2, ',', '');
			$dadosboleto["demonstrativo3"] = "Instituto Sequencial - http://www.sequencialctp.com.br";
			$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
			$dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
			$dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: financeiro@sequencialctp.com.br";
			$dadosboleto["instrucoes4"] = "&nbsp;";

			// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
			$dadosboleto["quantidade"] = "001";
			$dadosboleto["valor_unitario"] = $valor_boleto;
			$dadosboleto["aceite"] = "";
			$dadosboleto["especie"] = "R$";
			$dadosboleto["especie_doc"] = "DS";

			// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //

			// DADOS DA SUA CONTA - Bradesco
			$dadosboleto["agencia"] = "1100";
			// Num da agencia, sem digito
			$dadosboleto["agencia_dv"] = "0";
			// Digito do Num da agencia
			$dadosboleto["conta"] = "0102003";
			// Num da conta, sem digito
			$dadosboleto["conta_dv"] = "4";
			// Digito do Num da conta

			// DADOS PERSONALIZADOS - Bradesco
			$dadosboleto["conta_cedente"] = "0102003";
			// ContaCedente do Cliente, sem digito (Somente Números)
			$dadosboleto["conta_cedente_dv"] = "4";
			// Digito da ContaCedente do Cliente
			$dadosboleto["carteira"] = "06";
			// Código da Carteira: pode ser 06 ou 03

			// SEUS DADOS
			$dadosboleto["identificacao"] = "Instituto Sequencial";
			$dadosboleto["cpf_cnpj"] = "";
			$dadosboleto["endereco"] = "Rua Dr. Bacelar, 173 - 3º Andar, Vila Clementino";
			$dadosboleto["cidade_uf"] = "São Paulo / SP";
			$dadosboleto["cedente"] = "Instituto Educacional Sequencial Ltda EPP";

			$vns = 1;

			include("include/funcoes_bradesco.php");
			// NÃO ALTERAR!

			for ($j = 01; $j <= ($parcelas); $j++) {
				
				$nome = $nome;
				$dadosboleto["numero_documento"] = $dadosboleto["nosso_numero"];
				$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400 * $j));
				$date1 = str_replace("/","-",$data_venc);
			    $data_db=date("Y-m-d",strtotime($date1));
				$dadosboleto["data_vencimento"] = $data_venc;
				$dadosboleto["valor_boleto"] = number_format(($valor_cobrado + $taxa_boleto), 2, ',', '.');
				$valor_boleto = $dadosboleto["valor_boleto"];
				$dadosboleto["num_parcela"] = $j;
				
				
				echo "<h3>$j";
				echo "/";
				echo "$parcelas";
				echo " $valor_boleto";
				echo " $data_venc ";
				echo " $cpf ";
				echo " $nome";
				echo "$select</h3>";
				
				$saver = "INSERT IGNORE INTO boletos_renego (parcela, total_parc, valor_parc, cpf, nome_recibo, data_venc) 
		VALUES(" . $j . "," . $parcelas . ", " . number_format(($valor_cobrado + $taxa_boleto), 2, '', '') . ",  $cpf, '$nome', '$data_db')
		";
				
				if (mysql_query($saver)) {
					mysql_query("UPDATE alunos_inativos SET ativo='S'WHERE nome='$nome'");
					echo "
					<body class='wrapper'>
					<link href='css/style.css' media='all' rel='Stylesheet' type='text/css' />
					
					<form class='form-last' action='boleto.php' type='POST' target=_blank>
    					<input type='submit' name='bol_ger' value='Gerar Boleto!' />
    					<input type='hidden' id='aluno' style='text-align:left' 
			name='nome' value= '" . $nome . "' readonly>
						<input type='hidden' id='aluno' style='text-align:left' 
			name='data_venc' value= " . $data_venc . " readonly>
			<input type='hidden' id='aluno' style='text-align:left' 
			name='valor_boleto' value= " . $valor_boleto . " readonly>
			<input type='hidden' id='position' style='text-align:left' 
			name='position' value= " . $j . " readonly>
    					</form>
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
				} else {
					echo "ERROR: Could not able to execute $saver. " . mysql_error($saver);
				}
				if ($j == $parcelas) {
					
			}
		}
			//termina aqui

	}

};
	
}


?>
	
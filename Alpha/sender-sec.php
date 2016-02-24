<?php session_start();
error_reporting('all');
ini_set('max_execution_time', 3);
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
include 'connection2.php';
$cpf = $_SESSION['cpf'];
$selected = mysql_select_db("inativos", $dbhandle) or die("Não chegou a selecionar o BD");
$result_sec = mysql_query("SELECT * FROM boletos_renego WHERE cpf=". $cpf ."");
if (@mysql_num_rows($result_sec) > 0) {
	while ($row = mysql_fetch_array($result_sec)) {
		$parcelas = $row{'total_parc'};
		$valor_total = $row{'valor_parc'};
		$data_venc = $row{'data_venc'};
		$valor_total = $valor_total;
		$nome = $row{'nome_recibo'};
		//echo "recebido ".$nome. " ".$valor_total." ".$telefone." ".$valor_parcela."  ".$email."";
		// DADOS DO BOLETO PARA O SEU CLIENTE
		$data_venc = $row{'data_venc'};
		// Prazo de X dias OU informe data: "13/04/2006";
		$valor_cobrado = $valor_total;
		// Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
		$valor_cobrado = str_replace(",", ".", $valor_cobrado);
		$valor_boleto = $row{'valor_parc'};
		$taxa_boleto= 0;
		$dadosboleto["nosso_numero"] = $row{'codigo'};
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
		//$dadosboleto["endereco1"] = $email;
		$dadosboleto["endereco2"] = "Cidade - Estado -  CEP: 00000-000";

		// INFORMACOES PARA O CLIENTE
		$dadosboleto["demonstrativo1"] = "Pagamento de parcela do Instituto Sequencial";
		$dadosboleto["demonstrativo2"] = "Mensalidade referente ao mês de : " . date("m/Y	") . "
		";
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
		$sql=mysql_query("SELECT * FROM boletos_renego WHERE cpf=".$cpf." AND nome_recibo='$nome'");
		
		$row_count=mysql_num_rows($sql);
		for ($j = 01; $j <= ($row_count); $j++) {
			
			while ($row_2 = mysql_fetch_array($sql)) {
			$nome = $nome;
			$dadosboleto["numero_documento"] = $dadosboleto["nosso_numero"];
			$data_venc = $row_2{'data_venc'};
			$date1 = str_replace("-", "/", $row_2{'data_venc'});
			$data_db = date('d/m/Y', strtotime($row_2{'data_venc'}));;
			$dadosboleto["data_vencimento"] = $row_2{'data_venc'};
			$dadosboleto["valor_boleto"] = number_format(($row_2{'valor_parc'}/100),2,',','.');
			$valor_boleto = $dadosboleto["valor_boleto"];
			$dadosboleto["num_parcela"] = $j;
			
			echo "$cpf ";
			echo $row_2{'parcela'};
			echo "/";
			echo $row_2{'total_parc'};
			//	echo date('d/m/Y', strtotime($data_venc));
			echo " ".$data_db." ";
			echo $row_2{'nome_recibo'};
			echo " ".$dadosboleto["valor_boleto"]." ";
			
			if (($sql)) {
				
				echo "
					<body class='wrapper'>
					<link href='css/style.css' media='all' rel='Stylesheet' type='text/css' />
					
					<form class='form' action='boleto.php' type='POST' target=_blank>
    					<input type='submit' name='bol_ger' value='Gerar Boleto!' />
    					<input type='hidden' id='aluno' style='text-align:left' 
			name='nome' value= '" . $nome . "' readonly>
						<input type='hidden' id='aluno' style='text-align:left' 
			name='data_venc' value= " . $data_db. " readonly>
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
				echo "ERROR: Could not able to execute $saver. " . mysql_error($sql);
			}
			}
			echo "<p class='quebra-aqui'>&nbsp;</p>";

			if ($j == $parcelas) {
				
				die();
			}
		}

	}

}
?>
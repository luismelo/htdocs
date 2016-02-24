<?php
session_start();
include 'connection.php';
$selected = mysql_select_db("inativos", $dbhandle) or die("Não chegou a selecionar o BD");

$nome = $_REQUEST["nome"];
$data_venc = $_REQUEST['data_venc'];
$valor_parc = $_REQUEST['valor_boleto'];
$position= $_REQUEST['position'];
//echo " $position";

//echo $data_venc;
$sql="SELECT codigo FROM boletos_renego WHERE parcela=$position AND nome_recibo='$nome'";
				$result = mysql_query($sql) or die(mysql_error());
				while($row = mysql_fetch_array($result)) {
					//echo $row{'codigo'};
				
// DADOS DO BOLETO PARA O SEU CLIENTE
//$dias_de_prazo_para_pagamento = 5;
$taxa_boleto = 2.95;
$data_venc = $data_venc;
// Prazo de X dias OU informe data: "13/04/2006";
$valor_cobrado = $valor_parc;
// Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".", $valor_cobrado);
//$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

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
$dadosboleto["valor_boleto"] = $valor_parc;
// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $nome;
$dadosboleto["endereco1"] = "";
$dadosboleto["endereco2"] = "";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "";
$dadosboleto["demonstrativo2"] = "Mensalidade referente a ".$data_venc."<br>Taxa bancária - R$ " . number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "Instituto de ensino Sequencial";
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
$dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
$dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: financeiro@sequencialctp.com.br";
$dadosboleto["instrucoes4"] = "";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "001";
$dadosboleto["valor_unitario"] = $valor_parc;
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
$dadosboleto["identificacao"] = "Instituto de ensino Sequencial";
$dadosboleto["cpf_cnpj"] = "";
$dadosboleto["endereco"] = "Rua Dr. Bacelar, 173 - 3º andar";
$dadosboleto["cidade_uf"] = "São Paulo / SP";
$dadosboleto["cedente"] = "Instituto Sequencial";

// NÃO ALTERAR!
@include ("include/funcoes_bradesco.php");
include ("include/layout_bradesco.php");
	
	}
?>
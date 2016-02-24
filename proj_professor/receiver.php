<?php
@session_start();
include "connection.php";
//Bloco de dados pessoais
@$name = $_REQUEST['name'];
@$born_date = $_REQUEST['born_date'];
@$age = $_REQUEST['age'];
@$state = $_REQUEST['estados'];
@$city = $_REQUEST['cidades'];
@$rg = $_REQUEST['rg'];
@$rg_date = $_REQUEST['rg_date'];
@$rg_org = $_REQUEST['rg_org'];
@$cpf = $_REQUEST['cpf'];
@$email = $_REQUEST['email'];
@$gender = $_REQUEST['gender'];
@$bank = $_REQUEST['bank'];
@$kids = $_REQUEST['kids'];
@$kids_num = $_REQUEST['kids_num'];
@$street = $_REQUEST['street'];
@$street_num = $_REQUEST['street_num'];
@$cep = $_REQUEST['cep'];
@$hood = $_REQUEST['hood'];
@$town = $_REQUEST['town'];
@$phone = $_REQUEST['phone'];
@$cellphone = $_REQUEST['cellphone'];

//Bloco de Registro Profissional
$concil = $_REQUEST['concil'];
$reg_num = $_REQUEST['reg_num'];
$reg_uf = $_REQUEST['reg_uf'];

//Dados acadêmicos
@$course = $_REQUEST['course'];
@$sch_level = $_REQUEST['sch_level'];
@$sch_end = $_REQUEST['sch_end'];
@$sch_dip_check = $_REQUEST['sch_dip_check'];
@$info_res = $_REQUEST['info_res'];

//Experiência como professor
$teach_xp_check = $_REQUEST['teach_xp_check'];
$teach_xp_job = $_REQUEST['teach_xp_job'];
$teach_xp_time = $_REQUEST['teach_xp_time'];
$teach_xp_ref = $_REQUEST['teach_xp_ref'];
$teach_xp_phone = $_REQUEST['teach_xp_phone'];

//Experiência em outras áreas
$no_teach_xp_check = $_REQUEST['no_teach_xp_check'];
$no_teach_xp_job = $_REQUEST['no_teach_xp_job'];
$no_teach_xp_time = $_REQUEST['no_teach_xp_time'];
$no_teach_xp_ref = $_REQUEST['no_teach_xp_ref'];
$no_teach_xp_phone = $_REQUEST['no_teach_xp_phone'];

//Bloco de disponibilidade
@$disp = $_REQUEST['disp'];
@$unid = $_REQUEST['unid'];
//recebe o array de disponibilidade
if (isset($disp)) {
	echo "$sch_level ";
	echo "$rg_org";
	echo "<br/>";
//transforma o array em variaveis para guardar no bd
	foreach ($disp as $value)
	if($value = "seg-m"){
		$valuesegm = $value;
	}
	if($value = "seg-n"){
		$valuesegn = $value;
	}
	if($value = "ter-m"){
		$valueterm = $value;
	}
	if($value = "ter-n"){
		$valuetern = $value;
	}
	if($value = "qua-m"){
		$valuequam = $value;
	}
	if($value = "qua-n"){
		$valuequan = $value;
	}
	if($value = "qui-m"){
		$valuequim = $value;
	}
	if($value = "qui-n"){
		$valuequin = $value;
	}
	if($value = "sex-m"){
		$valuesexm = $value;
	}
	if($value = "sex-n"){
		$valuesexn = $value;
	}
	if($value = "sab-m"){
		$valuesabm = $value;
	}
	if($value = "sab-n"){
		$valuesabn = $value;
	}

		echo "<b>Disponível	: </b>" . $value . "</br>";
	  mysql_query("INSERT INTO disponibilidade(segunda_feira_manha, segunda_feira_noite, terca_feira_manha,terca_feira_noite, quarta_feira_manha,quarta_feira_noite,quinta_feira_manha,quinta_feira_noite,sexta_feira_manha,sexta_feira_noite,sabado_manha,sabado_noite)
	   VALUES ('$valuesegm','$valuesegn','$valueterm', '$valuetern','$valuequam', '$valuequan', '$valuequim','$valuequin', '$valuesexm','$valuesexn', '$valuesabm', '$valuesabn')") or die('Error: ' . mysql_error());
}
if (isset($unid)) {
	echo "</br>";
	foreach ($unid as $valueu)
		echo "<b>Trabalhou na unidade: </b>" . $valueu . "</br>";
}

$SQL = "INSERT INTO professor_cadastro (nome, data_nascimento, idade, estado, cidade, nr_rg, rg_emi, org_rg, cpf, email, genero,
 cc_brad, filhos, nr_filhos, endereco, nr_casa, cep, bairro, cidade_endereco, telefone, celular,
 conselho, nr_conselho, uf_conselho,
 curso, grau_escolaridade, ano_conclu, chk_diplomas, obs_info,
 exp_prof, nome_Inst_prof, tempo_prof, referencia_prof, telefone_referencia_prof,
 exp_outros, nome_Inst_outros, tempo_outros, referencia_outros, telefone_referencia_outros
 )
  VALUES ('$name','$born_date','$age','$state','$city', '$rg' , '$rg_date','$rg_org','$cpf','$email','$gender', 
 '$bank','$kids','$kids_num','$street','$street_num','$cep','$hood','$town','$phone','$cellphone',
 '$concil', '$reg_num', '$reg_uf',
 '$course', '$sch_level', '$sch_end', '$sch_dip_check', '$info_res',
 '$teach_xp_check', '$teach_xp_job', '$teach_xp_time', '$teach_xp_ref', '$teach_xp_phone',
 '$no_teach_xp_check', '$no_teach_xp_job', '$no_teach_xp_time', '$no_teach_xp_ref', '$no_teach_xp_phone'
 )";

mysql_query($SQL) or die("Não enviou os dados para o BD baseado no erro: " . mysql_error());
?>
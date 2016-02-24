<?php
session_start()
?>
<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html">
		<title>Professor, venha fazer parte da equipe Sequencial!</title>
		<meta name="author" content="Jake Rocheleau">
		<link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
		<link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
		<link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
		<script type="text/javascript" src="js/switchery.min.js"></script>
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

	</head>
	<script type="text/javascript">
		$(document).ready(function() {

			$.getJSON('estados_cidades.json', function(data) {

				var items = [];
				var options = '<option value="">Escolha um estado</option>';

				$.each(data, function(key, val) {
					options += '<option value="' + val.nome + '">' + val.nome + '</option>';
				});
				$("#estados").html(options);

				$("#estados").change(function() {

					var options_cidades = '';
					var str = "";

					$("#estados option:selected").each(function() {
						str += $(this).text();
					});

					$.each(data, function(key, val) {
						if (val.nome == str) {
							$.each(val.cidades, function(key_city, val_city) {
								options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
							});
						}
					});

					$("#cidades").html(options_cidades);

				}).change();

			});

		});

	</script>
	<body>
		<div id="wrapper">

			<h1>Preencha seus dados pessoais:</h1>
<!-- Início dos dados pessoais -->
			<form id="form-pers" action="receiver.php" method="post">
				<div class="col-2">
					<label> Nome
						<input placeholder="Digite seu nome completo"  name="name" tabindex="1">
					</label>
				</div>
				<div class="col-5">
					<label> Data de Nascimento
						<input type="date" placeholder="Qual sua idade?" name="born_date" style="size: auto;"tabindex="2">
					</label>
				</div>
				<div class="col-5">
					<label> Idade
						<input placeholder="Qual sua idade?" name="age" style="size: 20px;" tabindex="6">
					</label>
				</div>
				<div class="col-4">
					<label> Local de Nascimento
						<select tabindex="4" id="estados" name="estados">
							<option value=""></option>
						</select> </label>
				</div>
				<div class="col-4">
					<label>
						<select tabindex="4" id="cidades" name="cidades">
							<option value=""></option>
						</select> </label>
				</div>
				<div class="col-4">
					<label> RG
						<input placeholder="Digite seu RG" name="rg" tabindex="6">
					</label>
				</div>
				<div class="col-4">
					<label> Data de Emissão
						<input type="date" name="rg_date"  tabindex="6">
					</label>
				</div>
				<div class="col-4">
					<label> Orgão Emissor
						<input type="text" placeholder="Digite o orgão emissor" name="rg_org"  tabindex="6">
					</label>
				</div>
				<div class="col-5">
					<label> CPF
						<input placeholder="Digite seu CPF" name="cpf" name="cpf" tabindex="7">
					</label>
				</div>

				<div class="col-4">
					<label> Email
						<input placeholder="Digite seu email" name="email" name="email" tabindex="4">
					</label>
				</div>
				<div class="col-4">
					<label> Sexo
						<select tabindex="5" name="gender" >
							<option>Selecione</option>
							<option>Masculino</option>
							<option>Feminino</option>
						</select> </label>
				</div>

				<div class="col-4">
					<label>Possui conta Bradesco?</label>
					<center style="position:relative; margin-bottom:8px;">
						<input name="bank" type="checkbox" class="js-switch">
					</center>
				</div>
				<div class="col-4 switch">
					<label>Tem filhos?</label>
					<center style="position:relative;margin-bottom:8px;">
						<input name="kids" type="checkbox" class="js-switch">
					</center>
				</div>
				<div class="col-2">
					<label> Caso possua filhos, diga-nos quantos:
						<select name="kids_num" tabindex="5">
							<option>Selecione</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5 ou mais</option>
						</select> </label>
				</div>
				<div class="col-4">
					<label> Endereço
						<input placeholder="Digite seu endereço" name="street" name="street" tabindex="1">
					</label>
				</div>
				<div class="col-5">
					<label> Número
						<input placeholder="Digite o número" name="street_num" name="street" tabindex="1">
					</label>
				</div>
				<div class="col-4">
					<label> CEP
						<input placeholder="Digite o CEP" name="cep" name="street" tabindex="1">
					</label>
				</div>
				<div class="col-5">
					<label> Bairro
						<input placeholder="Digite o bairro" name="hood" name="street" tabindex="1">
					</label>
				</div>
				<div class="col-3">
					<label> Cidade
						<input placeholder="Digite a cidade" name="town" name="street" tabindex="1">
					</label>
				</div>
				<div class="col-3">
					<label> Telefone residencial
						<input placeholder="Digite o telefone residencial" name="phone" name="phone" tabindex="3">
					</label>
				</div>
				<div class="col-3">
					<label> Telefone celular
						<input placeholder="Digite o telefone celular" name="cellphone" tabindex="3">
					</label>
				</div>
				<!-- Fim dados pessoais -->
				<!-- Inicio Registro -->
			<div class="col-full">
			<h1>Registro Profissional:</h1>
			</div>
			
				<div class="col-2">
					<label> Pertence à algum conselho ou ordem?
						<select name="concil" tabindex="5">
							<option>Selecione</option>
							<option>COREN</option>
							<option>CRTR</option>
							<option>CREA</option>
							<option>MTE</option>
							<option>Outro orgão</option>
							<option>Não pertenço à nenhuma ordem ou conselho</option>
						</select> </label>
				</div>
				<div class="col-5">
					<label> Número do registro (caso haja):
						<input placeholder="Digite o nº do registro" name="reg_num" name="reg_num" tabindex="1">
					</label>
				</div>
				<div class="col-5">
					<label>UF
						<select name="reg_uf" tabindex="5">
							<option value="0">Selecione o Estado</option>
							<option value="ac">Acre</option>
							<option value="al">Alagoas</option>
							<option value="ap">Amapá</option>
							<option value="am">Amazonas</option>
							<option value="ba">Bahia</option>
							<option value="ce">Ceará</option>
							<option value="df">Distrito Federal</option>
							<option value="es">Espirito Santo</option>
							<option value="go">Goiás</option>
							<option value="ma">Maranhão</option>
							<option value="ms">Mato Grosso do Sul</option>
							<option value="mt">Mato Grosso</option>
							<option value="mg">Minas Gerais</option>
							<option value="pa">Pará</option>
							<option value="pb">Paraíba</option>
							<option value="pr">Paraná</option>
							<option value="pe">Pernambuco</option>
							<option value="pi">Piauí</option>
							<option value="rj">Rio de Janeiro</option>
							<option value="rn">Rio Grande do Norte</option>
							<option value="rs">Rio Grande do Sul</option>
							<option value="ro">Rondônia</option>
							<option value="rr">Roraima</option>
							<option value="sc">Santa Catarina</option>
							<option value="sp">São Paulo</option>
							<option value="se">Sergipe</option>
							<option value="to">Tocantins</option>
						</select> </label>
				</div>
			
			<div class="col-full">
				<!--Fim do Registro-->
				<!-- Formação Escolar -->
			<h1>Formação Escolar:</h1>
			</div>
				<div class="col-2">
					<label> Curso:
						<input placeholder="Digite o nome do curso" name="course" tabindex="1">
					</label>
				</div>
				<div class="col-4">
					<label> Nível:
						<select name="sch_level">
							<option value="0">Nível</option>
							<option value="Técnico">Técnico</option>
							<option value="Tecnólogo 2 anos">Tecnólogo 2 anos</option>
							<option value="Superior Incompleto">Superior Incompleto</option>
							<option value="Superior Completo">Superior Completo</option>
							<option value="Superior com Licenciatura">Superior com Licenciatura</option>
							<option value="Mestrado Incompleto">Mestrado Incompleto</option>
							<option value="Mestrado Completo">Mestrado Completo</option>
							<option value="Doutorado Incompleto">Doutorado Incompleto</option>
							<option value="Doutorado Completo">Doutorado Completo</option>
						</select> </label>
				</div>
				<div class="col-5">
					<label> Ano de conclusão:
						<input placeholder="Ano" name="sch_end" maxlength="4" tabindex="1">
					</label>
				</div>
				<div class="col-submit">
					<button onclick="#" class="submitbtn" name="more_sch">
						Clique aqui para adicionar mais cursos!
					</button>
				</div>
			
				<div class="col-4">
					<label> Possui diplomas dos cursos informados acima?
						<select name="sch_dip_check">
							<option value="0">Selecione</option>
							<option value="Sim">Sim</option>
							<option value="Não">Não</option>
							<option value="Trancado">Trancado</option>
						</select> </label>
				</div>
				
				<div class="col-2">
					<label style="height: 121px">Quais os seus conhecimentos em informática? 		
<textarea name="info_res" cols="50" rows="4" wrap="soft">Conte-nos um pouco dos seus conhecimentos em informática.</textarea> </label>
				</div>
				<!-- FIm da Formação Escolar -->
				<!-- Inicio da Experiencia como professor -->
			<div class="col-full">
			<h1>Atividades Profissionais Relacionadas ao Ensino:</h1>
			</div>
				<div class="col-4">
					<label> Já trabalhou como professor, instrutor ou palestrante?
						<select name="teach_xp_check">
							<option value="0">Selecione</option>
							<option value="Sim">Sim</option>
							<option value="Não">Não</option>

						</select> </label>
				</div>
				<div class="col-2">
					<label>
						<p>
							Caso "Sim", preencher com suas experiências no ensino:
						</p>
						<input class="void" />
					</label>
				</div>
				<div class="col-3">
					<label> Nome da instituição:
						<input placeholder="Digite o nome da instituição" name="teach_xp_job" tabindex="1">
					</label>
				</div>
				<div class="col-4">
					<label> Tempo na empresa:
						<select name="teach_xp_time">
							<option value="0">Selecione</option>
							<option value="Menos de 1 ano">Menos de 1 ano</option>
							<option value="2 a 4 anos">2 a 4 anos</option>
							<option value="5 a 10 anos">5 a 10 anos</option>
							<option value="Mais de 10 anos">Mais de 10 anos</option>

						</select> </label>
				</div>
				<div class="col-5">
					<label> Referência:
						<input placeholder="Referência" name="teach_xp_ref" tabindex="1">
					</label>
				</div>
				<div class="col-5">
					<label> Telefone para contato:
						<input placeholder="Digite o telefone" name="teach_xp_phone" tabindex="1">
					</label>
				</div>
				<div class="col-submit">
					<button class="submitbtn" name="more_teach_xp">
						Clique aqui para adicionar mais experiência!
					</button>
				</div>
				<!-- Fim da Experiencia como professor -->
				<!-- Inicio da Experiencia na área -->
			<div class="col-full">
			<h1>Experiência Profissional:</h1>
			</div>
				<div class="col-4">
					<label> Já trabalhou na sua área de formação?
						<select name="no_teach_xp_check">
							<option value="0">Selecione</option>
							<option value="Sim">Sim</option>
							<option value="Não">Não</option>

						</select> </label>
				</div>
				<div class="col-2">
					<label>
						<p>
							Caso "Sim", preencher com suas experiências comprovadas (carteira assinada):
						</p>
						<input class="void" />
					</label>
				</div>
				<div class="col-3">
					<label> Nome da instituição:
						<input placeholder="Digite o nome da instituição" name="no_teach_xp_job" tabindex="1">
					</label>
				</div>
				<div class="col-4">
					<label> Tempo na empresa:
						<select name="no_teach_xp_time">
							<option value="0">Selecione</option>
							<option value="Menos de 1 ano">Menos de 1 ano</option>
							<option value="2 a 4 anos">2 a 4 anos</option>
							<option value="5 a 10 anos">5 a 10 anos</option>
							<option value="Mais de 10 anos">Mais de 10 anos</option>

						</select> </label>
				</div>
				<div class="col-5">
					<label> Referência:
						<input placeholder="Referência" name="no_teach_xp_ref" tabindex="1">
					</label>
				</div>
				<div class="col-5">
					<label> Telefone para contato:
						<input placeholder="Digite o telefone" name="no_teach_xp_phone" tabindex="1">
					</label>
				</div>
				<div class="col-submit">
					<button class="submitbtn" name="more_no_teach_xp">
						Clique aqui para adicionar mais experiência!
					</button>
				</div>
			<div class="col-full">
				<!-- Fim da Experiencia na área -->
			<h1>Disponibilidade de Horário:</h1>
			</div>

				<label>
					<style type="text/css">
						.tg {
							border-collapse: collapse;
							border-spacing: 0;
							border-color: #aabcfe;
							margin: 0px auto;
						}
						.tg td {
							font-family: Arial, sans-serif;
							font-size: 14px;
							padding: 10px 5px;
							border-style: solid;
							border-width: 1px;
							overflow: hidden;
							word-break: normal;
							border-color: #aabcfe;
							color: #669;
							background-color: #e8edff;
							vertical-align: center;
							text-align: center;
							vertical-align: middle;
						}
						.tg th {
							font-family: Arial, sans-serif;
							font-size: 14px;
							font-weight: normal;
							padding: 10px 5px;
							border-style: solid;
							border-width: 1px;
							overflow: hidden;
							word-break: normal;
							border-color: #aabcfe;
							color: #039;
							background-color: #b9c9fe;
						}
						.tg .tg-yw4l {
							vertical-align: top
						}
						.tg .tg-6k2t {
							background-color: #D2E4FC;
							text-align: center;
							vertical-align: middle;
						}
					</style>
					<table class="tg">
						<tr>
							<th style="background: transparent; border: 0"></th>

							<th class="tg-yw4l">Segunda-Feira</th>
							<th class="tg-yw4l">Terça-Feira</th>
							<th class="tg-yw4l">Quarta-Feira</th>
							<th class="tg-yw4l">Quinta-Feira</th>
							<th class="tg-yw4l">Sexta-Feira</th>
							<th class="tg-yw4l">Sábado</th>
						</tr>
						<tr>
							<td class="tg-6k2t">Manhã</td>
							<td class="tg-6k2t">
							<input type="checkbox" name="disp[]" value="seg-m" >
							</td>
							<td class="tg-6k2t">
							<input type="checkbox" name="disp[]" value="ter-m">
							</td>
							<td class="tg-6k2t">
							<input type="checkbox" name="disp[]" value="qua-m">
							</td>
							<td class="tg-6k2t">
							<input type="checkbox" name="disp[]" value="qui-m">
							</td>
							<td class="tg-6k2t">
							<input type="checkbox" name="disp[]" value="sex-m">
							</td>
							<td class="tg-6k2t">
							<input type="checkbox" name="disp[]" value="sab-m">
							</td>
						</tr>
						<tr>
							<td class="tg-yw4l">Noite</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="disp[]" value="seg-n">
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="disp[]" value="ter-n" >
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="disp[]" value="qua-n" >
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="disp[]" value="qui-n" >
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="disp[]" value="sex-n" >
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="disp[]" value="sab-n" >
							</td>
						</tr>
					</table> </label>
			
			
				<div class="col-5">
					<label> Já trabalhou na sequencial?
						<select name="past_check">
							<option value="0">Selecione</option>
							<option value="Sim">Sim</option>
							<option value="Não">Não</option>
						</select> </label>

				</div>
				<div class="col-4">
					<label> Se "Sim", marque a unidade(s) que já trabalhou:
						<input class="void" />
					</label>
				</div>
				<div class="col-2" >

					<style type="text/css">
						.tg {
							border-collapse: collapse;
							border-spacing: 0;
							border-color: #aabcfe;
						}
						.tg td {
							font-family: Arial, sans-serif;
							font-size: 14px;
							border-style: solid;
							border-width: 0px;
							overflow: hidden;
							word-break: normal;
							border-color: #aabcfe;
							color: #669;
							background-color: #e8edff;
						}
						.tg th {
							font-family: Arial, sans-serif;
							font-size: 14px;
							font-weight: normal;
							border-style: solid;
							border-width: 0px;
							overflow: hidden;
							word-break: normal;
							border-color: #aabcfe;
							color: #039;
							background-color: #b9c9fe;
						}

					</style>
					<table class="tg">
						<tr>
							<th class="tg-yw4l">Unidade 1</th>
							<th class="tg-yw4l">Unidade 2</th>
							<th class="tg-yw4l">Unidade 3</th>
							<th class="tg-yw4l">Unidade 4</th>
						</tr>
						<tr>
							<td class="tg-031e">
							<input type="checkbox" name="unid[]" value="unidade 1">
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="unid[]" value="unidade 2">
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="unid[]" value="unidade 3">
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="unid[]" value="unidade 4">
							</td>
						</tr>
					</table>
				</div>

				<div class="col-5">
					<label> Possui parente na empresa?
						<select name="past_check_family">
							<option value="0">Selecione</option>
							<option value="Sim">Sim</option>
							<option value="Não">Não</option>
						</select> </label>
				</div>
				<div class="col-4">
					<label> Se "Sim", qual em setor?
						<input placeholder="Digite o setor" name="past_check_sector" tabindex="1">
					</label>
				</div>
				<div class="col-4">
					<label> O que te motiva a lecionar?
						<input placeholder="Conte-nos sua motivação" name="past_check_will" tabindex="1">
					</label>
				</div>
			
			<div class="col-submit" style="font-size: 22px; color: #05123B">
				<input type="checkbox"  required="required"/>
				Afirmo que as informações acima são verdadeiras, sob pena de desqualificação da seleção caso haja alguma informação falsa ou contraditória.

			</div>
				<div class="col-submit">
					<button id="submit" name="submit" class="submitbtn">
						Prosseguir
					</button>

					<script type="text/javascript">
						var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

						elems.forEach(function(html) {
							var switchery = new Switchery(html);
						});
					</script>
			</form>

		</div>
	</body>
</html>
<?php

//Dados pessoais guardados em sessão!
@$_SESSION['name'];
@$_SESSION['born_date'];
@$_SESSION['age'];
@$_SESSION['estados'];
@$_SESSION['cidades'];
@$_SESSION['rg'];
@$_SESSION['rg-date'];
@$_SESSION['rg-org'];
@$_SESSION['cpf'];
@$_SESSION['email'];
@$_SESSION['gender'];
@$_SESSION['bank'];
@$_SESSION['kids'];
@$_SESSION['kids-num'];
@$_SESSION['street'];
@$_SESSION['street-num'];
@$_SESSION['cep'];
@$_SESSION['hood'];
@$_SESSION['town'];
@$_SESSION['phone'];
@$_SESSION['cellphone'];
@$_SESSION['name_test'];

//Dados de registro de ordem guardados em sessão!
@$_SESSION['concil'];
@$_SESSION['reg_num'];
@$_SESSION['reg_uf'];

//Dados acadêmicos
@$_SESSION['course'];
@$_SESSION['sch_level'];
@$_SESSION['sch_end'];
@$_SESSION['sch_dip_check'];
@$_SESSION['info_res'];

//Experiência como professor
@$_SESSION['teach_xp_check'];
@$_SESSION['teach_xp_job'];
@$_SESSION['teach_xp_time'];
@$_SESSION['teach_xp_ref'];
@$_SESSION['teach_xp_phone'];

//Experiência em outras áreas
@$_SESSION['no_teach_xp_check'];
@$_SESSION['no_teach_xp_job'];
@$_SESSION['no_teach_xp_time'];
@$_SESSION['no_teach_xp_ref'];
@$_SESSION['no_teach_xp_phone'];

//Ultimas opções
@$_SESSION['past_check'];
@$_SESSION['past_check_family'];
@$_SESSION['past_check_sector'];
@$_SESSION['past_check_will'];
?>

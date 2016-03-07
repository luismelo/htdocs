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
		<link rel="shortcut icon" href="https://3.kekantoimg.com/hcy-L-mzakEnFnjJ4aaMw3p7fQQ=/300x300/s3.amazonaws.com/kekanto_pics/pics/427/1655427.jpg">
		<link rel="icon" href="https://3.kekantoimg.com/hcy-L-mzakEnFnjJ4aaMw3p7fQQ=/300x300/s3.amazonaws.com/kekanto_pics/pics/427/1655427.jpg">
		<link rel="stylesheet" type="text/css" media="all" href="css/style.css">
		
		<link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">

		<script type="text/javascript" src="js/switchery.min.js"></script>
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="js/jquery.radios-to-slider.js"></script>

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
	
			
			<!-- Início dos dados pessoais -->
			<form id="form-pers" class="sign-up" action="receiver.php" onsubmit="return checkForm(this);" method="post">
			<h1 class="sign-up-master">Professor! Venha fazer parte da nossa equipe!</h1>
			<h1 class="sign-up-title">Preencha seus dados pessoais:</h1>
					  Nome:
						<input class="sign-up-input" placeholder="Digite seu nome"  name="name" tabindex="1">
					 
				
					  Sobrenome:
						<input placeholder="Digite seu sobrenome"  class="sign-up-input" name="last_name" tabindex="1">
					 
					
					  CPF (Será seu usuário):
						<input type="number" class="sign-up-input" placeholder="Digite seu CPF" name="cpf" required="required" tabindex="7">
					 
				
				
					<script>
						function submitBday() {
    var Q4A = "";
    var Bdate = document.getElementById('bday').value;
    var Bday = +new Date(Bdate);
    Q4A += ~~ ((Date.now() - Bday) / (31557600000));
    var theBday = document.getElementById('resultBday').value = Q4A;
    theBday.innerHTML = Q4A;
}
					</script>
					  Data de Nascimento:
						<input type="date" class="sign-up-input" placeholder="Qual sua idade?" id="bday" onchange="submitBday()" name="born_date" style="size: auto;"tabindex="2">
					 
				  Idade:
						<input placeholder=""  class="sign-up-input" id="resultBday" name="age">
					 
				
					  Local de Nascimento:
						<select tabindex="4" id="estados" class="sign-up-input" name="estados">
							<option value=""></option>
						</select>  
					  Cidade:
						<select tabindex="4" id="cidades" class="sign-up-input" name="cidades">
							<option value=""></option>
						</select>  
			
					  RG:
						<input placeholder="Digite seu RG"  class="sign-up-input" name="rg" required="required" tabindex="6">
					 
				
					  Data de Emissão do RG:
						<input type="date" name="rg_date"  class="sign-up-input" tabindex="6">
					 
				
					  Orgão Emissor do RG:
						<input type="text" placeholder="Digite o orgão emissor" class="sign-up-input" name="rg_org"  tabindex="6">
					 
				
					  Crie uma senha:
						<input type="password" class="sign-up-input" placeholder="Crie uma senha"  required="required" name="pwd1" id="pwd1" name="pass" tabindex="7">
					 
				
					  Repita sua senha:
						<input type="password" class="sign-up-input" placeholder="Repita sua senha" required="required" name="pwd2" id="pwd2" name="pass2" tabindex="7">
					 
				
				<script type="text/javascript">
					//Utiliza função simples para checar se as senhas são compatíveis e dita as regras de geração;
					function checkForm(form) {
						if (form.cpf.value == "") {
							alert("Erro: CPF não pode ficar vazio!");
							form.cpf.focus();
							return false;
						}
						if (form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
							if (form.pwd1.value.length < 6) {
								alert("Erro: Senha deve possuir pelo menos 6 digitos!");
								form.pwd1.focus();
								return false;
							}
							if (form.pwd1.value == form.cpf.value) {
								alert("Erro: A senha deve ser diferente do CPF!");
								form.pwd1.focus();
								return false;
							}
							re = /[0-9]/;
							if (!re.test(form.pwd1.value)) {
								alert("Erro: Senha deve possuir pelo menos um número (0-9)!");
								form.pwd1.focus();
								return false;
							}
							re = /[a-z]/;
							if (!re.test(form.pwd1.value)) {
								alert("Erro: Senha deve possuir pelo menos uma letra minúscula! (a-z)!");
								form.pwd1.focus();
								return false;
							}

						} else {
							alert("Erro: As senhas devem ser iguais!");
							form.pwd1.focus();
							return false;
						}

						alert("Você completou seu cadastro parabéns!");
						return true;
					}

				</script>
				
					  Email
						<input placeholder="Digite seu email"  class="sign-up-input" name="email" required="required" name="email" tabindex="4">
					 
				
					  Sexo
						<select tabindex="5" class="sign-up-input" name="gender" >
							<option>Selecione</option>
							<option>Masculino</option>
							<option>Feminino</option>
						</select>  
				</div>

				<div>
					<p> Possui conta Bradesco? </p>
				
						<input name="bank" type="checkbox" class="js-switch">
					
				</div>
				</br>
				<div>
					<p> Tem filhos?</p> 
					
						<input name="kids" type="checkbox" class="js-switch">
					</br>
				</div>
				</br>
					  Caso possua filhos, diga-nos quantos:<br>
						<div id="radios">
    <input id="option1" name="num_kids"  type="radio" value="1">
    <label for="option1">1 

    <input id="option2" name="num_kids" type="radio" value="2">
    <label for="option2">2 

    <input id="option3" name="num_kids" type="radio" value="3">
    <label for="option3">3 

    <input id="option4" name="num_kids" type="radio" value="4">
    <label for="option4">4 

    <input id="option5" name="num_kids" type="radio" value="5+">
    <label for="option5">5 ou mais 
</div>
					<script>
  //  $(document).ready( function(){
        //$("#radios").radiosToSlider();
   // });
</script>
					  
			</br></br>
					  Endereço:
						<input class="sign-up-input"  placeholder="Digite seu endereço"  name="street" tabindex="1">
					 
				
					  Número:
						<input class="sign-up-input" placeholder="Digite o número" name="street_num" tabindex="1">
					 
				
					  CEP:
						<input class="sign-up-input" placeholder="Digite o CEP" name="cep" tabindex="1">
				
					  Bairro:
						<input  class="sign-up-input" placeholder="Digite o bairro" name="hood"  tabindex="1">
					 
				
					  Cidade:
						<input class="sign-up-input" placeholder="Digite a cidade" name="town"  tabindex="1">
					 
				
					  Telefone residencial:
						<input class="sign-up-input" placeholder="Digite o telefone residencial" name="phone" tabindex="3">
					 
				
					  Telefone celular:
						<input class="sign-up-input" placeholder="Digite o telefone celular" name="cellphone" tabindex="3">
					 
			
				<!-- Fim dados pessoais -->
				<!-- Inicio Registro -->
				</br>
				</br>
					<h1 class="sign-up-title" >Registro Profissional:</h1>
			
					  Pertence à algum conselho ou ordem?
						<select class="sign-up-input" name="concil" tabindex="5">
							<option>Selecione</option>
							<option>COREN</option>
							<option>CRTR</option>
							<option>CREA</option>
							<option>MTE</option>
							<option>Outro orgão</option>
							<option>Não pertenço à nenhuma ordem ou conselho</option>
						</select>  
				
					  Nº do registro (caso haja):
						<input class="sign-up-input" placeholder="Digite o nº do registro" name="reg_num" name="reg_num" tabindex="1">
					 
				
					 UF
						<select class="sign-up-input" name="reg_uf" tabindex="5">
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
						</select>  
				
				
					<!--Fim do Registro-->
					<!-- Formação Escolar -->
					</br></br>
					<h1 class="sign-up-title" >Formação Escolar:</h1>
				
					  Curso:
						<input class="sign-up-input" placeholder="Digite o nome do curso" name="course" tabindex="1">
					 
				
					  Nível:
						<select class="sign-up-input" name="sch_level">
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
						</select>  
				
					  Ano de conclusão:
						<input class="sign-up-input" placeholder="Ano" name="sch_end" maxlength="4" tabindex="1">
					 
				</div>
				<!--- <div class="">
					<button onclick="#" class="submitbtn" name="more_sch">
						Clique aqui para adicionar mais cursos!
					</button>
				</div> ---->

				
					  Possui diplomas dos cursos informados acima?
						<select class="sign-up-input" name="sch_dip_check">
							<option value="0">Selecione</option>
							<option value="Sim">Sim</option>
							<option value="Não">Não</option>
							<option value="Trancado">Trancado</option>
						</select>  
			

				
					<label style="height: auto">Quais os seus conhecimentos em informática? 					
				<textarea name="info_res" cols="60" rows="5" wrap="soft">Conte-nos um pouco dos seus conhecimentos em informática.</textarea>  
				
				<!-- FIm da Formação Escolar -->
				<!-- Inicio da Experiencia como professor -->
				</br></br></br>
					<h1 class="sign-up-title">Atividades Profissionais Relacionadas ao Ensino:</h1>
				
					  Já trabalhou como professor, instrutor ou palestrante?
						<select class="sign-up-input" name="teach_xp_check">
							<option value="0">Selecione</option>
							<option value="Sim">Sim</option>
							<option value="Não">Não</option>

						</select>  
				
						<h3>
							Caso "Sim", preencher com suas experiências no ensino:
						</h3>
					</br>
		
					  Nome da instituição:
						<input class="sign-up-input" placeholder="Digite o nome da instituição" name="teach_xp_job" tabindex="1">
					 
				
					  Tempo na empresa:
						<select class="sign-up-input"	 name="teach_xp_time">
							<option value="0">Selecione</option>
							<option value="Menos de 1 ano">Menos de 1 ano</option>
							<option value="2 a 4 anos">2 a 4 anos</option>
							<option value="5 a 10 anos">5 a 10 anos</option>
							<option value="Mais de 10 anos">Mais de 10 anos</option>

						</select>  
				
					  Referência:
						<input class="sign-up-input" placeholder="Referência" name="teach_xp_ref" tabindex="1">
					 
				
					  Telefone para contato:
						<input class="sign-up-input" placeholder="Digite o telefone" name="teach_xp_phone" tabindex="1">
					  
				</div><!-- <div class="col-submit">
					<button class="submitbtn" name="more_teach_xp">
						Clique aqui para adicionar mais experiência!
					</button>
				</div> -->
				<!-- Fim da Experiencia como professor -->
				<!-- Inicio da Experiencia na área -->
				</br></br>
					<h1 class="sign-up-title" >Experiência Profissional:</h1>
				
					  Já trabalhou na sua área de formação?
						<select class="sign-up-input" name="no_teach_xp_check">
							<option value="0">Selecione</option>
							<option value="Sim">Sim</option>
							<option value="Não">Não</option>

						</select>  
				
						<h3 >
							Caso "Sim", preencher com suas experiências comprovadas (carteira assinada):
						</h3>
						</br>
						
					 
				
					  Nome da instituição:
						<input class="sign-up-input" placeholder="Digite o nome da instituição" name="no_teach_xp_job" tabindex="1">
					 
				
					  Tempo na empresa:
						<select class="sign-up-input" name="no_teach_xp_time">
							<option value="0">Selecione</option>
							<option value="Menos de 1 ano">Menos de 1 ano</option>
							<option value="2 a 4 anos">2 a 4 anos</option>
							<option value="5 a 10 anos">5 a 10 anos</option>
							<option value="Mais de 10 anos">Mais de 10 anos</option>

						</select>  
				
					  Referência:
						<input class="sign-up-input" placeholder="Referência" name="no_teach_xp_ref" tabindex="1">
					 
				
					  Telefone para contato:
						<input class="sign-up-input" placeholder="Digite o telefone" name="no_teach_xp_phone" tabindex="1">
				
			<!--	<div class="col-submit">
					<button class="submitbtn" name="more_no_teach_xp">
						Clique aqui para adicionar mais experiência!
					</button>
			</div> -->
				
					<!-- Fim da Experiencia na área -->
					</br></br>
					<h1 class="sign-up-title">Disponibilidade de Horário:</h1>
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
							font-size:18px;
							color: white;
    						text-shadow:
    						-1px -1px 0 #000,
    						1px -1px 0 #000,
   							-1px 1px 0 #000,
    						1px 1px 0 #000; 
							vertical-align: top
						}
						.tg .tg-6k2t {
							font-size:18px;
							color: white;
    						text-shadow:
    						-1px -1px 0 #000,
    						1px -1px 0 #000,
   							-1px 1px 0 #000,
    						1px 1px 0 #000; 
							vertical-align: top;
							background-color: #82B1FF;
							text-align: center;
							vertical-align: middle;
						}
					</style>
					<table class="tg">
						<tr>
							<th style="background: transparent; border: 0"></th>
							<!--use os index do array para salvar no bd no próximo script -->
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
							<input type="checkbox" name="disp[0]" value="seg-manha" >
							</td>
							<td class="tg-6k2t">
							<input type="checkbox" name="disp[1]" value="ter-manha">
							</td>
							<td class="tg-6k2t">
							<input type="checkbox" name="disp[2]" value="qua-manha">
							</td>
							<td class="tg-6k2t">
							<input type="checkbox" name="disp[3]" value="qui-manha">
							</td>
							<td class="tg-6k2t">
							<input type="checkbox" name="disp[4]" value="sex-manha">
							</td>
							<td class="tg-6k2t">
							<input type="checkbox" name="disp[5]" value="sab-manha">
							</td>
						</tr>
						<tr>
							<td class="tg-yw4l">Noite</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="disp[6]" value="seg-noite">
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="disp[7]" value="ter-noite" >
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="disp[8]" value="qua-noite" >
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="disp[9]" value="qui-noite" >
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="disp[10]" value="sex-noite" >
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="disp[11]" value="sab-noite" >
							</td>
						</tr>
					</table>  
						</br>
						</br>
				
					  Já trabalhou na sequencial?
						<select class="sign-up-input" name="past_check">
							<option value="0">Selecione</option>
							<option value="Sim">Sim</option>
							<option value="Não">Não</option>
						</select>  

				
				
					<h3> Se "Sim", marque a unidade(s) que já trabalhou:
						
					</h3>
				
			

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
							<input type="checkbox" name="unid[0]" value="1">
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="unid[1]" value="2">
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="unid[2]" value="3">
							</td>
							<td class="tg-yw4l">
							<input type="checkbox" name="unid[3]" value="4">
							</td>
						</tr>
					</table>
				
					  Possui parente na empresa?
						<select class="sign-up-input" name="past_check_family">
							<option value="0">Selecione</option>
							<option value="Sim">Sim</option>
							<option value="Não">Não</option>
						</select>  
				
					  Se "Sim", qual em setor?
						<input class="sign-up-input" placeholder="Digite o setor" name="past_check_sector" tabindex="1">
					 
				
					  O que te motiva a lecionar?
						<input class="sign-up-input" placeholder="Conte-nos sua motivação" name="past_check_will" tabindex="1">
					 
				</div>
<center>
				<div class="col-submit" style="font-size: 22px; color: #000000">
					<input type="checkbox"  required="required"/>
					Afirmo que as informações acima são verdadeiras, sob pena de desqualificação da seleção caso haja alguma informação falsa ou contraditória.

				</div>
</br>
					</br>
				
					<button id="submit" name="submit" class="sign-up-button">
						Prosseguir
					</button>
					</br>
					</br>
					</br>
						<a style="font-size: 16px; color: #0977B5;" href="http://localhost/moodle/login/index.php"> Se já possui cadastro, clique aqui!</a>
					<script type="text/javascript">
						var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

						elems.forEach(function(html) {
							var switchery = new Switchery(html);
						});
					</script>
			</form>

		</center>
	</body>
</html>
<?php
@$_SESSION['pwd2'];
//Dados pessoais guardados em sessão!
@$_SESSION['name'];
@$_SESSION['last_name'];
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

@$_SESSION['disp[0]'];
?>

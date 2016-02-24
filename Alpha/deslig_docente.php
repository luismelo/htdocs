<?php
 session_start();
?>
<style type="text/css">
.noBorder {border-bottom: 0; border-top:0;  }
*	 {font-family: Arial;}
.tg  {border-collapse:collapse;border-spacing:0;width: 100%;}
.tg  {border-collapse:collapse;border-spacing:0;width: 100%;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding: 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-s6z2{text-align:center}
.tg .tg-baih{font-family:Arial, Helvetica, sans-serif !important;;background-color:#656565;color:#ffffff;text-align:center}
.tg .tg-efv9{font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-efv10{font-family:Arial, Helvetica, sans-serif !important;width: 20px;height: 20px;}
.tg .tg-hgcj{font-weight:bold;text-align:center}
.tg .tg-6rov{font-weight:bold;background-color:#656565;text-align:center}
.tg .tg-hgcj{font-weight:bold;text-align:center}
@import url(http://netdna.bootstrapcdn.com/font-awesome/2.0/css/font-awesome.css);
  
    input.button{
        background: #ECECEC;
        border-radius: 15px;
        padding: 10px 20px;
        display: block;
        font-family: arial;
        font-weight: bold;
        color:#7f7f7f;
        text-align:center;
        text-decoration: none;
        text-shadow:0px 1px 0px #fff;
        border:1px solid #a7a7a7;
        width: 145px;
        margin:0px auto;
        margin-top:20px;
        box-shadow: 0px 2px 1px white inset, 0px -2px 8px white, 0px 2px 5px rgba(0, 0, 0, 0.1), 0px 8px 10px rgba(0, 0, 0, 0.1);
        -webkit-transition:box-shadow 0.5s;
    }
    input.button i{
        float: right;
        margin-top: 2px;
    }
    input.button:hover{
        box-shadow: 0px 2px 1px white inset, 0px -2px 20px white, 0px 2px 5px rgba(0, 0, 0, 0.1), 0px 8px 10px rgba(0, 0, 0, 0.1);
    }
    input.button:active{
        box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.5) inset, 0px -2px 20px white, 0px 1px 5px rgba(0, 0, 0, 0.1), 0px 2px 10px rgba(0, 0, 0, 0.1);
        background:-webkit-linear-gradient(top, #d1d1d1 0%,#ECECEC 100%);
    }
</style>
 <form name="docu_doc" action="" method="post">
<table class="tg">
  <tr>
    <th class="tg-efv10"><img src="imagens/sequencial_login_icon.jpg" /></th>
    <th class="tg-hgcj">DESLIGAMENTO DE DOCENTE</th>
    <th class="tg-s6z2">TI</th>
  </tr>
  <tr>
    <td class="tg-baih" colspan="3">DADOS FUNCIONAIS</td>
  </tr>
  <tr>
    <td class="tg-efv9" colspan="3">NOME DO PROFESSOR: <input type='text' size="60" name='nome'  ></td>
  </tr>
  <tr>
    <td class="tg-efv9" colspan="3">CPF: <input type='text' pattern=\d* name='cpf'></td>
  </tr>
  <tr>
    <td class="tg-efv9">UNIDADE: <input type='text' pattern=\d* name='unidade'></td>
    <td class="tg-031e" colspan="2">CURSO: <input type='text' name='curso'  ></td>
  </tr>
  <tr>
    <td class="tg-efv9">DATA DE SAÍDA: <input type='text' name='data_saida'  ></td>
    <td class="tg-031e" colspan="2">COORDENADOR: <input type='text'  name='coordenador'  ></td>
  </tr>
  <tr>
    <td class="tg-efv9" colspan="3" rowspan="2">MOTIVO DA SAÍDA: <br/>
    	<script>function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }
    textarea{
        resize:none;
        overflow:hidden;
        min-height:50px;
        max-height:100px;
      }</script>
    	<input type="text" id="motiv_saida" name="text_saida" onkeyup="auto_grow(this)" style="width: 100%; height: 100%"/>
    	</td>
  </tr>
  <tr>
  </tr>
</table>


 	 <p style="margin-left: 10px;">Professor entregou toda documentação Escriturada?
<input type="radio" name="doc_radio" value="sim">Sim
<input type="radio" name="doc_radio" value="nao">Não
</p>

<p style="margin-left: 10px;">Quanto tempo o Professor trabalhou na escola?
<input list="tempo" name="tempo">
  <datalist id="tempo">
    <option value="Menos de 6 meses">
    <option value="Menos de 1 ano">
    <option value="Mais de 1 ano">
    <option value="Mais de 2 anos">
    <option value="Mais de 3 anos">
    <option value="Mais de 4 anos">
    <option value="Mais de 5 anos">
  </datalist>
  </p>
  
  <table class="tg">
  <tr>
    <th class="tg-6rov" colspan="5" style="width: 50%">AVALIAR O DOCENTE</th>
    <th class="tg-6rov" colspan="5">Descrição dos fatores</th>
  </tr>
  <tr>
    <td class="tg-hgcj">FATORES:</td>
    <td class="tg-hgcj">ÓTIMO</td>
    <td class="tg-hgcj">BOM</td>
    <td class="tg-hgcj">REG.</td>
    <td class="tg-hgcj">FRACO</td>
    <td style="border-bottom: none; text-align: left;font-weight:bold;">DESCRIÇÃO DOS FATORES:</td>
  </tr>
  <tr>
    <td class="tg-031e" align="center">Assiduidade</td>
    <td class="tg-031e" align="center"><input type="radio" name="ass" value="4"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="ass" value="3"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="ass" value="2"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="ass" value="1"/></td>
    <td style="border-top: none; border-bottom: none;text-align: left;font-weight:bold;">
    	<p>ASSIDUIDADE:capacidade em chegar e sair no horário previsto, não ter faltas ou atrasos.
    	
    	</p>
    	</td>
  </tr>
  <tr>
    <td class="tg-031e" align="center">Adaptação ao Cargo</td>
    <td class="tg-031e" align="center"><input type="radio" name="adp" value="4"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="adp" value="3"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="adp" value="2"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="adp" value="1"/></td>
    <td style="border-top: none; border-bottom: none;text-align: left;font-weight:bold;">
    	ADAPTAÇÃO AO CARGO: capacidade em conhecer durante a experiência todas as tarefas a serem
    	desempenhadas, normas e procedimentos e quais os resultados esperados.
    </td>
  </tr>
  <tr>
    <td class="tg-031e" align="center">Comunicação</td>
   <td class="tg-031e" align="center"><input type="radio"  name="com" value="4"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="com" value="3"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="com" value="2"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="com" value="1"/></td>
    <td style="border-top: none; border-bottom: none;text-align: left;font-weight:bold;">
    	COMUNICAÇÃO: capacidade em receber e transmitir mensagens, com fidelidadee se assegurar daquilo que entendeu
    	, tanto com o cliente interno como o externo.
    </td>
  </tr>
  <tr>
    <td class="tg-031e" align="center">Conhecimento</td>
    <td class="tg-031e" align="center"><input type="radio" name="con" value="4"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="con" value="3"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="con" value="2"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="con" value="1"/></td>
    <td style="border-top: none; border-bottom: none;text-align: left;font-weight:bold;">
    	CONHECIMENTO: capacidade técnica que o cargo exige, habilidade em informática, reciocínio numérico e verbal.
    </td>
  </tr>
  <tr>
    <td class="tg-031e" align="center">Cooperação</td>
    <td class="tg-031e" align="center"><input type="radio" name="coo" value="4"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="coo" value="3"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="coo" value="2"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="coo" value="1"/></td>
    <td style="border-top: none; border-bottom: none;text-align: left;font-weight:bold;">
    	COOPERAÇÃO: capacidade em visar o objetivo principal que é o companheirismo e as ações em equipe,
    	não se isolar das atividades propostas, desenvolver suas rotinas em união.
    </td>
  </tr>
  <tr>
    <td class="tg-031e" align="center">Equilíbrio Emocional</td>
    <td class="tg-031e" align="center"><input type="radio" name="emo" value="4"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="emo" value="3"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="emo" value="2"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="emo" value="1"/></td>
    <td style="border-top: none; border-bottom: none;text-align: left;font-weight:bold;">
    	EQUILIBRIO EMOCIONAL: capacidade para agir em tranquilidade, manter o controle em situações adversas de trabalho
    	(tensão, frustração, competição).
    </td>
  </tr>
  <tr>
    <td class="tg-031e" align="center">Iniciativa</td>
    <td class="tg-031e" align="center"><input type="radio" name="ini" value="4"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="ini" value="3"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="ini" value="2"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="ini" value="1"/></td>
    <td style="border-top: none; border-bottom: none;text-align: left;font-weight:bold;">
    	INICIATIVA: capacidade em prontamente colocar em prática uma idéia proposta pelo grupo, ou sugeri-la
    	após algum período de reflexão e análise à chefia ou à equipe. 
    </td>
  </tr>
  <tr>
    <td class="tg-031e" align="center">Organização</td>
   <td class="tg-031e" align="center"><input type="radio" name="org" value="4"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="org" value="3"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="org" value="2"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="org" value="1"/></td>
    <td style="border-top: none; border-bottom: none;text-align: left;font-weight:bold;">
    	ORGANIZAÇÃO: capacidade para receber e organizar as atividades, estabelecer as prioridades, controlar tempo e gasto de material
    	, afim de atingir a tarefa proposta.
    </td>
  </tr>
  <tr>
    <td class="tg-031e" align="center">Relacionamento</td>
    <td class="tg-031e" align="center"><input type="radio" name="rel" value="4"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="rel" value="3"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="rel" value="2"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="rel" value="1"/></td>
    <td style="border-top: none; border-bottom: none;text-align: left;font-weight:bold;">
    	RELACIONAMENTO: capacidade em manter bom contato com a equipe e demais clientes, entender as pessoas, ouvir com paciência e favorecer
    	o bom ambiente de trabalho.
    </td>
  </tr>
  <tr>
    <td class="tg-031e" align="center">Responsabilidade</td>
    <td class="tg-031e" align="center"><input type="radio" name="res" value="4"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="res" value="3"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="res" value="2"/></td>
    <td class="tg-031e" align="center"><input type="radio" name="res" value="1"/></td>
    <td style="border-top: none;text-align: left;font-weight:bold;">
    	RESPONSABILIDADE: capacidade em assumir e responder pelas tarefas, não se omitir nos trabalhos a serem executados.
    </td>
  </tr>
</table>
<input class="button" type='submit' name='manda_dados' value='ENVIAR' />
</form>
<?php
 if (@isset($_POST['manda_dados'])) {
	@$_SESSION['nome']= $_POST['nome'];
	@$_SESSION['cpf']= $_POST['cpf'];
	@$_SESSION['unidade'] = $_POST['unidade'];
	@$_SESSION['curso']= $_POST['curso'];
	@$_SESSION['data_saida']= $_POST['data_saida'];
	@$_SESSION['coordenador']= $_POST['coordenador'];
	@$_SESSION['text_saida']= $_POST['text_saida'];
	@$_SESSION['doc_radio']= $_POST['doc_radio'];
	@$_SESSION['tempo']= $_POST['tempo'];
	@$_SESSION['ass']= $_POST['ass'];
	@$_SESSION['adp']= $_POST['adp'];
	@$_SESSION['com']= $_POST['com'];
	@$_SESSION['con']= $_POST['con'];
	@$_SESSION['coo']= $_POST['coo'];
	@$_SESSION['emo']= $_POST['emo'];
	@$_SESSION['ini']= $_POST['ini'];
	@$_SESSION['org']= $_POST['org'];
	@$_SESSION['rel']= $_POST['rel'];
	@$_SESSION['res']= $_POST['res'];
	echo "Guardou os resultados";
	
}
die();
?>

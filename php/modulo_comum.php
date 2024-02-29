<?php

	if($atualiza!="")
		{
			$ordem=$atualiza;
			$DATA_ANIVER[0]=$DATA_ANIVER_DIA;
			$DATA_ANIVER[1]=$DATA_ANIVER_MES;
			$DATA_ANIVER[2]=$DATA_ANIVER_ANO;
			if($DATA_ANIVER[2]!="")
				$TEXT_IDADE=DATE("Y")-$DATA_ANIVER[2];
			$DATA_ESP[0]=$DATA_ESP_DIA;
			$DATA_ESP[1]=$DATA_ESP_MES;
			$DATA_ESP[2]=$DATA_ESP_ANO;
			$DATA_CART_EMISSAO_VALIDADE[0]=$DATA_CART_EMISSAO_VALIDADE_DIA;
			$DATA_CART_EMISSAO_VALIDADE[1]=$DATA_CART_EMISSAO_VALIDADE_MES;
			$DATA_CART_EMISSAO_VALIDADE[2]=$DATA_CART_EMISSAO_VALIDADE_ANO;
		}

	function comb($var_caixa,$nome_caixa,$nome){
		global $ordem,$estilo_combos;
		echo "
			<SELECT NAME='$nome_caixa' STYLE='$estilo_combos'>
		";
						$conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
						$banco=mysql_select_db("formiga_portal",$conexao);
						$var="SELECT * FROM ".$nome." ORDER BY tipo ";
						$executar=mysql_query("$var", $conexao);
						$linhas=mysql_num_rows($executar);
						$flag=0;
							for($flag=0;$flag<$linhas;$flag++)
							{
								if($var_caixa==mysql_result($executar, $flag, "id"))
								{
									$var_op=$flag;
								}
								echo "<OPTION VALUE=";
								echo mysql_result($executar, $flag, "id");
								echo ">";
								echo mysql_result($executar, $flag, "tipo");
							}
		echo"
			</SELECT>
		";
		if(($ordem==1)||($ordem==2)||($ordem==0)||($ordem==4)||($ordem==6))
			{
				echo "
					<INPUT TYPE='button' NAME='adicional' VALUE='+' STYLE='WIDTH:20px; HEIGHT:20px;' ONCLICK=\"javascript:window_adicional=open('modulo_adicional.php?caixa=$nome_caixa&nome=$nome','window_adicional','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,menubar=no,width=430,height=425,left=85,top=45')\">
				";
			}
					if(($var_caixa!="")&&($var_op!=""))
					{
						echo "
							<SCRIPT>
								document.FR_comum.$nome_caixa.selectedIndex=$var_op;
							</SCRIPT>
						";
					}
		mysql_close($conexao);		
	}
	
	function comb1($var_caixa1,$nome_caixa1){
		global $ordem,$backbox,$estilo_combos,$conexao,$banco;
	echo "
			<SELECT NAME='$nome_caixa1' STYLE='$estilo_combos'>
		";
						$conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
						$banco=mysql_select_db("formiga_portal",$conexao);
						$var1="SELECT * FROM dados_pessoas ORDER BY 'apelido'";
						$executar=mysql_query("$var1", $conexao);
						$linhas=mysql_num_rows($executar);
						$flag=0;
							for($flag=0;$flag<$linhas;$flag++)
							{
								if($var_caixa1==mysql_result($executar, $flag, "id"))
								{
									$var_op=$flag;
								}
								if(mysql_result($executar, $flag, "apelido")=="Ninguém")
								{
									echo "<OPTION SELECTED VALUE=";
								}
								else
								{
									echo "<OPTION VALUE=";
								}
								echo mysql_result($executar, $flag, "id");
								echo ">";
								echo mysql_result($executar, $flag, "apelido");
							}
		echo"
			</SELECT>
		";
		if(($var_caixa1!="")&&($var_op!=""))
			{
				echo "
					<SCRIPT>
						document.FR_comum.$nome_caixa1.selectedIndex=$var_op;
					</SCRIPT>
				";
			}
		mysql_close($conexao);
	}

	function nulidade(){
		global $TEXT_ID,$TEXT_APELIDO,$TEXT_NOME,$TEXT_ANIVER,$TEXT_RELACIONA,$TEXT_SEXO,$TEXT_PROFISSAO,$TEXT_PROFISSAO_ESCOLA,
		$TEXT_CONJUGUE,$TEXT_LINK,$TEXT_LINK1,$TEXT_EMAIL,$TEXT_EMAIL1,$TEXT_WWW,$TEXT_WWW1,$TEXT_DATA_ESP,$TEXT_DATA_ESP_OB,$TEXT_TEL_RES,
		$TEXT_TEL_RES1,$TEXT_TEL_CEL,$TEXT_TEL_CEL1,$TEXT_TEL_TRAMP,$TEXT_TEL_TRAMP1,$TEXT_TEL_OUTRO,$TEXT_TEL_OUTRO_OB,
		$TEXT_TEL_OUTRO1,$TEXT_TEL_OUTRO1_OB,$TEXT_TEL_FAX,$TEXT_TEL_FAX1,$TEXT_TELBIP_OPERA,$TEXT_TELBIP_COD,$TEXT_ICQ,$TEXT_END,$TEXT_END_COMP,
		$TEXT_END_NUMERO,$TEXT_END_BAIRRO,$TEXT_END_CIDADE,$TEXT_END_CEP,$TEXT_END_ESTADO,$TEXT_END_PAIS,$TEXT_END1,$TEXT_END1_COMP,
		$TEXT_END1_NUMERO,$TEXT_END1_BAIRRO,$TEXT_END1_CEP,$TEXT_END1_CIDADE,$TEXT_END1_ESTADO,$TEXT_END1_PAIS,
		$TEXT_TRAMPO_LOCAL,$TEXT_TEL_TRAMP,$TEXT_TEL_TRAMP1,$TEXT_TRAMPO_RAZAO,$TEXT_TRAMPO_CARGO,$TEXT_TRAMPO_DEPT,$TEXT_TRAMPO_SECRETARIA,$TEXT_TRAMPO_SECRETARIA_TEL,
		$TEXT_TRAMPO_END,$TEXT_TRAMPO_END_COMP,$TEXT_TRAMPO_END_NUMERO,$TEXT_TRAMPO_END_BAIRRO,$TEXT_TRAMPO_END_CEP,
		$TEXT_TRAMPO_END_CIDADE,$TEXT_TRAMPO_END_ESTADO,$TEXT_TRAMPO_END_PAIS,$TEXT_RG,$TEXT_CIC,
		$TEXT_TITULO,$TEXT_TITULO_ZONA,$TEXT_TITULO_SESSAO,$TEXT_CERT_NASC,$TEXT_CERT_NASC_LIVRO,$TEXT_CERT_NASC_FOLHA,$TEXT_CERT_NASC_NUMERO,
		$TEXT_ALIST,$TEXT_CART_MOT,$TEXT_CART_EMISSAO_VALIDADE,$TEXT_OBS;


		$TEXT_ID=$TEXT_APELIDO=$TEXT_NOME=$TEXT_ANIVER=$TEXT_SEXO=$TEXT_PROFISSAO=$TEXT_PROFISSAO_ESCOLA="";
		$TEXT_CONJUGUE=$TEXT_LINK=$TEXT_LINK1=$TEXT_EMAIL=$TEXT_EMAIL1=$TEXT_WWW=$TEXT_WWW1=$TEXT_DATA_ESP=$TEXT_DATA_ESP_OB=$TEXT_TEL_RES="";
		$TEXT_TEL_RES1=$TEXT_TEL_CEL=$TEXT_TEL_CEL1=$TEXT_TEL_TRAMP=$TEXT_TEL_TRAMP1=$TEXT_TEL_OUTRO=$TEXT_TEL_OUTRO_OB="";
		$TEXT_TEL_OUTRO1=$TEXT_TEL_OUTRO1_OB=$TEXT_TEL_FAX=$TEXT_TEL_FAX1=$TEXT_TELBIP_OPERA=$TEXT_TELBIP_COD=$TEXT_ICQ=$TEXT_END=$TEXT_END_COMP="";
		$TEXT_END_NUMERO=$TEXT_END_BAIRRO=$TEXT_END_CIDADE=$TEXT_END_CEP=$TEXT_END_ESTADO=$TEXT_END_PAIS=$TEXT_END1=$TEXT_END1_COMP="";
		$TEXT_END1_NUMERO=$TEXT_END1_BAIRRO=$TEXT_END1_CEP=$TEXT_END1_CIDADE=$TEXT_END1_ESTADO=$TEXT_END1_PAIS="";
		$TEXT_TRAMPO_LOCAL=$TEXT_TRAMPO_RAZAO=$TEXT_TRAMPO_CARGO=$TEXT_TRAMPO_DEPT=$TEXT_TRAMPO_SECRETARIA=$TEXT_TRAMPO_SECRETARIA_TEL="";
		$TEXT_TRAMPO_END=$TEXT_TRAMPO_END_COMP=$TEXT_TRAMPO_END_NUMERO=$TEXT_TRAMPO_END_BAIRRO=$TEXT_TRAMPO_END_CEP="";
		$TEXT_TRAMPO_END_CIDADE=$TEXT_TRAMPO_END_ESTADO=$TEXT_TRAMPO_END_PAIS=$TEXT_RG=$TEXT_CIC="";
		$TEXT_TITULO=$TEXT_TITULO_ZONA=$TEXT_TITULO_SESSAO=$TEXT_CERT_NASC=$TEXT_CERT_NASC_LIVRO=$TEXT_CERT_NASC_FOLHA=$TEXT_CERT_NASC_NUMERO="";
		$TEXT_ALIST=$TEXT_CART_MOT=$TEXT_CART_EMISSAO_VALIDADE=$TEXT_OBS="";
		$TEXT_RELACIONA=0;
	}

	function mostra_caixas(){
		global $backbg,$backbox,$ordem,$TEXT_IDADE,$TEXT_ID,$TEXT_APELIDO,$TEXT_NOME,$TEXT_ANIVER,$TEXT_RELACIONA,$TEXT_SEXO,$TEXT_PROFISSAO,$TEXT_PROFISSAO_ESCOLA,
		$TEXT_CONJUGUE,$TEXT_LINK,$TEXT_LINK1,$TEXT_EMAIL,$TEXT_EMAIL1,$TEXT_WWW,$TEXT_WWW1,$TEXT_DATA_ESP,$TEXT_DATA_ESP_OB,$TEXT_TEL_RES,
		$TEXT_TEL_RES1,$TEXT_TEL_CEL,$TEXT_TEL_CEL1,$TEXT_TEL_TRAMP,$TEXT_TEL_TRAMP1,$TEXT_TEL_OUTRO,$TEXT_TEL_OUTRO_OB,
		$TEXT_TEL_OUTRO1,$TEXT_TEL_OUTRO1_OB,$TEXT_TEL_FAX,$TEXT_TEL_FAX1,$TEXT_TELBIP_OPERA,$TEXT_TELBIP_COD,$TEXT_ICQ,$TEXT_END,$TEXT_END_COMP,
		$TEXT_END_NUMERO,$TEXT_END_BAIRRO,$TEXT_END_CIDADE,$TEXT_END_CEP,$TEXT_END_ESTADO,$TEXT_END_PAIS,$TEXT_END1,$TEXT_END1_COMP,
		$TEXT_END1_NUMERO,$TEXT_END1_BAIRRO,$TEXT_END1_CEP,$TEXT_END1_CIDADE,$TEXT_END1_ESTADO,$TEXT_END1_PAIS,
		$TEXT_TRAMPO_LOCAL,$TEXT_TRAMPO_RAZAO,$TEXT_TRAMPO_CARGO,$TEXT_TRAMPO_DEPT,$TEXT_TRAMPO_SECRETARIA,$TEXT_TRAMPO_SECRETARIA_TEL,
		$TEXT_TRAMPO_END,$TEXT_TRAMPO_END_COMP,$TEXT_TRAMPO_END_NUMERO,$TEXT_TRAMPO_END_BAIRRO,$TEXT_TRAMPO_END_CEP,
		$TEXT_TRAMPO_END_CIDADE,$TEXT_TRAMPO_END_ESTADO,$TEXT_TRAMPO_END_PAIS,$TEXT_RG,$TEXT_CIC,
		$TEXT_TITULO,$TEXT_TITULO_ZONA,$TEXT_TITULO_SESSAO,$TEXT_CERT_NASC,$TEXT_CERT_NASC_LIVRO,$TEXT_CERT_NASC_FOLHA,$TEXT_CERT_NASC_NUMERO,
		$TEXT_ALIST,$TEXT_CART_MOT,$TEXT_CART_EMISSAO_VALIDADE,$TEXT_OBS,
		$DATA_ANIVER,$DATA_ESP,$DATA_CART_EMISSAO_VALIDADE;

		echo"
		<TABLE bgcolor=$backbg width=630 height=100 cellspacing='0' cellpadding='0'align=center border=1 bordercolor=#000000>
			<TR><TD align=center>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD valign='middle' align='left' width='65'>
<!--ID-->
						<FONT class='TextLab'>ID</FONT>
					</TD>
					<TD valign='middle' align='left' width='60'>
						<INPUT type='text' value='$TEXT_ID'	name='TEXT_ID' onFocus='this.blur()'; style='width: 50px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 18px; color: #FFFFFF'>
					</TD>
<!--APELIDO-->
					<TD valign='middle' align='left' width='50'>
						<FONT class='TextLab'>Apelido</FONT>
					</TD>
					<TD valign='middle' align='left' width='210'>
						<INPUT type='text'  value='$TEXT_APELIDO' style='width: 200px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 18px; color: #FFFFFF' name='TEXT_APELIDO'	";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
<!-- ANIVERSARIO  -->
					<TD width='70' height=23>
						<FONT class='TextLab'>Aniversário</FONT>
					</TD>
					<TD valign='middle' width='105' height=23>
						<SELECT name='DATA_ANIVER_DIA' style='width: 45px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 18px; color: #FFFFFF' >
							<OPTION VALUE=00>
";
								for($k=1;$k<10;$k++)
								{
									echo "
										<OPTION VALUE=0$k >$k
									";
								}
								for($k=10;$k<32;$k++)
								{
									echo "
										<OPTION VALUE= $k >$k
									";
								}
echo "
						</SELECT>
";
						if(($DATA_ANIVER[0]!="")||($atualiza!=""))
						{
							echo "
								<SCRIPT>
									document.FR_comum.DATA_ANIVER_DIA.selectedIndex=$DATA_ANIVER[0];
								</SCRIPT>
							";
						}
echo "
						<SELECT name='DATA_ANIVER_MES' style='width: 50px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 18px; color: #FFFFFF'>
							<OPTION VALUE= 0 >
							<OPTION VALUE= 01 >Jan	
							<OPTION VALUE= 02 >Fev	
							<OPTION VALUE= 03 >Mar	
							<OPTION VALUE= 04 >Abr	
							<OPTION VALUE= 05 >Mai	
							<OPTION VALUE= 06 >Jun	
							<OPTION VALUE= 07 >Jul	
							<OPTION VALUE= 08 >Ago	
							<OPTION VALUE= 09 >Set	
							<OPTION VALUE= 10 >Out	
							<OPTION VALUE= 11 >Nov	
							<OPTION VALUE= 12 >Dez	
						</SELECT>
";
						if($DATA_ANIVER[1]!="")
						{
							echo "
								<SCRIPT>
									document.FR_comum.DATA_ANIVER_MES.selectedIndex=$DATA_ANIVER[1];
								</SCRIPT>
							";
						}
						if($DATA_ANIVER[2]!="")
						{
							$DATA_ANIVER_ANO=$DATA_ANIVER[2];
						}
echo "
					</TD>
					<TD valign='middle' width='40'>
						<INPUT type='text' style='width: 35px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$DATA_ANIVER_ANO' name='DATA_ANIVER_ANO' ";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
<!--NOME -->
					<TD valign='middle' align='left' width=65>
						<FONT class='TextLab'>Nome</FONT>
					</TD>
					<TD valign='middle' align='left' width=535>
						<INPUT type='text' style='width: 530px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 18px; color: #FFFFFF' value='$TEXT_NOME'			name='TEXT_NOME'	";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>
			</TABLE>
<!-- RELACIONAMENTO -->
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD valign='middle' align='left' width=65>		
						<FONT class='TextLab'>Relaciona</FONT>
					</TD>
					<TD width=445>
";
					comb(&$TEXT_RELACIONA,"TEXT_RELACIONA","relacionamento");

echo "		
					</TD>
<!--SEXO-->
					<TD width=40>
						<FONT class='TextLab'>Sexo</FONT>
					</TD>
					<TD height=24>
								<SELECT NAME='TEXT_SEXO' style='width: 45px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' >
									<OPTION VALUE=0>M
									<OPTION VALUE=1 SELECTED>F
								</SELECT>
					</TD>
				</TR>
			</TABLE>
			</TD></TR>
		</TABLE>
				

";
								if($TEXT_SEXO!="")
								{
echo "
											<SCRIPT>
												document.FR_comum.TEXT_SEXO.selectedIndex=$TEXT_SEXO;
											</SCRIPT>
";
								}

echo "
			<BR>
		<TABLE bgcolor=$backbg width=630 height=150 cellspacing='0' cellpadding='0'align=center border=1 bordercolor=#000000>
			<TR><TD align=center>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
<!--PROFISSAO-->
					<TD width=120>
						<FONT class='TextLab'>Profissão</FONT>
					</TD>
					<TD width=400>
		";
					comb(&$TEXT_PROFISSAO,"TEXT_PROFISSAO","profissao");
		echo "			
					</TD>
<!--IDADE-->
					<TD width=40>
						<FONT class='TextLab'>Idade</FONT>
					</TD>
					<TD width=40>
						<INPUT type='text' style='width: 30px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_IDADE'			name='IDADE'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
<!--ESCOLA-->
					<TD width=120 height=25>
						<FONT class='TextLab'>Profissão Escola</FONT>	
					</TD>
					<TD width=480>
		";
						comb(&$TEXT_PROFISSAO_ESCOLA,"TEXT_PROFISSAO_ESCOLA","escola");
		echo "
					</TD>
				</TR>
				<TR>
<!--CONJUGUE-->
					<TD width=120 height=25>
						<FONT class='TextLab'>Cônjugue</FONT>		
					</TD>
					<TD width=480>
		";
						comb1(&$TEXT_CONJUGUE,"TEXT_CONJUGUE");
		echo "
					</TD>
				</TR>
				<TR>
<!--LINK-->
					<TD width=120 height=25>
						<FONT class='TextLab'>Link</FONT>
					</TD>
					<TD width=480>
		";
						comb1(&$TEXT_LINK,"TEXT_LINK");
		echo "
					</TD>
				</TR>
				<TR>
<!--LINK1-->
					<TD width=120 height=25>
						<FONT class='TextLab'>Link1</FONT>
					</TD>
					<TD width=480>
		";
						comb1(&$TEXT_LINK1,"TEXT_LINK1");
		echo "
					</TD>
				</TR>
			</TABLE>
			</TD></TR>
		</TABLE>		
		<BR>
		<TABLE bgcolor=$backbg width=630 height=120 cellspacing='0' cellpadding='0'align=center border=1 bordercolor=#000000>
			<TR><TD align=center>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
<!--DATA ESPECIAL-->
					<TD height=23>
						<FONT class='TextLab'>Data Especial</FONT>
					</TD>
					<TD>
						<SELECT name='DATA_ESP_DIA' style='width: 45px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 18px; color: #FFFFFF' >
							<OPTION VALUE=00>
";
								for($k=1;$k<10;$k++)
								{
									echo "
										<OPTION VALUE=0$k >$k
									";
								}
								for($k=10;$k<32;$k++)
								{
									echo "
										<OPTION VALUE= $k >$k
									";
								}
echo "
						</SELECT>
";
						if(($DATA_ESP[0]!="")||($atualiza!=""))
						{
							echo "
								<SCRIPT>
									document.FR_comum.DATA_ESP_DIA.selectedIndex=$DATA_ESP[0];
								</SCRIPT>
							";
						}
echo "
						<SELECT name='DATA_ESP_MES' style='width: 50px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 18px; color: #FFFFFF'>
							<OPTION VALUE= 0 >
							<OPTION VALUE= 01 >Jan
							<OPTION VALUE= 02 >Fev
							<OPTION VALUE= 03 >Mar
							<OPTION VALUE= 04 >Abr
							<OPTION VALUE= 05 >Mai
							<OPTION VALUE= 06 >Jun
							<OPTION VALUE= 07 >Jul
							<OPTION VALUE= 08 >Ago
							<OPTION VALUE= 09 >Set
							<OPTION VALUE= 10 >Out
							<OPTION VALUE= 11 >Nov
							<OPTION VALUE= 12 >Dez
						</SELECT>
";
						if($DATA_ESP[1]!="")
						{
							echo "
								<SCRIPT>
									document.FR_comum.DATA_ESP_MES.selectedIndex=$DATA_ESP[1];
								</SCRIPT>
							";
						}
						if($DATA_ESP[2]!="")
						{
							$DATA_ESP_ANO=$DATA_ESP[2];
						}
echo "
						<INPUT type='text' style='width: 35px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$DATA_ESP_ANO' name='DATA_ESP_ANO' ";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>
				<TR>
<!-- DATA ESPECIAL OBS-->
					<TD width=120>
						<FONT class='TextLab'>Data Especial OBS</FONT>
					</TD>
					<TD>
						<TEXTAREA COLS=76 ROWS=5 style='border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; color: #FFFFFF' name='TEXT_DATA_ESP_OB'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">$TEXT_DATA_ESP_OB</TEXTAREA>
					</TD>
				</TR>							
			</TABLE>
			</TD></TR>
		</TABLE>
			<BR>
		<TABLE bgcolor=$backbg width=630 height=100 cellspacing='0' cellpadding='0'align=center border=1 bordercolor=#000000>
			<TR><TD align=center>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width=42>
<!--EMAIL-->
						<FONT class='TextLab'>E-Mail</FONT>
					</TD>
					<TD width=220>
						<INPUT type='text' style='width: 235px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_EMAIL' 			name='TEXT_EMAIL'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
<!--EMAIL1-->
					<TD width=49>
						<FONT class='TextLab'>E-Mail1</FONT>
					</TD>
					<TD width=200>
						<INPUT type='text' style='width: 235px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_EMAIL1' 		name='TEXT_EMAIL1'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>
				<TR>
<!--WWW-->
					<TD>
						<FONT class='TextLab'>Www</FONT>
					</TD>
					<TD>
						<INPUT type='text' style='width: 235px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_WWW'			name='TEXT_WWW'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
<!--WWW1-->
					<TD>
						<FONT class='TextLab'>Www1</FONT>
					</TD>
					<TD>
						<INPUT type='text' style='width: 235px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_WWW1' 			name='TEXT_WWW1'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>
				<TR>
<!--ICQ-->
					<TD>
						<FONT class='TextLab'>Icq</FONT>
					</TD>
					<TD>
						<INPUT type='text' style='width: 100px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_ICQ'			name='TEXT_ICQ'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
			</TABLE>
			</TD></TR>
		</TABLE>
			<BR>
		<TABLE bgcolor=$backbg width=630 height=120 cellspacing='0' cellpadding='0'align=center border=1 bordercolor=#000000>
			<TR><TD align=center>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
<!--TEL RES-->
					<TD width=80>
						<FONT class='TextLab'>Residência</FONT>
					</TD>
					<TD width=140>
						<INPUT type='text' style='width: 120px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TEL_RES'			name='TEXT_TEL_RES'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
<!--TEL CEL-->

					<TD width=60>
						<FONT class='TextLab'>Celular</FONT>
					</TD>
					<TD width=140>
						<INPUT type='text'  style='width: 120px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TEL_CEL'			name='TEXT_TEL_CEL'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
<!--TEL TRAMP-->

					<TD width=60>
						<FONT class='TextLab'>Trampo</FONT>
					</TD>
					<TD width=140>
						<INPUT type='text'  style='width: 120px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TEL_TRAMP'			name='TEXT_TEL_TRAMP'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>
				<TR>
<!--TEL RES1-->

					<TD>
						<FONT class='TextLab'>Residência1</FONT>
					</TD>
					<TD>
						<INPUT type='text'  style='width: 120px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TEL_RES1'			name='TEXT_TEL_RES1'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
<!--TEL CEL1-->

					<TD>
						<FONT class='TextLab'>Celular1</FONT>
					</TD>
					<TD>
						<INPUT type='text'  style='width: 120px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TEL_CEL1'			name='TEXT_TEL_CEL1'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
<!--TEL TRAMP1-->

					<TD>
						<FONT class='TextLab'>Trampo1</FONT>
					</TD>
					<TD>
						<INPUT type='text'  style='width: 120px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TEL_TRAMP1'			name='TEXT_TEL_TRAMP1'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
				<TR>
<!--TEL FAX-->

					<TD>
						<FONT class='TextLab'>Fax</FONT>
					</TD>
					<TD>
						<INPUT type='text'  style='width: 120px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TEL_FAX'			name='TEXT_TEL_FAX'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
<!--TEL FAX-->

					<TD>
						<FONT class='TextLab'>Fax1</FONT>
					</TD>
					<TD>
						<INPUT type='text'  style='width: 120px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TEL_FAX1'			name='TEXT_TEL_FAX1'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>
				<TR>
<!--TEL BIP-->

					<TD>
						<FONT class='TextLab'>Bip Opera</FONT>
					</TD>
					<TD>
						<INPUT type='text'  style='width: 120px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'   value='$TEXT_TELBIP_OPERA'		name='TEXT_TELBIP_OPERA'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
<!--TEL BIP COD-->

					<TD>
						<FONT class='TextLab'>Bip Cod</FONT>
					</TD>
					<TD>
						<INPUT type='text'  style='width: 120px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TELBIP_COD'			name='TEXT_TELBIP_COD'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
			</TABLE>
			</TD></TR>
		</TABLE>
			<BR>
		<TABLE bgcolor=$backbg width=630 height=110 cellspacing='0' cellpadding='0'align=center border=1 bordercolor=#000000>
			<TR><TD align=center>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
<!--TEL OUTRO-->

					<TD valign='top' width=70>
						<FONT class='TextLab'>Tel Outro</FONT>					
					</TD>
					<TD valign='top' width=230>
						<INPUT type='text' style='width: 120px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_TEL_OUTRO'			name='TEXT_TEL_OUTRO'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
<!--TEL OUTRO1-->

					<TD valign='top' width=70>
						<FONT class='TextLab'>Tel Outro1</FONT>										</TD>
					<TD valign='top' width=230>
						<INPUT type='text' style='width: 120px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_TEL_OUTRO1'			name='TEXT_TEL_OUTRO1'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>
				<TR>
					<TD valign='top'>
						<FONT class='TextLab'>OBS </FONT>					
					</TD>
					<TD valign='top'>
						<TEXTAREA COLS=50 ROWS=3 style='width: 210px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 50px; color: #FFFFFF'  name='TEXT_TEL_OUTRO1_OB'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">$TEXT_TEL_OUTRO1_OB</TEXTAREA>
					</TD>
<!--TEL OUTRO OB-->
					<TD valign='top'>
						<FONT class='TextLab'>OBS1</FONT>					
					</TD>
					<TD valign='top'>
						<TEXTAREA COLS=50 ROWS=3 style='width: 210px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 50px; color: #FFFFFF'  name='TEXT_TEL_OUTRO_OB'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">$TEXT_TEL_OUTRO_OB</TEXTAREA>
					</TD>
				</TR>							
			</TABLE>
			</TD></TR>
		</TABLE>
			<BR>
		<TABLE bgcolor=$backbg width=630 height=138 cellspacing='0' cellpadding='0'align=center border=1 bordercolor=#000000>
			<TR><TD align=center>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width=54>
						<FONT class='TextLab'>End</FONT>
					</TD>
					<TD width=486>
						<INPUT type='text' style='width: 460px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_END'			name='TEXT_END'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width=25>
						<FONT class='TextLab'>n°</FONT>
					</TD>
					<TD width=45>
						<INPUT type='text' style='width: 40px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_END_NUMERO'		name='TEXT_END_NUMERO'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width=50>
						<FONT class='TextLab'>Compl</FONT>
					</TD>
					<TD width=160>
						<INPUT type='text' style='width: 150px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_END_COMP'			name='TEXT_END_COMP'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width=40>
						<FONT class='TextLab'>Bairro</FONT>
					</TD>
					<TD width=245>
						<INPUT type='text' style='width: 230px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_END_BAIRRO'		name='TEXT_END_BAIRRO'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width=30 height=24>
						<FONT class='TextLab'>CEP</FONT>
					</TD>
					<TD width=75>
						<INPUT type='text' style='width: 71px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'    value='$TEXT_END_CEP'			name='TEXT_END_CEP'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width=49>
						<FONT class='TextLab'>Cidade</FONT>

					</TD>
					<TD height=23>
";
					comb(&$TEXT_END_CIDADE,"TEXT_END_CIDADE","cidade");
echo "			
					</TD>
				</TR>
				<TR>
					<TD  height=23>
						<FONT class='TextLab'>Estado</FONT>

					</TD>
					<TD>
";
					comb(&$TEXT_END_ESTADO,"TEXT_END_ESTADO","estado");
echo "			
					</TD>
				</TR>
				<TR>
					<TD  height=23>
						<FONT class='TextLab'>País</FONT>
					</TD>
					<TD>
";
					comb(&$TEXT_END_PAIS,"TEXT_END_PAIS","pais");
echo "	
					</TD>
				</TR>							
			</TABLE>
			</TD></TR>
		</TABLE>
			<BR>
		<TABLE bgcolor=$backbg width=630 height=138 cellspacing='0' cellpadding='0'align=center border=1 bordercolor=#000000>
			<TR><TD align=center>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width=54>
						<FONT class='TextLab'>End</FONT>
					</TD>
					<TD width=486>
						<INPUT type='text' style='width: 460px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'    value='$TEXT_END1'			name='TEXT_END1'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width=25>
						<FONT class='TextLab'>n°</FONT>
					</TD>
					<TD width=45>
						<INPUT type='text' style='width: 40px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_END1_NUMERO'		name='TEXT_END1_NUMERO'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width=50>
						<FONT class='TextLab'>Compl</FONT>
					</TD>
					<TD width=160>
						<INPUT type='text' style='width: 150px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_END1_COMP'			name='TEXT_END1_COMP'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width=40>
						<FONT class='TextLab'>Bairro</FONT>
					</TD>
					<TD width=245>
						<INPUT type='text' style='width: 230px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_END1_BAIRRO'		name='TEXT_END1_BAIRRO'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width=30 height=24>
						<FONT class='TextLab'>CEP</FONT>
					</TD>
					<TD width=75>
						<INPUT type='text' style='width: 71px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_END1_CEP'			name='TEXT_END1_CEP'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width=49 height=23>
						<FONT class='TextLab'>Cidade</FONT>

					</TD>
					<TD>
";
					comb(&$TEXT_END1_CIDADE,"TEXT_END1_CIDADE","cidade");
echo "			
					</TD>
				</TR>
				<TR>
					<TD height=23>
						<FONT class='TextLab'>Estado</FONT>

					</TD>
					<TD>
";
					comb(&$TEXT_END1_ESTADO,"TEXT_END1_ESTADO","estado");
echo "			
					</TD>
				</TR>
				<TR>
					<TD height=23>
						<FONT class='TextLab'>País</FONT>
					</TD>
					<TD>
";
					comb(&$TEXT_END1_PAIS,"TEXT_END1_PAIS","pais");
echo "	
					</TD>
				</TR>							
			</TABLE>
			</TD></TR>
		</TABLE>
			<BR>
		<TABLE bgcolor=$backbg width=630 height=220 cellspacing='0' cellpadding='0'align=center border=1 bordercolor=#000000>
			<TR><TD align=center>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width=50>
						<FONT class='TextLab'>Local</FONT>
					</TD>
					<TD colspan=3 width=550>
						<INPUT type='text' style='width: 545px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TRAMPO_LOCAL'		name='TEXT_TRAMPO_LOCAL'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>
				<TR>
					<TD width=50>
						<FONT class='TextLab'>Razão</FONT>
					</TD>
					<TD colspan=3 width=550>
						<INPUT type='text' style='width: 545px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TRAMPO_RAZAO'		name='TEXT_TRAMPO_RAZAO'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width=50>
						<FONT class='TextLab'>Cargo</FONT>
					</TD>
					<TD width=260>
						<INPUT type='text' style='width: 245px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TRAMPO_CARGO'		name='TEXT_TRAMPO_CARGO'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width=40>
						<FONT class='TextLab'>Depto</FONT>
					</TD>
					<TD width=250>
						<INPUT type='text' style='width: 245px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TRAMPO_DEPT'		name='TEXT_TRAMPO_DEPT'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width=50>
						<FONT class='TextLab'>Secret</FONT>
					</TD>
					<TD width=355>
						<INPUT type='text' style='width: 340px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TRAMPO_SECRETARIA'		name='TEXT_TRAMPO_SECRETARIA'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width=70>
						<FONT class='TextLab'>Secret Tel</FONT>
					</TD>
					<TD width=125>
						<INPUT type='text' style='width: 120px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_TRAMPO_SECRETARIA_TEL'	name='TEXT_TRAMPO_SECRETARIA_TEL'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width=54>
						<FONT class='TextLab'>End</FONT>
					</TD>
					<TD width=486>
						<INPUT type='text' style='width: 460px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TRAMPO_END'			name='TEXT_TRAMPO_END'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width=25>
						<FONT class='TextLab'>n°</FONT>
					</TD>
					<TD width=45>
						<INPUT type='text' style='width: 40px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_TRAMPO_END_NUMERO'		name='TEXT_TRAMPO_END_NUMERO'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width=50>
						<FONT class='TextLab'>Compl</FONT>
					</TD>
					<TD width=160>
						<INPUT type='text' style='width: 150px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TRAMPO_END_COMP'			name='TEXT_TRAMPO_END_COMP'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width=40>
						<FONT class='TextLab'>Bairro</FONT>
					</TD>
					<TD width=245>
						<INPUT type='text' style='width: 230px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TRAMPO_END_BAIRRO'		name='TEXT_TRAMPO_END_BAIRRO'";	if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width=30 height=24>
						<FONT class='TextLab'>CEP</FONT>
					</TD>
					<TD width=75>
						<INPUT type='text' style='width: 71px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TRAMPO_END_CEP'			name='TEXT_TRAMPO_END_CEP'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width=49 height=22>
						<FONT class='TextLab'>Cidade</FONT>

					</TD>
					<TD>
";
					comb(&$TEXT_TRAMPO_END_CIDADE,"TEXT_TRAMPO_END_CIDADE","cidade");
echo "			
					</TD>
				</TR>
				<TR>
					<TD height=22>
						<FONT class='TextLab'>Estado</FONT>

					</TD>
					<TD>
";
					comb(&$TEXT_TRAMPO_END_ESTADO,"TEXT_TRAMPO_END_ESTADO","estado");
echo "			
					</TD>
				</TR>
				<TR>
					<TD height=22>
						<FONT class='TextLab'>País</FONT>
					</TD>
					<TD>
";
					comb(&$TEXT_TRAMPO_END_PAIS,"TEXT_TRAMPO_END_PAIS","pais");
echo "	
					</TD>
				</TR>							
			</TABLE>
			</TD></TR>
		</TABLE>
			<BR>
		<TABLE bgcolor=$backbg width=630 height=125 cellspacing='0' cellpadding='0'align=center border=1 bordercolor=#000000>
			<TR><TD align=center>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width= '80'>
						<FONT class='TextLab'>Cart Motor</FONT>
					</TD>
					<TD width='132'>
						<INPUT type='text' style='width: 121px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_CART_MOT'			name='TEXT_CART_MOT'";			if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width= '50'>
						<FONT class='TextLab'>Valid</FONT>
					</TD>
					<TD colspan=3 height=23>
						<SELECT style='width: 45px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  name='DATA_CART_EMISSAO_VALIDADE_DIA'>
						<OPTION VALUE=00>
		";
					for($k=1;$k<10;$k++)
						{
							echo "
								<OPTION VALUE=0$k >$k
							";
						}
					for($k=10;$k<32;$k++)
						{
							echo "
								<OPTION VALUE= $k >$k
							";
						}
		echo "
					</SELECT>

		";
					if(($DATA_CART_EMISSAO_VALIDADE[0]!="")||($atualiza!=""))
					{
						echo "
							<SCRIPT>
								document.FR_comum.DATA_CART_EMISSAO_VALIDADE_DIA.selectedIndex=$DATA_CART_EMISSAO_VALIDADE[0];
							</SCRIPT>
						";
					}
		echo "
					<SELECT style='width: 50px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  name='DATA_CART_EMISSAO_VALIDADE_MES'>
						<OPTION VALUE= 0 >
						<OPTION VALUE= 01 >Jan	
						<OPTION VALUE= 02 >Fev	
						<OPTION VALUE= 03 >Mar	
						<OPTION VALUE= 04 >Abr	
						<OPTION VALUE= 05 >Mai	
						<OPTION VALUE= 06 >Jun	
						<OPTION VALUE= 07 >Jul	
						<OPTION VALUE= 08 >Ago	
						<OPTION VALUE= 09 >Set	
						<OPTION VALUE= 10 >Out	
						<OPTION VALUE= 11 >Nov	
						<OPTION VALUE= 12 >Dez	
					</SELECT>
		";
					if($DATA_CART_EMISSAO_VALIDADE[1]!="")
					{
						echo "
							<SCRIPT>
								document.FR_comum.DATA_CART_EMISSAO_VALIDADE_MES.selectedIndex=$DATA_CART_EMISSAO_VALIDADE[1];
							</SCRIPT>
						";
					}
					if($DATA_CART_EMISSAO_VALIDADE[2]!="")
					{
						$DATA_CART_EMISSAO_VALIDADE_ANO=$DATA_CART_EMISSAO_VALIDADE[2];
					}
		echo "
					<INPUT type='text' style='width: 35px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$DATA_CART_EMISSAO_VALIDADE_ANO' name='DATA_CART_EMISSAO_VALIDADE_ANO'>
					</TD>
					<TD width='75'>
						<FONT class='TextLab'>Certidão</FONT>

					</TD>
					<TD width='115'>
						<INPUT type='text' style='width: 105px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_CERT_NASC'			name='TEXT_CERT_NASC'";			if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width='80'>
						<FONT class='TextLab'>RG</FONT>

					</TD>
					<TD width='160'>
						<INPUT type='text' style='width: 150px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_RG'				name='TEXT_RG'";				if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width='50'>
						<FONT class='TextLab'>Título</FONT>
					</TD>
					<TD width='120'>
						<INPUT type='text' style='width: 110px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_TITULO'			name='TEXT_TITULO'";			if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width='75'>
						<FONT class='TextLab'>Nasc Num</FONT>
					</TD>
					<TD width='115'>	
						<INPUT type='text' style='width: 105px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_CERT_NASC_NUMERO'		name='TEXT_CERT_NASC_NUMERO'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width='80'>
						<FONT class='TextLab'>CIC</FONT>

					</TD>
					<TD width='160'>
						<INPUT type='text' style='width: 150px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_CIC'			name='TEXT_CIC'";			if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width='50'>
						<FONT class='TextLab'>Zona</FONT>

					</TD>
					<TD width='120'>
						<INPUT type='text' style='width: 110px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TITULO_ZONA'		name='TEXT_TITULO_ZONA'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width='75'>
						<FONT class='TextLab'>Nasc Livro</FONT>

					</TD>
					<TD width='115'>
						<INPUT type='text' style='width: 105px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_CERT_NASC_LIVRO'		name='TEXT_CERT_NASC_LIVRO'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>							
			</TABLE>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
					<TD width='80'>
						<FONT class='TextLab'>Alistamento</FONT>
					</TD>
					<TD width='160'>
						<INPUT type='text' style='width: 150px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_ALIST'			name='TEXT_ALIST'";			if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width='50'>
						<FONT class='TextLab'>Sessão</FONT>

					</TD>
					<TD width='120'>
						<INPUT type='text' style='width: 110px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF' value='$TEXT_TITULO_SESSAO'		name='TEXT_TITULO_SESSAO'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
					<TD width='75'>
						<FONT class='TextLab'>Nasc Folha</FONT>

					</TD>
					<TD width='115'>
						<INPUT type='text' style='width: 105px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 19px; color: #FFFFFF'  value='$TEXT_CERT_NASC_FOLHA'		name='TEXT_CERT_NASC_FOLHA'";		if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo ">
					</TD>
				</TR>
			</TABLE>
			</TD></TR>
		</TABLE>
			<BR>
		<TABLE bgcolor=$backbg width=630 height=140 cellspacing='0' cellpadding='0'align=center border=1 bordercolor=#000000>
			<TR><TD align=center>
			<TABLE width=600 cellspacing='0' cellpadding='0'>
				<TR>
				<TD width='30' valign='top'>
					<FONT class='TextLab'>OBS</FONT>
				</TD>
				<TD width='570' align='center'>
					<TEXTAREA style='width: 550px; border-color: black; background-color: $backbox; border-width: 1; font-size: 11px; font-family: verdana; height: 110px; color: #FFFFFF'   ";			if(($ordem==3)||($ordem==5)||($ordem==7)){ echo "onFocus='this.blur()';"; }	echo " name='TEXT_OBS'>$TEXT_OBS</TEXTAREA>
					</TD>
				</TR>							
			</TABLE>
			</TD></TR>
		</TABLE>
			<BR>
 			";
	}

	function atribui_do_banco($var_id_fnc){
		global $TEXT_IDADE,$TEXT_ID,$TEXT_APELIDO,$TEXT_NOME,$TEXT_ANIVER,$TEXT_RELACIONA,$TEXT_SEXO,$TEXT_PROFISSAO,$TEXT_PROFISSAO_ESCOLA,
		$TEXT_CONJUGUE,$TEXT_LINK,$TEXT_LINK1,$TEXT_EMAIL,$TEXT_EMAIL1,$TEXT_WWW,$TEXT_WWW1,$TEXT_DATA_ESP,$TEXT_DATA_ESP_OB,$TEXT_TEL_RES,
		$TEXT_TEL_RES1,$TEXT_TEL_CEL,$TEXT_TEL_CEL1,$TEXT_TEL_TRAMP,$TEXT_TEL_TRAMP1,$TEXT_TEL_OUTRO,$TEXT_TEL_OUTRO_OB,
		$TEXT_TEL_OUTRO1,$TEXT_TEL_OUTRO1_OB,$TEXT_TEL_FAX,$TEXT_TEL_FAX1,$TEXT_TELBIP_OPERA,$TEXT_TELBIP_COD,$TEXT_ICQ,$TEXT_END,$TEXT_END_COMP,
		$TEXT_END_NUMERO,$TEXT_END_BAIRRO,$TEXT_END_CIDADE,$TEXT_END_CEP,$TEXT_END_ESTADO,$TEXT_END_PAIS,$TEXT_END1,$TEXT_END1_COMP,
		$TEXT_END1_NUMERO,$TEXT_END1_BAIRRO,$TEXT_END1_CEP,$TEXT_END1_CIDADE,$TEXT_END1_ESTADO,$TEXT_END1_PAIS,
		$TEXT_TRAMPO_LOCAL,$TEXT_TRAMPO_RAZAO,$TEXT_TRAMPO_CARGO,$TEXT_TRAMPO_DEPT,$TEXT_TRAMPO_SECRETARIA,$TEXT_TRAMPO_SECRETARIA_TEL,
		$TEXT_TRAMPO_END,$TEXT_TRAMPO_END_COMP,$TEXT_TRAMPO_END_NUMERO,$TEXT_TRAMPO_END_BAIRRO,$TEXT_TRAMPO_END_CEP,
		$TEXT_TRAMPO_END_CIDADE,$TEXT_TRAMPO_END_ESTADO,$TEXT_TRAMPO_END_PAIS,$TEXT_RG,$TEXT_CIC,
		$TEXT_TITULO,$TEXT_TITULO_ZONA,$TEXT_TITULO_SESSAO,$TEXT_CERT_NASC,$TEXT_CERT_NASC_LIVRO,$TEXT_CERT_NASC_FOLHA,$TEXT_CERT_NASC_NUMERO,
		$TEXT_ALIST,$TEXT_CART_MOT,$TEXT_CART_EMISSAO_VALIDADE,$TEXT_OBS,
		$DATA_ANIVER,$DATA_ESP,$DATA_CART_EMISSAO_VALIDADE;

		$C_conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
		$C_banco=mysql_select_db("formiga_portal",$C_conexao);
		$C_exec=mysql_query("SELECT * FROM dados_pessoas WHERE id=$var_id_fnc;", $C_conexao);		

		$TEXT_ID=mysql_result($C_exec, 0, 'id');
		$TEXT_APELIDO=mysql_result($C_exec, 0, 'apelido');
		$TEXT_NOME=mysql_result($C_exec, 0, 'nome');
		$TEXT_RELACIONA=mysql_result($C_exec, 0, 'relaciona');

		$TEXT_ANIVER=mysql_result($C_exec, 0, 'aniver');
		$DATA_ANIVER=split("/",$TEXT_ANIVER);
		//CALCULANDO IDADE
		if($DATA_ANIVER[2]!="")
			$TEXT_IDADE=DATE("Y")-$DATA_ANIVER[2];

		$TEXT_SEXO=mysql_result($C_exec, 0, 'sexo');
		$TEXT_PROFISSAO=mysql_result($C_exec, 0, 'profissao');
		$TEXT_PROFISSAO_ESCOLA=mysql_result($C_exec, 0, 'profissao_escola');
		$TEXT_CONJUGUE=mysql_result($C_exec, 0, 'conjugue');
		$TEXT_LINK=mysql_result($C_exec, 0, 'link');
		$TEXT_LINK1=mysql_result($C_exec, 0, 'link1');
		$TEXT_EMAIL=mysql_result($C_exec, 0, 'email');
		$TEXT_EMAIL1=mysql_result($C_exec, 0, 'email1');
		$TEXT_WWW=mysql_result($C_exec, 0, 'www');
		$TEXT_WWW1=mysql_result($C_exec, 0, 'www1');

		$TEXT_DATA_ESP=mysql_result($C_exec, 0, 'data_esp');
		$DATA_ESP=split("/",$TEXT_DATA_ESP);

		$TEXT_DATA_ESP_OB=mysql_result($C_exec, 0, 'data_esp_ob');
		$TEXT_TEL_RES=mysql_result($C_exec, 0, 'tel_res');
		$TEXT_TEL_RES1=mysql_result($C_exec, 0, 'tel_res1');
		$TEXT_TEL_CEL=mysql_result($C_exec, 0, 'tel_cel');
		$TEXT_TEL_CEL1=mysql_result($C_exec, 0, 'tel_cel1');
		$TEXT_TEL_TRAMP=mysql_result($C_exec, 0, 'tel_tramp');
		$TEXT_TEL_TRAMP1=mysql_result($C_exec, 0, 'tel_tramp1');
		$TEXT_TEL_OUTRO=mysql_result($C_exec, 0, 'tel_outro');
		$TEXT_TEL_OUTRO_OB=mysql_result($C_exec, 0, 'tel_outro_ob');
		$TEXT_TEL_OUTRO1=mysql_result($C_exec, 0, 'tel_outro1');
		$TEXT_TEL_OUTRO1_OB=mysql_result($C_exec, 0, 'tel_outro1_ob');
		$TEXT_TEL_FAX=mysql_result($C_exec, 0, 'tel_fax');
		$TEXT_TEL_FAX1=mysql_result($C_exec, 0, 'tel_fax1');
		$TEXT_TELBIP_OPERA=mysql_result($C_exec, 0, 'telbip_opera');
		$TEXT_TELBIP_COD=mysql_result($C_exec, 0, 'telbip_cod');
		$TEXT_ICQ=mysql_result($C_exec, 0, 'icq');
		$TEXT_END=mysql_result($C_exec, 0, 'end');
		$TEXT_END_COMP=mysql_result($C_exec, 0, 'end_comp');
		$TEXT_END_NUMERO=mysql_result($C_exec, 0, 'end_numero');
		$TEXT_END_BAIRRO=mysql_result($C_exec, 0, 'end_bairro');
		$TEXT_END_CIDADE=mysql_result($C_exec, 0, 'end_cidade');
		$TEXT_END_CEP=mysql_result($C_exec, 0, 'end_cep');
		$TEXT_END_ESTADO=mysql_result($C_exec, 0, 'end_estado');
		$TEXT_END_PAIS=mysql_result($C_exec, 0, 'end_pais');
		$TEXT_END1=mysql_result($C_exec, 0, 'end1');
		$TEXT_END1_COMP=mysql_result($C_exec, 0, 'end1_comp');
		$TEXT_END1_NUMERO=mysql_result($C_exec, 0, 'end1_numero');
		$TEXT_END1_BAIRRO=mysql_result($C_exec, 0, 'end1_bairro');
		$TEXT_END1_CEP=mysql_result($C_exec, 0, 'end1_cep');
		$TEXT_END1_CIDADE=mysql_result($C_exec, 0, 'end1_cidade');
		$TEXT_END1_ESTADO=mysql_result($C_exec, 0, 'end1_estado');
		$TEXT_END1_PAIS=mysql_result($C_exec, 0, 'end1_pais');
		$TEXT_TRAMPO_LOCAL=mysql_result($C_exec, 0, 'trampo_local');
		$TEXT_TRAMPO_RAZAO=mysql_result($C_exec, 0, 'trampo_razao');
		$TEXT_TRAMPO_CARGO=mysql_result($C_exec, 0, 'trampo_cargo');
		$TEXT_TRAMPO_DEPT=mysql_result($C_exec, 0, 'trampo_dept');
		$TEXT_TRAMPO_SECRETARIA=mysql_result($C_exec, 0, 'trampo_secretaria');
		$TEXT_TRAMPO_SECRETARIA_TEL=mysql_result($C_exec, 0, 'trampo_secretaria_tel');
		$TEXT_TRAMPO_END=mysql_result($C_exec, 0, 'trampo_end');
		$TEXT_TRAMPO_END_COMP=mysql_result($C_exec, 0, 'trampo_end_comp');
		$TEXT_TRAMPO_END_NUMERO=mysql_result($C_exec, 0, 'trampo_end_numero');
		$TEXT_TRAMPO_END_BAIRRO=mysql_result($C_exec, 0, 'trampo_end_bairro');
		$TEXT_TRAMPO_END_CEP=mysql_result($C_exec, 0, 'trampo_end_cep');
		$TEXT_TRAMPO_END_CIDADE=mysql_result($C_exec, 0, 'trampo_end_cidade');
		$TEXT_TRAMPO_END_ESTADO=mysql_result($C_exec, 0, 'trampo_end_estado');
		$TEXT_TRAMPO_END_PAIS=mysql_result($C_exec, 0, 'trampo_end_pais');
		$TEXT_RG=mysql_result($C_exec, 0, 'rg');
		$TEXT_CIC=mysql_result($C_exec, 0, 'cic');
		$TEXT_TITULO=mysql_result($C_exec, 0, 'titulo');
		$TEXT_TITULO_ZONA=mysql_result($C_exec, 0, 'titulo_zona');
		$TEXT_TITULO_SESSAO=mysql_result($C_exec, 0, 'titulo_sessao');
		$TEXT_CERT_NASC=mysql_result($C_exec, 0, 'cert_nasc');
		$TEXT_CERT_NASC_LIVRO=mysql_result($C_exec, 0, 'cert_nasc_livro');
		$TEXT_CERT_NASC_FOLHA=mysql_result($C_exec, 0, 'cert_nasc_folha');
		$TEXT_CERT_NASC_NUMERO=mysql_result($C_exec, 0, 'cert_nasc_numero');
		$TEXT_ALIST=mysql_result($C_exec, 0, 'alist');
		$TEXT_CART_MOT=mysql_result($C_exec, 0, 'cart_mot');

		$TEXT_CART_EMISSAO_VALIDADE=mysql_result($C_exec, 0, 'cart_emissao_validade');
		$DATA_CART_EMISSAO_VALIDADE=split("/",$TEXT_CART_EMISSAO_VALIDADE);

		$TEXT_OBS=mysql_result($C_exec, 0, 'obs');
		mysql_close($C_conexao);
}

	$var="apelido,nome,relaciona,aniver,sexo,profissao,profissao_escola,
		conjugue,link,link1,email,email1,www,www1,data_esp,data_esp_ob,tel_res,
		tel_res1,teL_cel,tel_cel1,tel_tramp,tel_tramp1,tel_outro,tel_outro_ob,
		tel_outro1,tel_outro1_ob,tel_fax,tel_fax1,telbip_opera,telbip_cod,icq,end,end_comp,
		end_numero,end_bairro,end_cidade,end_cep,end_estado,end_pais,end1,end1_comp,
		end1_numero,end1_bairro,end1_cep,end1_cidade,end1_estado,end1_pais,
		trampo_local,trampo_razao,trampo_cargo,trampo_dept,trampo_secretaria,trampo_secretaria_tel,
		trampo_end,trampo_end_comp,trampo_end_numero,trampo_end_bairro,trampo_end_cep,
		trampo_end_cidade,trampo_end_estado,trampo_end_pais,rg,cic,
		titulo,titulo_zona,titulo_sessao,cert_nasc,cert_nasc_livro,cert_nasc_folha,cert_nasc_numero,
		alist,cart_mot,cart_emissao_validade,obs";
	$var1="'$TEXT_APELIDO','$TEXT_NOME','$TEXT_RELACIONA','$DATA_ANIVER_DIA/$DATA_ANIVER_MES/$DATA_ANIVER_ANO','$TEXT_SEXO','$TEXT_PROFISSAO','$TEXT_PROFISSAO_ESCOLA',
		'$TEXT_CONJUGUE','$TEXT_LINK','$TEXT_LINK1','$TEXT_EMAIL','$TEXT_EMAIL1','$TEXT_WWW','$TEXT_WWW1','$DATA_ESP_DIA/$DATA_ESP_MES/$DATA_ESP_ANO','$TEXT_DATA_ESP_OB','$TEXT_TEL_RES',
		'$TEXT_TEL_RES1','$TEXT_TEL_CEL','$TEXT_TEL_CEL1','$TEXT_TEL_TRAMP','$TEXT_TEL_TRAMP1','$TEXT_TEL_OUTRO','$TEXT_TEL_OUTRO_OB',
		'$TEXT_TEL_OUTRO1','$TEXT_TEL_OUTRO1_OB','$TEXT_TEL_FAX','$TEXT_TEL_FAX1','$TEXT_TELBIP_OPERA','$TEXT_TELBIP_COD','$TEXT_ICQ','$TEXT_END','$TEXT_END_COMP',
		'$TEXT_END_NUMERO','$TEXT_END_BAIRRO','$TEXT_END_CIDADE','$TEXT_END_CEP','$TEXT_END_ESTADO','$TEXT_END_PAIS','$TEXT_END1','$TEXT_END1_COMP',
		'$TEXT_END1_NUMERO','$TEXT_END1_BAIRRO','$TEXT_END1_CEP','$TEXT_END1_CIDADE','$TEXT_END1_ESTADO','$TEXT_END1_PAIS',
		'$TEXT_TRAMPO_LOCAL','$TEXT_TRAMPO_RAZAO','$TEXT_TRAMPO_CARGO','$TEXT_TRAMPO_DEPT','$TEXT_TRAMPO_SECRETARIA','$TEXT_TRAMPO_SECRETARIA_TEL',
		'$TEXT_TRAMPO_END','$TEXT_TRAMPO_END_COMP','$TEXT_TRAMPO_END_NUMERO','$TEXT_TRAMPO_END_BAIRRO','$TEXT_TRAMPO_END_CEP',
		'$TEXT_TRAMPO_END_CIDADE','$TEXT_TRAMPO_END_ESTADO','$TEXT_TRAMPO_END_PAIS','$TEXT_RG','$TEXT_CIC',
		'$TEXT_TITULO','$TEXT_TITULO_ZONA','$TEXT_TITULO_SESSAO','$TEXT_CERT_NASC','$TEXT_CERT_NASC_LIVRO','$TEXT_CERT_NASC_FOLHA','$TEXT_CERT_NASC_NUMERO',
		'$TEXT_ALIST','$TEXT_CART_MOT','$DATA_CART_EMISSAO_VALIDADE_DIA/$DATA_CART_EMISSAO_VALIDADE_MES/$DATA_CART_EMISSAO_VALIDADE_ANO','$TEXT_OBS'";

echo"
<HTML>
		<SCRIPT>
			function atualizar()
			{
";
				echo $ordem;
				if(($ordem!="3")&&($ordem!="5")&&($ordem!="7")&&($ordem!="1")&&($ordem!="2")&&($ordem!=""))
					echo "
							document.FR_comum.action=document.FR_comum.action+\"&atualiza=$ordem\";
							document.FR_comum.submit();
						";
echo"
			}
			function atualiza_combos()
			{
				window.location.reload();
			}
			function mudador(linha)
			{
				document.location.href=linha;
			}
		</SCRIPT>
		<STYLE type='text/css'>
            	<!--
				.TextLab	{ color: #000000;font-size: 11px; font-family: Verdana,Arial, Helvetica }
				A.MailBL11:Link      { color: #FFFFFF;text-decoration: none; font-size: 10px; font-family: Verdana,Arial, Helvetica }
				A.MailBL11:Visited   { color: #FFFFFF;text-decoration: none; font-size: 10px; font-family: Verdana,Arial, Helvetica }
				A.MailBL11:Active   { color: #FFFFFF;text-decoration: none; font-size: 10px; font-family: Verdana,Arial, Helvetica }
				A.MailBL11:HOver   { color:#FFFFFF;text-decoration: underline }
			-->
		</STYLE>
		<TITLE>FORMIGA :: Ajudando sua Memória !!</TITLE>
		<BODY>
		<TABLE ALIGN='center' WIDTH='750'>
		<TR>
			<TD>
			<FONT size=5 face=verdana><B>FORMIGA :: ";
			if(($ordem=="0")||($ordem=="2")||($ordem=="1")){
				$backbox="#ff9922";
				$backbg="#ffd7bd";
				echo "INCLUIR";
			}
			if($ordem=="3"){
				$backbox="#006699";
				$backbg="#1099c6";
				echo "CONSULTAR";
			}
			if(($ordem=="4")||($ordem=="6")){
				$backbox="#A49B68";
				$backbg="#efefce";
				echo "ALTERAR";
			}
			if(($ordem=="5")||($ordem=="7")){
				$backbox="#DD4040";
				$backbg="#FF8080";
				echo "EXCLUIR";
			}

//DEFININDO VARIAVEIS
	$conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
	$banco=mysql_select_db("formiga_portal",$conexao);
	$estilo_combos="WIDTH: 370px; BORDER-COLOR: black; BACKGROUND-COLOR: $backbox; BORDER-WIDTH: 1; FONT-SIZE: 11px; FONT-FAMILY: verdana; COLOR: #FFFFFF";


echo "
			</B></FONT>
		<HR color='#000000'>
		</TD></TR>
		</TABLE><BR>
		<TABLE bgcolor=$backbg width=750 height=100 cellspacing='0' cellpadding='0'align=center border=1 bordercolor=#000000>
			<TR>
				<TD align=center>
					<TABLE width=730 cellspacing='0' cellpadding='0'>
						<TR>
							<TD><INPUT type='submit' value='Voltar para Início' name='BT_sair'			style='width: 175px; background-color: ; border-color:#000000; border-width:1;'  onClick=\"javascript:mudador('../modulo_principal.php')\"></TD>
							<TD><INPUT type='submit' value='Modulo de Consulta' name='BT_Modulo_de_Consulta'	style='width: 175px; background-color: ; border-color:#000000; border-width:1;'  onClick=\"javascript:mudador('modulo_consulta.php')\"></TD>
							<TD><INPUT type='submit' value='Modulo de Catálogo' name='BT_Modulo_de_Catalogo'	style='width: 175px; background-color: ; border-color:#000000; border-width:1;'  onClick=\"javascript:mudador('modulo_catalogo.php?tnome=0&letra=a')\"></TD>
";
							if($tipo_consulta=="0")
							{
echo "
							<TD><INPUT type='submit' value='Voltar para Pesquisa' name='BT_Voltar_Consultado' style='width: 175px; background-color: ; border-color:#000000; border-width:1;'  onClick=\"javascript:mudador('modulo_consulta.php?regi=$registros&ordem=1&TEXT_caixa=$pesq')\"></TD>
						</TR>
					</TABLE>
					<TABLE width=730 cellspacing='0' cellpadding='0'>
						<TR><TD height=5></TD></TR>
						<TR>
							<TD><INPUT type='submit' value='Incluir Novo' name='BT_incluir' style='width: 175px; background-color: #ffd7bd; border-color:#000000; border-width:1;' onClick=\"javascript:mudador('modulo_comum.php?tipo_consulta=0&ordem=0&registros=$registros&pesq=$pesq')\"></TD>
";
								if(($ordem!="0")&&($ordem!="2")&&($ordem!="1")&&($ordem!="7"))
								{
							if(($ordem!='5')&&($ordem!='7')){		
echo"
									<TD><INPUT type='submit' value='Excluir' name='BT_Excluir' style='width: 175px; background-color: #FF8080; border-color:#000000; border-width:1;'  onClick=\"javascript:mudador('modulo_comum.php?tipo_consulta=0&registros=$registros&ordem=5&var_id=$var_id&pesq=$pesq')\"></TD>";}
							if(($ordem!='4')&&($ordem!='6')){		
echo"
									<TD><INPUT type='submit' value='Alterar' name='BT_Alterar' style='width: 175px; background-color: #efefce; border-color:#000000; border-width:1;' onClick=\"javascript:mudador('modulo_comum.php?tipo_consulta=0&registros=$registros&ordem=4&var_id=$var_id&pesq=$pesq')\"></TD>";}
							if($ordem!='3'){		
echo"
									<TD><INPUT type='submit' value='Consultar' name='BT_Consultar' style='width: 175px; background-color: #1099c6; border-color:#000000; border-width:1;'  onClick=\"javascript:mudador('modulo_comum.php?tipo_consulta=0&registros=$registros&ordem=3&var_id=$var_id&pesq=$pesq')\"></TD>";}
echo"
							<TD WIDTH='182'></TD>
";
								}
							}
						else
							if($tipo_consulta=="1")
							{
echo "
							<TD><INPUT type='submit' value='Voltar para Catálogo' name='BT_Voltar_Consultado' style='width: 175px; background-color: ; border-color:#000000; border-width:1;'  onClick=\"javascript:mudador('modulo_catalogo.php?tnome=$tnome&letra=$letra')\"></TD>
						</TR>
					</TABLE>
					<TABLE width=730 cellspacing='0' cellpadding='0'>
						<TR><TD height=5></TD></TR>
						<TR>
							<TD WIDTH='182'><INPUT type='submit' value='Incluir Novo' name='BT_incluir' style='width: 175px; background-color: #ffd7bd; border-color:#000000; border-width:1;' onClick=\"javascript:mudador('modulo_comum.php?tipo_consulta=1&ordem=0&tnome=$tnome&letra=$letra')\"></TD>
";
									if(($ordem!="0")&&($ordem!="2")&&($ordem!="1")&&($ordem!="7"))
									{
							if(($ordem!='5')&&($ordem!='7')){		
echo"
								<TD WIDTH='182'><INPUT type='submit' value='Excluir' name='BT_Excluir' style='width: 175px; background-color: #FF8080; border-color:#000000; border-width:1;'  onClick=\"javascript:mudador('modulo_comum.php?tipo_consulta=1&ordem=5&tnome=$tnome&letra=$letra&var_id=$var_id')\"></TD>";}
							if(($ordem!='4')&&($ordem!='6')){		
echo"
								<TD WIDTH='182'><INPUT type='submit' value='Alterar' name='BT_Alterar' style='width: 175px; background-color: #efefce; border-color:#000000; border-width:1;'  onClick=\"javascript:mudador('modulo_comum.php?tipo_consulta=1&ordem=4&tnome=$tnome&letra=$letra&var_id=$var_id')\"></TD>";}
							if($ordem!='3'){		
echo"
								<TD WIDTH='182'><INPUT type='submit' value='Consultar' name='BT_Consultar' style='width: 175px; background-color: #1099c6; border-color:#000000; border-width:1;'  onClick=\"javascript:mudador('modulo_comum.php?tipo_consulta=1&ordem=3&tnome=$tnome&letra=$letra&var_id=$var_id')\"></TD>";}
echo"
							<TD WIDTH='182'></TD>";
									}
							}
							else
							{
echo "
							<TD><INPUT type='submit' value='Incluir Novo' name='BT_incluir' style='background-color: #ffd7bd; border-color:#000000; border-width:1; width: 175px;' onClick=\"javascript:mudador('modulo_comum.php?ordem=0')\"></TD>";
							}
echo "
						</TR>
					</TABLE>
					<TABLE width=730 cellspacing='0' cellpadding='0' height=25>
						<TR><TD height=6></TD></TR>
						<TR>
							<TD bgcolor=$backbox>
								<FONT FACE='verdana' color='#FFFFFF' style='font-size: 11px;'>
									&nbsp;&nbsp;&nbsp;status ::
";
						if($ordem=='1')
						{
							$conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
							$banco=mysql_select_db("formiga_portal",$conexao);
							$exec=mysql_query("INSERT INTO dados_pessoas ($var) values ($var1);", $conexao);		
							mysql_close($conexao);
							$status="Foi pra conta!! ";
						}
						if($ordem=='2')
						{
							echo 'Mostra o Erro e fica Quieto';
						}
						if($ordem=='3')
						{
							if($atualiza==""){atribui_do_banco($var_id);}
						}
						if($ordem=='4')
						{
							if($sub_ordem==0)
								if($atualiza==""){atribui_do_banco($var_id);}
						}
						if($ordem=='5')
						{
							if($atualiza==""){atribui_do_banco($var_id);}
						}
						if($ordem=='6')
						{
							$Al_conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
							$Al_banco=mysql_select_db("formiga_portal",$Al_conexao);

							$Al_exec=mysql_query("UPDATE dados_pessoas SET 
							apelido='$TEXT_APELIDO',nome='$TEXT_NOME',relaciona='$TEXT_RELACIONA',aniver='$DATA_ANIVER_DIA/$DATA_ANIVER_MES/$DATA_ANIVER_ANO',sexo='$TEXT_SEXO' ,profissao='$TEXT_PROFISSAO',profissao_escola='$TEXT_PROFISSAO_ESCOLA',
							conjugue='$TEXT_CONJUGUE',link='$TEXT_LINK',link1='$TEXT_LINK1',email='$TEXT_EMAIL',email1='$TEXT_EMAIL1',www='$TEXT_WWW',www1='$TEXT_WWW1',data_esp='$DATA_ESP_DIA/$DATA_ESP_MES/$DATA_ESP_ANO',data_esp_ob='$TEXT_DATA_ESP_OB',tel_res='$TEXT_TEL_RES',
							tel_res1='$TEXT_TEL_RES1',teL_cel='$TEXT_TEL_CEL',tel_cel1='$TEXT_TEL_CEL1',tel_tramp='$TEXT_TEL_TRAMP',tel_tramp1='$TEXT_TEL_TRAMP1',tel_outro='$TEXT_TEL_OUTRO',tel_outro_ob='$TEXT_TEL_OUTRO_OB',
							tel_outro1='$TEXT_TEL_OUTRO1',tel_outro1_ob='$TEXT_TEL_OUTRO1_OB',tel_fax='$TEXT_TEL_FAX',tel_fax1='$TEXT_TEL_FAX1',telbip_opera='$TEXT_TELBIP_OPERA',telbip_cod='$TEXT_TELBIP_COD',icq='$TEXT_ICQ',end='$TEXT_END',end_comp='$TEXT_END_COMP',
							end_numero='$TEXT_END_NUMERO',end_bairro='$TEXT_END_BAIRRO',end_cidade='$TEXT_END_CIDADE',end_cep='$TEXT_END_CEP',end_estado='$TEXT_END_ESTADO',end_pais='$TEXT_END_PAIS',end1='$TEXT_END1',end1_comp='$TEXT_END1_COMP',
							end1_numero='$TEXT_END1_NUMERO',end1_bairro='$TEXT_END1_BAIRRO',end1_cep='$TEXT_END1_CEP',end1_cidade='$TEXT_END1_CIDADE',end1_estado='$TEXT_END1_ESTADO',end1_pais='$TEXT_END1_PAIS',
							trampo_local='$TEXT_TRAMPO_LOCAL',trampo_razao='$TEXT_TRAMPO_RAZAO',trampo_cargo='$TEXT_TRAMPO_CARGO',trampo_dept='$TEXT_TRAMPO_DEPT',trampo_secretaria='$TEXT_TRAMPO_SECRETARIA',trampo_secretaria_tel='$TEXT_TRAMPO_SECRETARIA_TEL',
							trampo_end='$TEXT_TRAMPO_END',trampo_end_comp='$TEXT_TRAMPO_END_COMP',trampo_end_numero='$TEXT_TRAMPO_END_NUMERO',trampo_end_bairro='$TEXT_TRAMPO_END_BAIRRO',trampo_end_cep='$TEXT_TRAMPO_END_CEP',
							trampo_end_cidade='$TEXT_TRAMPO_END_CIDADE',trampo_end_estado='$TEXT_TRAMPO_END_ESTADO',trampo_end_pais='$TEXT_TRAMPO_END_PAIS',rg='$TEXT_RG',cic='$TEXT_CIC',
							titulo='$TEXT_TITULO',titulo_zona='$TEXT_TITULO_ZONA',titulo_sessao='$TEXT_TITULO_SESSAO',cert_nasc='$TEXT_CERT_NASC',cert_nasc_livro='$TEXT_CERT_NASC_LIVRO',cert_nasc_folha='$TEXT_CERT_NASC_FOLHA',cert_nasc_numero='$TEXT_CERT_NASC_NUMERO',
							alist='$TEXT_ALIST',cart_mot='$TEXT_CART_MOT',cart_emissao_validade='$DATA_CART_EMISSAO_VALIDADE_DIA/$DATA_CART_EMISSAO_VALIDADE_MES/$DATA_CART_EMISSAO_VALIDADE_ANO',obs='$TEXT_OBS'
							WHERE id=$var_id;", $Al_conexao);		
							mysql_close($Al_conexao);
							atribui_do_banco($var_id);
							$status="Este Registro foi <B>Alterado</B> com Sucesso !!";
						}
						if($ordem=='7')
						{
							$E_conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
							$E_banco=mysql_select_db("formiga_portal",$E_conexao);
							$C_exec=mysql_query("SELECT * FROM dados_pessoas WHERE id=$var_id;", $E_conexao);		
							$status="Este Registro (<B>".mysql_result($C_exec, 0, 'id')."</B>)<B> ".mysql_result($C_exec, 0, 'apelido')." </B>foi <B>EXCLUÍDO</B> com Sucesso !";
							$E_exec=mysql_query("DELETE FROM dados_pessoas WHERE id=$var_id;", $E_conexao);		
							mysql_close($E_conexao);
						}
						if($status=="")
						{
							if($tipo_consulta==1)
							{
								echo "Módulo Catálogo - Procurando em... <B>" ;
								if($tnome==0) 
									echo "Apelido"; 
									else
										if($tnome=1)
											echo "Nome";
								echo "</B> pela letra... <B>";
								echo $letra;
							}
							else
								if($tipo_consulta==0)
									{
										echo "Módulo Pesquisa - Procurando pela sentença... <B>" ;
										echo $pesq;
										echo "</B>";
									}
						}
						else
							echo $status;
							$status="";
						
echo "
							</FONT>
							</TD>
						</TR>
					</TABLE>
					</TD>
				</TR>
			</TABLE>

	<BR>
";
			if($ordem=="3")
				echo	"<FORM NAME='FR_comum' METHOD='POST' ACTION='modulo_comum.php?ordem=3'>";

			if($tipo_consulta=='0'){
				if(($ordem=="0")||($ordem=="2")||($ordem=="1"))
					echo	"<FORM NAME='FR_comum' METHOD='POST' ACTION='modulo_comum.php?tipo_consulta=0&ordem=1&registros=$registros&pesq=$pesq&var_id=$var_id'>";
				if(($ordem=="4")||($ordem=="6"))
					echo	"<FORM NAME='FR_comum' METHOD='POST' ACTION='modulo_comum.php?tipo_consulta=0&ordem=6&registros=$registros&pesq=$pesq&var_id=$var_id'>";
				if($ordem=="5")
					echo	"<FORM NAME='FR_comum' METHOD='POST' ACTION='modulo_comum.php?tipo_consulta=0&ordem=7&registros=$registros&pesq=$pesq&var_id=$var_id'>";
			}
			if($tipo_consulta=='1'){
				if(($ordem=="0")||($ordem=="2")||($ordem=="1"))
					echo	"<FORM NAME='FR_comum' METHOD='POST' ACTION='modulo_comum.php?tipo_consulta=1&ordem=1&tnome=$tnome&letra=$letra&var_id=$var_id'>";
				if(($ordem=="4")||($ordem=="6"))
					echo	"<FORM NAME='FR_comum' METHOD='POST' ACTION='modulo_comum.php?tipo_consulta=1&ordem=6&tnome=$tnome&letra=$letra&var_id=$var_id'>";
				if($ordem=="5")
					echo	"<FORM NAME='FR_comum' METHOD='POST' ACTION='modulo_comum.php?tipo_consulta=1&ordem=7&tnome=$tnome&letra=$letra&var_id=$var_id'>";
			}
			else
				echo	"<FORM NAME='FR_comum' METHOD='POST' ACTION='modulo_comum.php?&ordem=1'>";



if(($ordem!=1)&&($ordem!=3)&&($ordem!=7))
		{
echo "
			<CENTER>
			<TABLE height=40 width=730 cellspacing='0' cellpadding='0' height=25 bgcolor=$backbox >
				<TR>
					<TD align=center>
";
						if(($ordem=="0")||($ordem=="2")){
							echo	"<INPUT type='submit' value='CLIQUE AQUI PARA CONFIRMAR A INCLUSÃO'name='BT_Excluir' style='font-family:verdana; width: 700px;'>";}
						if(($ordem=="4")||($ordem=="6")){
							echo	"<INPUT type='submit' value='CLIQUE AQUI PARA CONFIRMAR A ALTERACÃO'name='BT_Excluir' style='font-family:verdana; width: 700px;'>";}
						if($ordem=="5"){
							echo	"<INPUT type='submit' value='CLIQUE AQUI PARA CONFIRMAR A EXCLUSÃO'name='BT_Excluir' style='font-family:verdana; width: 700px;'>";}
echo "
					</TD>
				</TR>
			</TABLE>
			<BR>
";
		} 
if($ordem!=7){
		mostra_caixas();}
echo  "
							<TABLE  VALIGN='middle' ALIGN='center' WIDTH='750' BGCOLOR='#FFFFFF' CELLPADING='0' CELLSPACING='0' BORDER='0' HEIGHT='25'>
								<TR>
									<TD COLSPAN='7'>
										<HR COLOR='#000000'>
									</TD>
								</TR>
								<TR>
									<TD BGCOLOR='#006699' WIDTH='5'></TD>
									<TD BGCOLOR='#006699' VALIGN='middle' HEIGHT='30'>
										<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>:: 
";	
											$M_conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
											$M_banco=mysql_select_db("formiga_portal",$M_conexao);
											$M_var="SELECT * FROM pensamentos";
											$M_executar=mysql_query("$M_var", $M_conexao);
											$M_linhas=mysql_num_rows($M_executar);
											$M_flag=rand (0,$M_linhas-1);
											echo mysql_result($M_executar, $M_flag, "texto"); echo" ( "; echo mysql_result($M_executar, $M_flag, "autor"); echo" )";
											mysql_close($M_conexao);
echo"		
										</FONT>
									</TD>
									<TD BGCOLOR='#006699' WIDTH='5'></TD>
									<TD BGCOLOR='#1099c6' VALIGN='middle' WIDTH='40' ALIGN='center'>
										<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>								
											Ir ::
										</FONT>
									</TD>
									<TD ALIGN='left' BGCOLOR='#1099c6' WIDTH='160'>
										<FORM NAME='FR' METHOD='POST' ACTION='modulo_principal.php'>
											<SELECT ONCHANGE=\"javascript:mudador(document.FR.links.value)\" NAME='links' STYLE='FONT-FAMILY:verdana; FONT-SIZE:11px; BORDER-WIDTH:0; WIDTH:150; COLOR:#FFFFFF; BACKGROUND-COLOR:#000000;'>
												<OPTION VALUE='modulo_principal.php'>Outros sites...
												<OPTION VALUE='http://www.kol.com.br'>kol
												<OPTION VALUE='http://laa.pcs.usp.br/~webbee'>webbee
												<OPTION VALUE='http://laa.pcs.usp.br'>laa
												<OPTION VALUE='http://www.poli.usp.br'>poli
												<OPTION VALUE='http://www.ska.com.br'>ska
												<OPTION VALUE='http://www.bol.com.br'>bol
											</SELECT>
									</TD>
										</FORM>
									<TD ALIGN='center' BGCOLOR='#000000' WIDTH='50'>
											<A HREF=\"javascript:window.close()\" class='Mailbl11'>Fechar</A>
									</TD>
								</TR>	
							</TABLE>	

		</FORM>
	</BODY>
</HTML>
";
?>		
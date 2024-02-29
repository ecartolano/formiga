<?php

	include('../include/php_cartolano.inc');

echo "
<HTML>
	<STYLE TYPE='text/css'>
		
		BODY{
			font-family: verdana;
			font-size:11;
		}

		TABLE{
			background-color:#DDDDDD;
			text-align:center;
		}

		TABLE TD {
			font-family: verdana;
			font-size:11;
			background-color:#FF9966;
			text-indent:0.3em;
		}


		.TDBOX{
			background-color: #FFCC99;
		}

		.FEITO
		{
			font-family: verdana;
			font-size:11;
			background-color:#1099c6;
			text-indent:0.3em;
		}


		.AFAZER
		{
			font-family: verdana;
			font-size:11;
			background-color:#FF8080;
			text-indent:0.3em;
		}

		.BOX {
			border-color: black;background-color: #FFCC99;border-width: 1;font-size: 11px;font-family: verdana;color: #000000';
		}

	</STYLE>

	<SCRIPT LANGUAGE='JavaScript'>
		function mudador(linha,ordem)
		{
			if(ordem!='0')
			{
				document.FR_comum.action='modulo_banco.php?ordem='+ordem;
				document.FR_comum.submit();
			}
			else
				document.location.href=linha;
		}
	</SCRIPT>

	<BODY>
	<CENTER>
	<P STYLE='width:700px;text-align:left;'>
				<FONT size=5>
					<B>FORMIGA :: MÓDULO DE BANCOS</B>
				</FONT>
				<HR STYLE='width:700px;' color='#000000'><BR>

				<INPUT type='button' value='Voltar para Início'    name='BT_sair'			style='width: 175px;border-color:#000000;border-width:1;' onClick=\"javascript:mudador('../modulo_principal.php','0')\">
				<INPUT type='button' value='Modulo de Consulta' name='BT_Modulo_de_Consulta'	style='width: 175px;border-color:#000000;border-width:1;' onClick=\"javascript:mudador('modulo_consulta.php','0')\">
				<INPUT type='button' value='Modulo de Catálogo' name='BT_Modulo_de_Catalogo'	style='width: 175px;border-color:#000000;border-width:1;' onClick=\"javascript:mudador('modulo_catalogo.php?tnome=0&letra=a','0')\">
				<INPUT type='button' value='Incluir Novo'	name='BT_incluir'			style='width: 175px; background-color: #ffd7bd;		border-color:#000000; border-width:1;'	onClick=\"javascript:mudador('modulo_comum.php?tipo_consulta=1&ordem=0&tnome=$tnome&letra=$letra','0')\">
	</P>
";
	$data=date('Y-m-j');

	//COMPONDO VARIAVEL
		$BOX_vencimento=$BOX_vencimento_ano.'-'.$BOX_vencimento_mes.'-'.$BOX_vencimento_dia;
	
	//CONECTANDO AO BANCO
		$conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
		$banco=mysql_select_db("formiga_portal",$conexao);

	//FUNCOES
		function print_eventos($mes,$tipo,$descricao,$valor,$vencimento,$banco,$numero,$conta)
		{
			if($tipo==1) $estilo='AFAZER';
			if($tipo==2) $estilo='FEITO';
			$var_box_vencimento=split("-",$vencimento);

			if(($var_box_vencimento[1]==$mes)||($mes==''))
			{
echo "				<TR>
					<TD CLASS='$estilo' STYLE='text-indent:0;text-align:center;'>";
						if($tipo==1) echo"D";
						if($tipo==2) echo"C";
					echo"</TD>
					<TD CLASS='TDBOX' STYLE='text-indent:0;'>$descricao</TD>
					<TD CLASS='$estilo' STYLE='text-align:left;'><B>R$ $valor</B></TD>
					<TD CLASS='TDBOX' STYLE='text-indent:0;text-align:center;'>$var_box_vencimento[2]/<B>$var_box_vencimento[1]</B>/$var_box_vencimento[0]</TD>
					<TD CLASS='TDBOX' STYLE='width:100px;text-indent:0;text-align:center;'>";
						if($banco==1) echo "Banespa";
						if($banco==2) echo "Banco Real";
						if($banco==3) echo "Nossa Caixa";
						if($banco==4) echo "Caixa Economica Federal";
						if($banco==5) echo "Banco Brasil";
						if($banco==6) echo "Itaú";
						if($banco==7) echo "Bradesco";
						if($banco==8) echo "HSBC";
						if($banco==9) echo "Unibanco";
echo"					</TD>
					<TD CLASS='TDBOX' STYLE='width:100px;text-indent:0;text-align:center;'>$numero</TD>
					<TD CLASS='TDBOX' STYLE='width:100px;text-indent:0;text-align:center;'>$conta</TD>
				</TR>
";
			}
		}

	//ORDENS
		if($ordem==1)
			{
				
				$exec=mysql_query("INSERT INTO banco (descricao,valor,vencimento,banco,numero_cheque,conta,tipo) values ('$BOX_descricao','$BOX_valor','$BOX_vencimento','$BOX_banco','$BOX_numero_cheque','$BOX_conta','$BOX_tipo');", $conexao);
				echo "<BR><BR>Gravei o Registro eee!!";
			}

	//INCLUSAO SIMPLES	

echo"
	<FORM NAME='FR_comum' METHOD='post' ACTION='modulo_banco.php?ordem=1'>	
	<TABLE STYLE='width:700;'>
		<TR>
			<TD STYLE='width:130;vertical-align:top;'>
				<P STYLE='margin-top:0.8em;'>Descrição ::</P>
			</TD>
			<TD COLSPAN='2' STYLE='vertical-align:middle;height:120px;'>
				<TEXTAREA CLASS='BOX' STYLE='width:400;height:100;' NAME='BOX_descricao'>$BOX_descricao</TEXTAREA>
			</TD>
			<TD STYLE='text-align:center;'>
				<INPUT TYPE='button' NAME='BT_enviar' VALUE='Incluir'  style='width: 120px;border-color:#000000;border-width:1;' onClick=\"javascript:mudador('','1');\">
				<BR><BR>
				<INPUT TYPE='button' NAME='BT_enviar' VALUE='zerar campos'  style='width: 120px;border-color:#000000;border-width:1;' onClick=\"javascript:mudador('modulo_banco.php','0');\">
			</TD>
		</TR>
		<TR>
			<TD>
				Valor ::
			</TD>
			<TD  STYLE='width:180;'>
				<INPUT TYPE='text' CLASS='BOX' NAME='BOX_valor' VALUE='$BOX_valor' STYLE='width:200px;'>
			</TD>
			<TD>
				Vencimento ::
			</TD>
			<TD>
";

			caixa_dia($BOX_vencimento_dia,'BOX_vencimento_dia','border-color: black;background-color: #FFCC99;border-width: 1;font-size: 11px;font-family: verdana;color: #000000','');
			caixa_mes($BOX_vencimento_mes,'BOX_vencimento_mes','border-color: black;background-color: #FFCC99;border-width: 1;font-size: 11px;font-family: verdana;color: #000000','');
			caixa_ano($BOX_vencimento_ano,'BOX_vencimento_ano','border-color: black;background-color: #FFCC99;border-width: 1;font-size: 11px;font-family: verdana;color: #000000','');
echo "
			</TD>
		</TR>
		<TR>
			<TD>
				Banco ::
			</TD>
			<TD>
			<SELECT CLASS='BOX' NAME='BOX_banco' STYLE='width:200px;'>
			<OPTION "; if($BOX_banco==1) echo "SELECTED"; echo" VALUE='1'>Banespa
			<OPTION "; if($BOX_banco==2) echo "SELECTED"; echo" VALUE='2'>Banco Real
			<OPTION "; if($BOX_banco==3) echo "SELECTED"; echo" VALUE='3'>Nossa Caixa
			<OPTION "; if($BOX_banco==4) echo "SELECTED"; echo" VALUE='4'>Caixa Economica Federal
			<OPTION "; if($BOX_banco==5) echo "SELECTED"; echo" VALUE='5'>Banco Brasil
			<OPTION "; if($BOX_banco==6) echo "SELECTED"; echo" VALUE='6'>Itaú
			<OPTION "; if($BOX_banco==7) echo "SELECTED"; echo" VALUE='7'>Bradesco
			<OPTION "; if($BOX_banco==8) echo "SELECTED"; echo" VALUE='8'>HSBC
			<OPTION "; if($BOX_banco==9) echo "SELECTED"; echo" VALUE='9'>Unibanco
		</SELECT>
			</TD>
			<TD>
				Numero Cheque ::
			</TD>
			<TD>
				<INPUT TYPE='text' CLASS='BOX'  NAME='BOX_numero_cheque' VALUE='$BOX_numero_cheque'>
			</TD>
		</TR>
		<TR>
			<TD>
				Numero da Conta ::
			</TD>
			<TD>
				<INPUT TYPE='text' CLASS='BOX' NAME='BOX_conta' VALUE='$BOX_conta' STYLE='width:150px;'>
			</TD>
			<TD>
				Tipo da Ação ::
			</TD>
			<TD>
				<SELECT NAME='BOX_tipo' VALUE='$BOX_tipo' CLASS='BOX' STYLE='width:150px;'>
					<OPTION "; if($BOX_tipo==1) echo"SELECTED"; echo" VALUE='1'>Débito
					<OPTION "; if($BOX_tipo==2) echo"SELECTED"; echo" VALUE='2'>Crédito
				</SELECT>
			</TD>
		</TR>
	</TABLE>
	<BR>
		<TABLE STYLE='width:700px;'>
		<TR>
			<TD STYLE='text-align:center;'>
				<TABLE STYLE='background-color:#FF9966;'>
					<TR>
						<TD >
							<INPUT TYPE='button' NAME='BT_debitos' VALUE='a realizar' style='background-color:; width: 130px;border-color:#000000;border-width:1;' onClick=\"javascript:mudador('','2');\">
						</TD>
						<TD STYLE='width:85px;text-align:center;'>em 
			
";
							caixa_mes($BOX_consulta_mes_debito,'BOX_consulta_mes_debito','border-color: black;background-color: #FFCC99;border-width: 1;font-size: 11px;font-family: verdana;color: #000000','');
echo"
						</TD>
					</TR>
					<TR>
						<TD>
							<INPUT TYPE='button' NAME='BT_creditos' VALUE='feitos' style='width: 130px;background-color: ; border-color:#000000;border-width:1;' onClick=\"javascript:mudador('','3');\">
						</TD>
						<TD STYLE='text-align:center;'>em 
";		
							caixa_mes($BOX_consulta_mes_credito,'BOX_consulta_mes_credito','border-color: black;background-color: #FFCC99;border-width: 1;font-size: 11px;font-family: verdana;color: #000000','');
echo"
						</TD>
					</TR>
				</TABLE>
			</TD>
			<TD STYLE='text-align:center;'>
				<TABLE STYLE='background-color:#FF9966;width:250px;'>
					<TR>
						<TD STYLE='width:190px;text-indent:0;'>
							Consultar
						</TD>
						<TD STYLE='text-align:right;'>
							<INPUT TYPE='button' NAME='BT_consulta' VALUE='consultar' onClick=\"javascript:mudador('','6');\">
						</TD>
					</TR>
					<TR>
						<TD STYLE='text-align:center;' COLSPAN='2'>
							<INPUT TYPE='text' NAME='BOX_consulta' VALUE='$BOX_consulta'  STYLE='margin-top:0.5em;width:280px;' CLASS='BOX'\">
						</TD>
					</TR>
				</TABLE>
			</TD>
			<TD STYLE='text-align:center;height:90px;'>
				<TABLE STYLE='background-color:#FF9966;text-align:center;'>
					<TR>
						<TD STYLE='width:140px;text-align:center;'>
							<INPUT TYPE='button' NAME='TODOSDEBITOS' VALUE='todos a realizar'  style='background-color:; width: 120px;border-color:#000000;border-width:1;'  onClick=\"javascript:mudador('','4');\">
						</TD>
					</TR>
					<TR>
						<TD STYLE='width:140px;text-align:center;'>
							<INPUT TYPE='button' NAME='TODOSCREDITOS' VALUE='todos feitos'  style='background-color:; width: 120px;border-color:#000000;border-width:1;' onClick=\"javascript:mudador('','5');\">							
						</TD>
					</TR>
					<TR>
						<TD STYLE='width:140px;text-align:center;'>
							<INPUT TYPE='button' NAME='TODOS' VALUE='todos'  style='background-color:; width: 120px;border-color:#000000;border-width:1;'  onClick=\"javascript:mudador('','7');\">
						</TD>
					</TR>
				</TABLE>
			</TD>
		</TR>
	</TABLE>
	<HR STYLE='color:#000000;margin-top:5pt;margin-bottom:5pt;width:700px;'>
";

	//ORDENS
	//MOSTRA OS VALORES A PAGAR


		if($ordem==6)
		{
			if($BOX_consulta!='')
			{
				$exec_consulta=mysql_query("SELECT * FROM banco WHERE descricao LIKE '%$BOX_consulta%'  ORDER BY vencimento", $conexao);
				$linhas_consulta=mysql_num_rows($exec_consulta);

echo "				<TABLE STYLE='width:700px;background-color:#FFFFFF;'>
					<TR>
						<TD STYLE='background-color:#DDDDDD;font-size:10px;text-align:center;text-indent:0;'><B>tipo</B></TD>
						<TD STYLE='background-color:#DDDDDD;height:20px;font-size:10px;text-align:center;text-indent:0;'><B>descrição</B></TD>
						<TD STYLE='background-color:#DDDDDD;width:90px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>valor</B></TD>
						<TD STYLE='background-color:#DDDDDD;width:90px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>vencimento</B></TD>
						<TD STYLE='background-color:#DDDDDD;width:100px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>banco</B></TD>
						<TD STYLE='background-color:#DDDDDD;width:100px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>cheque</B></TD>
						<TD STYLE='background-color:#DDDDDD;width:100px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>conta</B></TD>
					</TR>";
				for($k=0;$k < $linhas_consulta;$k++)
						print_eventos('',mysql_result($exec_consulta, $k, "tipo"),
							mysql_result($exec_consulta, $k, "descricao"),
							mysql_result($exec_consulta, $k, "valor"),
							mysql_result($exec_consulta, $k, "vencimento"),
							mysql_result($exec_consulta, $k, "banco"),
							mysql_result($exec_consulta, $k, "numero_cheque"),
							mysql_result($exec_consulta, $k, "conta"));
echo "				</TABLE>";
			}
		}

		if($ordem==7)
		{
			$exec_consulta=mysql_query("SELECT * FROM banco ORDER BY vencimento", $conexao);
			$linhas_consulta=mysql_num_rows($exec_consulta);

echo "			<TABLE STYLE='width:700px;background-color:#FFFFFF;'>
				<TR>
					<TD STYLE='background-color:#DDDDDD;font-size:10px;text-align:center;text-indent:0;'><B>tipo</B></TD>
					<TD STYLE='background-color:#DDDDDD;height:20px;font-size:10px;text-align:center;text-indent:0;'><B>descrição</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:90px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>valor</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:90px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>vencimento</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:100px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>banco</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:100px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>cheque</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:100px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>conta</B></TD>
				</TR>";
			for($k=0;$k < $linhas_consulta;$k++)
					print_eventos('',mysql_result($exec_consulta, $k, "tipo"),
						mysql_result($exec_consulta, $k, "descricao"),
						mysql_result($exec_consulta, $k, "valor"),
						mysql_result($exec_consulta, $k, "vencimento"),
						mysql_result($exec_consulta, $k, "banco"),
						mysql_result($exec_consulta, $k, "numero_cheque"),
						mysql_result($exec_consulta, $k, "conta"));
echo "			</TABLE>";
		}

		
		if(($ordem==2)||($ordem==4)||($ordem==''))
		{
			$exec_debito=mysql_query("SELECT * FROM banco WHERE vencimento >= '$data' ORDER BY vencimento", $conexao);
			$linhas_debito=mysql_num_rows($exec_debito);

			if($ordem!=4)
				$BOX_consulta_mes_debito_var=$BOX_consulta_mes_debito;
				else
					$BOX_consulta_mes_debito_var='';
				

echo "			<TABLE STYLE='width:700px;background-color:#FFFFFF;'>
				<TR>
					<TD STYLE='background-color:#DDDDDD;font-size:10px;text-align:center;text-indent:0;'><B>tipo</B></TD>
					<TD STYLE='background-color:#DDDDDD;height:20px;font-size:10px;text-align:center;text-indent:0;'><B>descrição</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:90px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>valor</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:90px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>vencimento</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:100px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>banco</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:100px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>cheque</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:100px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>conta</B></TD>
				</TR>";
			for($k=0;$k < $linhas_debito;$k++)
					print_eventos($BOX_consulta_mes_debito_var,mysql_result($exec_debito, $k, "tipo"),
						mysql_result($exec_debito, $k, "descricao"),
						mysql_result($exec_debito, $k, "valor"),
						mysql_result($exec_debito, $k, "vencimento"),
						mysql_result($exec_debito, $k, "banco"),
						mysql_result($exec_debito, $k, "numero_cheque"),
						mysql_result($exec_debito, $k, "conta"));
echo "			</TABLE>";
		}

	//MOSTRA OS VALORES PAGOS

		if(($ordem==3)||($ordem==5))
		{
			$exec_credito=mysql_query("SELECT * FROM banco WHERE vencimento < '$data'  ORDER BY vencimento", $conexao);
			$linhas_credito=mysql_num_rows($exec_credito);

			if($ordem!=5)
				$BOX_consulta_mes_credito_var=$BOX_consulta_mes_credito;
				else
					$BOX_consulta_mes_credito_var='';

echo "			<TABLE STYLE='width:700px;background-color:#FFFFFF;'>
				<TR>
					<TD STYLE='background-color:#DDDDDD;font-size:10px;text-align:center;text-indent:0;'><B>tipo</B></TD>
					<TD STYLE='background-color:#DDDDDD;height:20px;font-size:10px;text-align:center;text-indent:0;'><B>descrição</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:90px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>valor</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:90px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>vencimento</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:100px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>banco</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:100px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>cheque</B></TD>
					<TD STYLE='background-color:#DDDDDD;width:100px;height:25px;font-size:10px;text-align:center;text-indent:0;'><B>conta</B></TD>
				</TR>";
			for($k=0;$k < $linhas_credito;$k++)
					print_eventos($BOX_consulta_mes_credito_var,mysql_result($exec_credito, $k, "tipo"),
						mysql_result($exec_credito, $k, "descricao"),
						mysql_result($exec_credito, $k, "valor"),
						mysql_result($exec_credito, $k, "vencimento"),
						mysql_result($exec_credito, $k, "banco"),
						mysql_result($exec_credito, $k, "numero_cheque"),
						mysql_result($exec_credito, $k, "conta"));
echo "			</TABLE>";
		}

echo"
	</FORM>
	</BODY>
</HTML>
"; 
	mysql_close($conexao);
?>
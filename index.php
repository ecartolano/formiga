<?php
	
	$mes=date('m');
	$dia=date('d');
	$ano=date('Y');
	$data=date('Y-m-d');
	$data_aniver=date('d/m');

	function print_mes($mes_print,$acr)
	{
		global $mes;
		if($mes_print=="")
			$mes_print=$mes;
		switch($mes_print+$acr){
			case 1:
				echo "Janeiro";
				break;
			case 2:
				echo "Fevereiro";
				break;
			case 3:
				echo "Março";
				break;
			case 4:
				echo "Abril";
				break;
			case 5:
				echo "Maio";
				break;
			case 6:
				echo "Junho";
				break;
			case 7:
				echo "Julho";
				break;
			case 8:
				echo "Agosto";
				break;
			case 9:
				echo "Setembro";
				break;
			case 10:
				echo "Outubro";
				break;
			case 11:
				echo "Novembro";
				break;
			case 12:
				echo "Dezembro";
				break;
		}
	}


	//OPCOES DE PHP
		error_reporting (NULL); //NAO EXIBIR OS ERROS DO PHP
	
	//FUNCOES
		//VAI PARA A URL (VIA PHP) DESIGNADA
			function mudador_php($var)
			{
				header($var);
			}

	//EXECUTADOR DE ORDENS

		//ORDEM 1 - VERIFICACAO DE USUARIO
		if($ordem==1 && $_POST["TEXT_senha"]=="F0rm1g41996")
		{
			if(mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996"))
				{
					mudador_php("Location: modulo_principal.php");

					//REGISTRANDO A SESSAO
					session_save_path("/");
					session_start();
					session_register("acesso");
					session_register("usuario");
					$HTTP_SESSION_VARS["acesso"]=1;			
					$HTTP_SESSION_VARS["usuario"]=$TEXT_login;

				}
				else
					$flag='1'; //TENHO QUE USAR ESSA FLAG PARA EXIBIR O ERRO NESSA PAGINA POR CAUSA DO HEADER
		}



echo "

<HTML>
	<HEAD></HEAD>

	<STYLE type=\"text/css\">
		<!--
				BODY{
					font-family:verdana;
					font-size:11px;
					text-align:center;
				}
				
				TABLE{
					font-size:11px;
				}

				.LEGENDA {font-size:11px;text-indent:0.5em;color:#FFFFFF;}

				.BOX {FONT-SIZE=10px; FONT-FAMILY=verdana; BORDER-WIDTH:1;COLOR:#000000; BACKGROUND-COLOR:#DDDDDD;}

				A.alink:Link	{ color:#000000;text-decoration: none; font-size: 11px; font-family: Verdana,Arial, Helvetica; }
				A.alink:Visited	{ color:#000000;text-decoration: none; font-size: 11px; font-family: Verdana,Arial, Helvetica; }
				A.alink:Active	{ color:#000000;text-decoration: none; font-size: 11px; font-family: Verdana,Arial, Helvetica; }
				A.alink:Hover	{ color:#000000;text-decoration: underline;font-weight:bold; font-size: 14px;background-color:#efefce;}

				A.alinkbac:Link	{ color:#000000;text-decoration: none; font-size: 11px; font-family: Verdana,Arial, Helvetica; }
				A.alinkbac:Visited	{ color:#000000;text-decoration: none; font-size: 11px; font-family: Verdana,Arial, Helvetica; }
				A.alinkbac:Active	{ color:#000000;text-decoration: none; font-size: 11px; font-family: Verdana,Arial, Helvetica; }
				A.alinkbac:Hover	{ color:#000000;text-decoration: underline;font-weight:bold; font-size: 14px;background-color:#FF8080;}

				A.alinkem:Link	{ color:#000000;text-decoration: none; font-size: 11px; font-family: Verdana,Arial, Helvetica; }
				A.alinkem:Visited	{ color:#000000;text-decoration: none; font-size: 11px; font-family: Verdana,Arial, Helvetica; }
				A.alinkem:Active	{ color:#000000;text-decoration: none; font-size: 11px; font-family: Verdana,Arial, Helvetica; }
				A.alinkem:Hover	{ color:#000000;text-decoration: underline;font-weight:bold; font-size: 14px;background-color:#1099c6;}
		-->
	</STYLE>

	<TITLE>Formiga v2.0 :: Ajudando sua Memória !!</TITLE>

	<BODY>
		<TABLE STYLE='width:680;'>
			<TR>
				<TD>
					<FONT STYLE='font-size:40px;font-weight:bold;'>
						FORMIGA :: 
					</FONT>
					<FONT STYLE='color:gray;'>
						Escrito, pensado e desenvolvido por Etienne Cartolano (KARTT).
					</FONT>
					<HR STYLE='color:#000000;width:680;'>
				</TD>
			</TR>
		</TABLE>

		<TABLE STYLE='width:675;'>
			<TR>
				<TD STYLE='width:230;text-align:center;background-color:#1099c6;'>
					<FORM TYPE='submit' METHOD='post' ACTION='index.php?ordem=1'>
						<TABLE CELLSPACING='0' CELLSPADDING='0'>
							<TR>
								<TD STYLE='height:30;width:60;vertical-align:middle;'>
									Usuario
								</TD>
								<TD STYLE='vertical-align:middle;'>
									<SELECT NAME='TEXT_login' CLASS='BOX' STYLE='width:150px;'>
										<OPTION VALUE='kartt'>kartt
<!--										<OPTION VALUE='gandaum'>gandaum
										<OPTION VALUE='rosana'>rosana
										<OPTION VALUE='eliene'>eliene
										<OPTION VALUE='convidado'>convidado
										<OPTION VALUE='visitante'>visitante-->
									</SELECT>
								</TD>
							</TR>
							<TR>
								<TD>
									Senha
								</TD>
								<TD>
									<INPUT TYPE='password' NAME='TEXT_senha' VALUE='' CLASS='BOX' STYLE='width:150px;'>
								</TD>
							</TR>
							<TR>
								<TD STYLE='text-align:right;height:30;vertical-align:bottom;' COLSPAN='2'>
									<INPUT TYPE='submit' NAME='BOTAO' VALUE='Entrar' STYLE='width:100px;'>
								</TD>
							</TR>
						</TABLE>
				</TD>
				<TD STYLE='text-align:center;background-color:#DDDDDD;'>
					<TABLE STYLE='width:420px;'>
						<TR>
							<TD STYLE='text-align:center;'>
";
								if($flag=='1')
								{
echo"
									<B> $TEXT_login </B> a <B>senha</B> esta incorreta !
";
								}
								else
								{
									//$M_conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
									//$M_banco=mysql_select_db("formiga_portal",$M_conexao);
									//$M_var="SELECT * FROM pensamentos";
									//$M_executar=mysql_query("$M_var", $M_conexao);
									//$M_linhas=mysql_num_rows($M_executar);
									//$M_flag=rand (0,$M_linhas-1);
									//echo mysql_result($M_executar, $M_flag, "texto"); echo"<BR><I> ( "; echo mysql_result($M_executar, $M_flag, "autor"); echo" )</I>";
									//mysql_close($M_conexao);
								}
echo"
							</TD>
						</TR>
					</TABLE>
				</TD>
			</TR>
		</TABLE>
		<BR>
		<TABLE STYLE='width:650;background-color:#1099c6; text-align:center;'>
			<TR>
				<TD>
					B R A S I L, <B>$dia</B> de <B>"; print_mes(); echo"</B> de $ano.
				</TD>
			</TR>
		</TABLE>
		<BR>
		<TABLE STYLE='width:680;' CLASS='LEGENDA'>
			<TR>
				<TD STYLE='width:255px;background-color:#000000;'>
					Próximos Aniversários <B>"; print_mes(); echo"</B>
				</TD>
				<TD STYLE='width:170px;background-color:#000000;'>
					Eventos
				</TD>
				<TD STYLE='width:255px;background-color:#000000;'>
					Links
				</TD>
			</TR>
		</TABLE>
		<TABLE STYLE='width:680;'>
			<TR>
				<TD STYLE='vertical-align:top;width:253;text-align:center;background-color:#ffd7bd;'>
					<TABLE STYLE='width:242px'>
						<TR>
							<TD><BR>
";
								$T_conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
								$T_banco=mysql_select_db("formiga_portal",$T_conexao);
								$T_consulta=mysql_query("SELECT * FROM dados_pessoas ORDER BY aniver;",$T_conexao);
								$T_regi=mysql_num_rows($T_consulta);
								for ($regatual = 0; $regatual< $T_regi ; $regatual++)
								{
									$TEXT_DATA=mysql_result($T_consulta,  $regatual, 'aniver');
									$DATA=split("/",$TEXT_DATA);
									if(($DATA[1]==$mes)&&($DATA[0]>=$dia))
									{
										if($data_aniver==$DATA[0]."/".$DATA[1])
											echo " <FONT STYLE='background-color:#FF8080;font-face:verdana; color:#000000;font-size:8pt;'><B>";
										echo mysql_result($T_consulta,  $regatual, 'apelido');
										echo " - (".$DATA[0].")"."<BR>";
										if($data_aniver==$DATA[0]."/".$DATA[1])
											echo "</B></FONT>";
									}
								}
								mysql_close($T_conexao);

echo"							</TD>
						</TR>
					</TABLE>
				</TD>
				<TD STYLE='vertical-align:top;width:170;text-align:center;background-color:#efefce;'>
					<TABLE STYLE='width:157px'>
						<TR>
							<TD><BR>
";
								$B_conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
								$B_banco=mysql_select_db("formiga_portal",$B_conexao);
								$B_exec_debito=mysql_query("SELECT * FROM banco WHERE vencimento >= '$data'", $B_conexao);
								$B_linhas_debito=mysql_num_rows($B_exec_debito);
								for($k=0;$k < $B_linhas_debito;$k++)
								{
									$var_ven=split("-",mysql_result($B_exec_debito, $k, "vencimento"));
									if(($var_ven[1]==$mes)&&($var_ven[2]>=$dia))
									{
										if(mysql_result($B_exec_debito, $k, "vencimento")==$data)
											echo " <FONT STYLE='background-color:#FF8080;font-face:verdana; color:#000000;font-size:8pt;'><B>";
											$banco=mysql_result($B_exec_debito, $k, "banco");
											if($banco==1) echo "Bn ";
											if($banco==2) echo "BRe ";
											if($banco==3) echo "NoC ";
											if($banco==4) echo "CEF ";
											if($banco==5) echo "BB ";
											if($banco==6) echo "It ";
											if($banco==7) echo "Brd ";
											if($banco==8) echo "HSB ";
											if($banco==9) echo "Uni ";
									$var_ban=split(",",mysql_result($B_exec_debito, $k, "valor"));
									echo $var_ban[0]."-".$var_ban[1];
									echo "/";
									echo $var_ven[2]."<BR>";
										if(mysql_result($B_exec_debito, $k, "vencimento")==$data)
											echo " </B></FONT>";
									}
								}
								mysql_close($B_conexao);
echo "
								<BR>
";
								$e_conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
								$e_banco=mysql_select_db("formiga_portal",$e_conexao);
								$e_consulta=mysql_query("SELECT * FROM dados_pessoas ORDER BY data_esp;",$e_conexao);
								$e_regi=mysql_num_rows($e_consulta);
								for ($regatual = 0; $regatual< $e_regi ; $regatual++)
								{
									$TEXT_DATA=mysql_result($e_consulta,  $regatual, 'data_esp');
									$DATA=split("/",$TEXT_DATA);
									if(($DATA[1]==$mes)&&($DATA[0]>=$dia))
									{
										if($data_aniver==$DATA[0]."/".$DATA[1])
											echo " <FONT STYLE='background-color:#FF8080;font-face:verdana; color:#000000;font-size:8pt;'><B>";
										echo mysql_result($e_consulta,  $regatual, 'apelido');
										echo " - (".$DATA[0].")"."<BR>";
										if($data_aniver==$DATA[0]."/".$DATA[1])
											echo "</B></FONT>";
									}
								}
								mysql_close($e_conexao);

echo"
							</TD>
						</TR>
					</TABLE>
				</TD>
				<TD STYLE='vertical-align:top;width:255;text-align:center;background-color:#ffd7bd;'>
					<TABLE STYLE='width:236px'>
						<TR>
							<TD><BR>
								<A HREF='http://www.google.com.br' TARGET='_black6' CLASS='alinkem'>Google</A><BR>
								<A HREF='http://groups.yahoo.com/group/coop2005/?yguid=137836573' TARGET='_black63' CLASS='alinkem'>Yahoo Groups - COOP5</A><BR>
								<BR>
								<A HREF='http://www.poli.usp.br' TARGET='_black6' CLASS='alinkem'>Poli</A><BR>
								<A HREF='http://www.rateria.com.br' TARGET='_black61' CLASS='alinkem'>Rateria</A><BR>
								<BR>
								<A HREF='http://www.banespa.com.br' TARGET=' _black1' CLASS='alinkbac'>Banespa</A><BR>
								<A HREF='http://www.bancoreal.com.br' TARGET='_black2' CLASS='alinkbac'>Banco Real</A><BR>
								<A HREF='http://www.nossacaixa.com.br' TARGET='_black3' CLASS='alinkbac'>Nossa Caixa</A><BR>
								<BR>
								<A HREF='http://www.bol.com.br' TARGET='_black4' CLASS='alinkem'>Bol</A><BR>
								<A HREF='https://www.poli.usp.br/mail' TARGET='_black6' CLASS='alinkem'>Poli Mail</A><BR>
								<BR>
								<A HREF='http://www.usp.br/coseas/cardapio.html' TARGET='_black7' CLASS='alink'>COSEAS - Central</A><BR>
								<A HREF='http://www.usp.br/coseas/cardapiofisica.html' TARGET='_black7' CLASS='alink'>COSEAS - Física</A><BR>
								<BR>
								<A HREF='http://laa.pcs.usp.br/~webbee' TARGET='_black8' CLASS='alink'>WebBee</A><BR>
								<A HREF='http://laa.pcs.usp.br/~kartt/projetos/webbee' TARGET='_black94' CLASS='alink'>WebBee - Produção</A><BR>
								<A HREF='http://laa.pcs.usp.br/~sibio' TARGET='_black85' CLASS='alink'>SIBIO</A><BR>
								<A HREF='http://laa.pcs.usp.br/~kartt/projetos/sibio' TARGET='_black93' CLASS='alink'>SIBIO - Produção</A><BR>
								<A HREF='http://laa.pcs.usp.br/~kartt/projetos/pcs5773' TARGET='_black92' CLASS='alink'>PCS5773 - Produção</A><BR>
								<A HREF='http://laa.pcs.usp.br/~kartt/projetos/coop5' TARGET='_black91' CLASS='alink'>COOP5 - Produção</A><BR><BR>
								<A HREF='http://laa.pcs.usp.br/~kartt/projetos/gk' TARGET='_blackg2' CLASS='alink'>GK - Produção</A><BR>
								<BR>
								<A HREF='http://www.laa.pcs.usp.br/~pzp' TARGET='_blackg12' CLASS='alink'>PZP</A><BR>
								<A HREF='http://laa.pcs.usp.br/~kartt/projetos/pzp' TARGET='_blackg32' CLASS='alink'>PZP - Produção</A><BR>
								<BR>
								<A HREF='http://www.desafio.sebrae.com.br' TARGET='_black12' CLASS='alink'>SEBRAE</A><BR>
								<BR>
							<A HREF='http://www.uol.com.br/vestibuol' TARGET='_black10' CLASS='alink'>Vestibuol</A><BR>
								<A HREF='http://www.mixfm.com.br/' TARGET='_black10cid' CLASS='alink'>MixFM</A><BR>
								<A HREF='http://www.89fm.com.br/aovivo/' TARGET='_rock' CLASS='alink'>89 rock</A><BR><BR>
								<A HREF='http://www.icq.com/webbie' TARGET='_black11' CLASS='alink'>Icq Webbie</A><BR>
							<BR></TD>
						</TR>
					</TABLE>
				</TD>
			</TR>
		</TABLE>
		<BR>
		<TABLE>
			<TR>
				<TD STYLE='text-align:center;'>
					<FONT STYLE='color:gray;font-size:10px;'>
						Skaerrezinho Consultoria de Sistemas Digitais
						<BR>
						Ska® Corporation© 1996/$ano - Todos direitos reservados.
					</FONT>
				</TD>
				<TD>
				</TD>
			</TR>
		</TABLE>
	</BODY>
</HMTL>
";
?>

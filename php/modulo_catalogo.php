<?php

//	Descrição das Variáveis
//	
//	ordem :: Habilita ou não as funções 
//		0	Incluir
//		1	Incluir - Efetuar
//		2	Incluir - Mostrar Erros de Formulário
//		3	Consulta
//		4	Alterar
//		5	Excluir
//		6	Alterar - Efetuar
//		7	Excluir - Efetuar

	echo "
		<SCRIPT>
			function mudador2(linha)
			{
				document.location.href=(linha);	
			}
			function mudador(letr)
			{
				document.location.href=\"modulo_catalogo.php?tnome=\"+document.nome.COMBNOME.value+\"&letra=\"+letr;
			}
		</SCRIPT>

		<HTML>

			<STYLE type= 'text/css'>
				<!--
					.TextBr10            { color: #FFFFFF ; font-size: 11px; font-family: Verdana,Arial, Helvetica }

					A.VBr10:Link      { color: #FFFFFF;text-decoration: none; font-size: 11px; font-family: Verdana,Arial, Helvetica }
					A.VBr10:Visited  { color: #FFFFFF;text-decoration: none; font-size: 11px; font-family: Verdana,Arial, Helvetica }
					A.VBr10:Active   { color: #FFFFFF;text-decoration: none; font-size: 11px; font-family: Verdana,Arial, Helvetica }
					A.VBr10:Hover   { text-decoration: underline }

					A.MenuLtr:Link      { color: #FFFFFF;text-decoration: none; font-weight:bold; font-size: 11px; font-family: Verdana,Arial, Helvetica }
					A.MenuLtr:Visited  { color: #FFFFFF;text-decoration: none; font-weight:bold; font-size: 11px; font-family: Verdana,Arial, Helvetica }
					A.MenuLtr:Active   { color: #FFFFFF;text-decoration: none; font-weight:bold; font-size: 11px; font-family: Verdana,Arial, Helvetica }
					A.MenuLtr:Hover   { background-color: #000000; text-decoration: underline; font-weight:normal; }

				-->
			</STYLE>

			<BODY CELLSPACING='0' CELLPADDING='0' BORDER='0'>
				<TABLE CELLSPACING='0' BORDER='0' CELLPADDING='0' WIDTH='750' BGCOLOR=#FFFFFF ALIGN='center'>
					<TR>
						<TD WIDTH='100%'>
							<FONT size=5 face=verdana><B>FORMIGA  :: MÓDULO CATÁLOGO</B></FONT>
							<HR COLOR='#000000'>
							<CENTER>
								<BR>
								<INPUT type='button' value='Voltar para Início'		name='BT_sair'			style='width: 175px; background-color: #AAAAAA;		border-color:#000000; border-width:1;'	onClick=\"javascript:mudador2('../modulo_principal.php')\">
								<INPUT type='button' value='Modulo de Consulta'	name='BT_Modulo_de_Consulta'	style='width: 175px; background-color: #AAAAAA;		border-color:#000000; border-width:1;'	onClick=\"javascript:mudador2('modulo_consulta.php')\">
								<INPUT type='button' value='Modulo de Bancos' 	name='BT_Modulo_de_Banco'	style='width: 175px; background-color: ; border-color:#000000; border-width:1;'  onClick=\"javascript:mudador2('modulo_banco.php')\">
								<INPUT type='button' value='Incluir Novo'		name='BT_incluir'			style='width: 175px; background-color: #ffd7bd;		border-color:#000000; border-width:1;'	onClick=\"javascript:mudador2('modulo_comum.php?tipo_consulta=1&ordem=0&tnome=$tnome&letra=$letra')\">
								<BR><BR>
							</CENTER>
							<BR>
							<TABLE CELLSPACING='1' BORDER='0' CELLPADDING='0' ALIGN='center' WIDTH='730' BGCOLOR='#000000'>
								<TR>
									<TD BGCOLOR='gray' ALIGN='right'>
										<FORM NAME='nome' METHOD='POST' ACTION='modulo_catalogo.php'>
											<SELECT NAME='COMBNOME' ONCHANGE=\"javascript:mudador('$letra')\" STYLE='width: 160px; border-color: black; border-width: 1; border-style: solid; font-size: 13; font-family: verdana;'>
												<OPTION VALUE=0>&nbsp;Apelido
												<OPTION VALUE=1>&nbsp;Nome
											</SELECT>";
												if($tnome!="")
												{
													echo"
														<SCRIPT>
															document.nome.COMBNOME.selectedIndex=$tnome;
														</SCRIPT>
													";
												}
echo "	
									</TD>
									<TD OnClick=\"javascript:mudador('')\"	"; if($letra!='')  { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='78'><A HREF=\"javascript:mudador2('modulo_catalogo.php?tnome=');\" class='MenuLtr'>TODOS</A></TD>
									<TD OnClick=\"javascript:mudador('a')\"	"; if($letra!='a') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('a')\" class='MenuLtr'>A</A></TD>
									<TD OnClick=\"javascript:mudador('b')\"	"; if($letra!='b') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('b')\" class='MenuLtr'>B</A></TD>
									<TD OnClick=\"javascript:mudador('c')\"	"; if($letra!='c') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('c')\" class='MenuLtr'>C</A></TD>
									<TD OnClick=\"javascript:mudador('d')\"	"; if($letra!='d') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('d')\" class='MenuLtr'>D</A></TD>
									<TD OnClick=\"javascript:mudador('e')\"	"; if($letra!='e') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('e')\" class='MenuLtr'>E</A></TD>
									<TD OnClick=\"javascript:mudador('f')\"	"; if($letra!='f') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('f')\" class='MenuLtr'>F</A></TD>
									<TD OnClick=\"javascript:mudador('g')\"	"; if($letra!='g') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('g')\" class='MenuLtr'>G</A></TD>
									<TD OnClick=\"javascript:mudador('h')\"	"; if($letra!='h') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('h')\" class='MenuLtr'>H</A></TD>
									<TD OnClick=\"javascript:mudador('i')\"	"; if($letra!='i') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('i')\" class='MenuLtr'>I</A></TD>
									<TD OnClick=\"javascript:mudador('j')\"	"; if($letra!='j') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('j')\" class='MenuLtr'>J</A></TD>
									<TD OnClick=\"javascript:mudador('k')\"	"; if($letra!='k') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('k')\" class='MenuLtr'>K</A></TD>
									<TD OnClick=\"javascript:mudador('l')\"	"; if($letra!='l') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('l')\" class='MenuLtr'>L</A></TD>
									<TD OnClick=\"javascript:mudador('m')\"	"; if($letra!='m') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('m')\" class='MenuLtr'>M</A></TD>
									<TD OnClick=\"javascript:mudador('n')\"	"; if($letra!='n') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('n')\" class='MenuLtr'>N</A></TD>
									<TD OnClick=\"javascript:mudador('o')\"	"; if($letra!='o') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('o')\" class='MenuLtr'>O</A></TD>
									<TD OnClick=\"javascript:mudador('p')\"	"; if($letra!='p') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('p')\" class='MenuLtr'>P</A></TD>
									<TD OnClick=\"javascript:mudador('q')\"	"; if($letra!='q') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('q')\" class='MenuLtr'>Q</A></TD>
									<TD OnClick=\"javascript:mudador('r')\"	"; if($letra!='r') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('r')\" class='MenuLtr'>R</A></TD>
									<TD OnClick=\"javascript:mudador('s')\"	"; if($letra!='s') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('s')\" class='MenuLtr'>S</A></TD>
									<TD OnClick=\"javascript:mudador('t')\"	"; if($letra!='t') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('t')\" class='MenuLtr'>T</A></TD>
									<TD OnClick=\"javascript:mudador('u')\"	"; if($letra!='u') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('u')\" class='MenuLtr'>U</A></TD>
									<TD OnClick=\"javascript:mudador('v')\"	"; if($letra!='v') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('v')\" class='MenuLtr'>V</A></TD>
									<TD OnClick=\"javascript:mudador('x')\"	"; if($letra!='x') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('x')\" class='MenuLtr'>X</A></TD>
									<TD OnClick=\"javascript:mudador('z')\"	"; if($letra!='z') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('z')\" class='MenuLtr'>Z</A></TD>
									<TD OnClick=\"javascript:mudador('y')\"	"; if($letra!='y') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('y')\" class='MenuLtr'>Y</A></TD>
									<TD OnClick=\"javascript:mudador('w')\"	"; if($letra!='w') { echo "bgcolor='#006699'"; } else { echo "bgcolor=#000000"; }; echo" align=center width='18'><A HREF=\"javascript:mudador('w')\" class='MenuLtr'>W</A></TD>
								</TR>
							</TABLE>
							<TABLE CELLSPACING='1' BORDER='0' CELLPADDING='0' ALIGN='center' WIDTH='730' HEIGHT='20' BGCOLOR='#000000'>
								<TR>
									<TD COLSPAN='29'>
										<FONT CLASS='Textbr10'>&nbsp;&nbsp; Pesquisando pela Letra ::&nbsp;
										<B>
";
											if ($letra=="")
												echo "Todas as Letras";
												else
													echo strtoupper($letra);
											if ($tnome=="0")
												echo "</B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;no campo :: &nbsp;&nbsp; <B>Apelido";
											if ($tnome=="1")
												echo "</B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;no campo :: &nbsp;&nbsp;<B>Nome";
echo"
										</B>
										</FONT>
									</TD>
								</TR>
							</TABLE>
		
";
								$db = mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
								mysql_select_db("formiga_portal", $db);
								if ($tnome=="0")
									$sql2 = "SELECT * FROM dados_pessoas WHERE apelido LIKE '$letra%' ORDER BY apelido";
								if ($tnome=="1")
									$sql2 = "SELECT * FROM dados_pessoas WHERE nome LIKE '$letra%' ORDER BY nome";
								if (($tnome=="3")||($tnome=="")){
									$sql2 = "SELECT * FROM dados_pessoas ORDER BY apelido";}
								$result2 = mysql_query($sql2, $db);
								$reg= mysql_num_rows($result2);
echo "
							<TABLE CELLSPACING='1' BORDER='0' CELLPADDING='0' ALIGN='center' WIDTH='730' HEIGTH='24' BGCOLOR='gray'>
								<TR>
									<TD HEIGTH='20' COLSPAN='3'></TD>
								</TR>
								<TR>
									<TD>
										<BR>
										<TABLE CELLSPACING='2' BORDER='0' CELLPADDING='0' ALIGN='center'>
											<TR>
												<TD BGCOLOR='black' WIDTH='60' HEIGHT='18'></TD>
												<TD BGCOLOR='black' WIDTH='180'><B><FONT FACE='verdana' SIZE='1' COLOR='#FFFFFF'>&nbsp;&nbsp;&nbsp;Apelido</FONT></B></TD>
												<TD BGCOLOR='black' WIDTH='350'><B><FONT FACE='verdana' SIZE='1' COLOR='#FFFFFF'>&nbsp;&nbsp;&nbsp;Nome</FONT></B></TD>
												<TD BGCOLOR='black' WIDTH='110' ALIGN='center'><B><FONT FACE='verdana' SIZE='1' COLOR='#FFFFFF'>Tel Residencial</FONT></B></TD>
											</TR>
";
											for ($regatual = 0; $regatual< $reg ; $regatual++)
											{
												$db_Apelido = mysql_result($result2, $regatual, "apelido"); 
												$db_Nome = mysql_result($result2, $regatual, "nome"); 

											// TELEFONES
												if(mysql_result($result2, $regatual, "Tel_res")!="")
													$db_Tel_res = mysql_result($result2, $regatual, "Tel_res");
												else
												if(mysql_result($result2, $regatual, "Tel_res1")!="")
													$db_Tel_res = mysql_result($result2, $regatual, "Tel_res1");
												else
												if(mysql_result($result2, $regatual, "Tel_cel")!="")
													$db_Tel_res = mysql_result($result2, $regatual, "Tel_cel");
												else
												if(mysql_result($result2, $regatual, "Tel_cel1")!="")
													$db_Tel_res = mysql_result($result2, $regatual, "Tel_cel1");
												else
												if(mysql_result($result2, $regatual, "Tel_tramp")!="")
													$db_Tel_res = mysql_result($result2, $regatual, "Tel_tramp");
												else
												if(mysql_result($result2, $regatual, "Tel_tramp1")!="")
													$db_Tel_res = mysql_result($result2, $regatual, "Tel_tramp1");
												else
												if(mysql_result($result2, $regatual, "Tel_outro")!="")
													$db_Tel_res = mysql_result($result2, $regatual, "Tel_outro");
												else
												if(mysql_result($result2, $regatual, "Tel_outro1")!="")
													$db_Tel_res = mysql_result($result2, $regatual, "Tel_outro1");
												else
												if(mysql_result($result2, $regatual, "Tel_fax")!="")
													$db_Tel_res = mysql_result($result2, $regatual, "Tel_fax");
												else
												if(mysql_result($result2, $regatual, "Tel_fax1")!="")
													$db_Tel_res = mysql_result($result2, $regatual, "Tel_fax1");
												else
												if(mysql_result($result2, $regatual, "telbip_opera")!="")
													$db_Tel_res = mysql_result($result2, $regatual, "telbip_opera");
												else
												if(mysql_result($result2, $regatual, "trampo_secretaria_tel")!="")
													$db_Tel_res = mysql_result($result2, $regatual, "trampo_secretaria_tel");
												else
													$db_Tel_res="";
												
												$cor=rand(0,1).rand(0,1).rand(5,6).rand(5,6).rand(8,9).rand(8,9);
												$var=mysql_result($result2, $regatual, "id"); 
												echo "
													<TR>
														<TD BGCOLOR='#$cor' ALIGN='center' CLASS='menu' >
															<A HREF='javascript:mudador2(\"modulo_comum.php?tipo_consulta=1&ordem=5&tnome=$tnome&letra=$letra&var_id=$var\")' ONMOUSEOUT=\"javascript:layer.bgcolor=red\"  class='VBr10'>E</A>
															<A HREF='javascript:mudador2(\"modulo_comum.php?tipo_consulta=1&ordem=4&tnome=$tnome&letra=$letra&var_id=$var\")' class='VBr10'>A</A>
															<A HREF='javascript:mudador2(\"modulo_comum.php?tipo_consulta=1&ordem=3&tnome=$tnome&letra=$letra&var_id=$var\")' class='VBr10'>C</A>

														</TD>
														<TD BGCOLOR='#$cor' ><FONT SIZE='1'>&nbsp;&nbsp;&nbsp;<A href=\"javascript:mudador2('modulo_comum.php?tipo_consulta=1&tnome=$tnome&letra=$letra&ordem=3&var_id=$var' )\" class='VBr10'>$db_Apelido</A></TD>
														<TD BGCOLOR='#$cor' ><FONT SIZE='1'>&nbsp;&nbsp;&nbsp;<A href=\"javascript:mudador2('modulo_comum.php?tipo_consulta=1&tnome=$tnome&letra=$letra&ordem=3&var_id=$var' )\" class='VBr10'>$db_Nome</A></TD>
														<TD BGCOLOR='#$cor' ALIGN='center'><FONT SIZE='1'><A href=\"javascript:mudador2('modulo_comum.php?tipo_consulta=1&tnome=$tnome&letra=$letra&ordem=3&var_id=$var' )\" class='VBr10'>$db_Tel_res</A></TD>
													</TR>
";
											}
											mysql_close($db);
echo "
										</TABLE>
									</TD>
								</TR>
								<TR>
									<TD height=25 colspan=3></TD>
								</TR>
							</TABLE>
							<BR>
							<HR COLOR='#000000'>
							<TABLE  VALIGN='middle' ALIGN='center' WIDTH='750' BGCOLOR='#FFFFFF' CELLPADING='0' CELLSPACING='0' BORDER='0' HEIGHT='25'>
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
											<SELECT ONCHANGE=\"javascript:mudador2(document.FR.links.value)\" NAME='links' STYLE='FONT-FAMILY:verdana; FONT-SIZE:11px; BORDER-WIDTH:0; WIDTH:150; COLOR:#FFFFFF; BACKGROUND-COLOR:#000000;'>
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
											<A HREF=\"javascript:window.close()\" class='VBr10'>Fechar</A>
									</TD>
								</TR>	
							</TABLE>	
						</TD>
					</TR>
				</TABLE>
			</BODY>
		</FORM>
	</HTML>
";
?>
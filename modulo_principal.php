<?php

	$hoje=getdate();

	function print_banco()
	{
		$data=date('Y-m-j');

		$B_conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
		$B_banco=mysql_select_db("formiga_portal",$B_conexao);
		$B_exec_debito=mysql_query("SELECT * FROM banco WHERE vencimento = '$data'", $B_conexao);
		$B_linhas_debito=mysql_num_rows($B_exec_debito);

		for($k=0;$k < $B_linhas_debito;$k++)
		{
			$banco=mysql_result($B_exec_debito, $k, "banco");
					if($banco==1) echo "Banespa";
					if($banco==2) echo "Banco Real";
					if($banco==3) echo "Nossa Caixa";
					if($banco==4) echo "Caixa Economica Federal";
					if($banco==5) echo "Banco Brasil";
					if($banco==6) echo "Itaú";
					if($banco==7) echo "Bradesco";
					if($banco==8) echo "HSBC";
					if($banco==9) echo "Unibanco";
			echo " - ";
			echo mysql_result($B_exec_debito, $k, "valor");
			echo " - ";
			$var_ven=split("-",mysql_result($B_exec_debito, $k, "vencimento"));
			echo "(".$var_ven[2].")";
		}

		mysql_close($B_conexao);
	}

	function print_datas($qual,$mes,$flag)
	{
		global $hoje;
		$T_conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
		$T_banco=mysql_select_db("formiga_portal",$T_conexao);
		$T_consulta=mysql_query("SELECT * FROM dados_pessoas ORDER BY aniver;",$T_conexao);
		$T_regi=mysql_num_rows($T_consulta);
		for ($regatual = 0; $regatual< $T_regi ; $regatual++)
		{
			$TEXT_DATA=mysql_result($T_consulta,  $regatual, $qual);
			$DATA=split("/",$TEXT_DATA);
			if($DATA[1]==$mes)
			{
				if($flag==1)
				{
					if($DATA[0]==$hoje['mday']){
						echo "
						<A HREF='javascript:mudador(\"php/modulo_comum.php?ordem=3&tipo_consulta=0&var_id=";echo mysql_result($T_consulta,  $regatual, 'id'); echo "\");' class='MailBl11'>";
						echo $qual;
						echo " - ";
						echo mysql_result($T_consulta,  $regatual, 'apelido');						
						echo "</A><BR>";
					} 

				}
				if($flag==2)
				{
					if(($DATA[0]==$hoje['mday'])&&($DATA[2]==$hoje['year'])){
						echo mysql_result($T_consulta,  $regatual, 'apelido');						
						echo  " (";
						echo $DATA[0];
						echo "/";
						echo $DATA[1];
						echo "/";
						echo $DATA[2];
						echo")\n";
						} 

				}
				if($flag==0)
				{
					echo $DATA[0];
					echo  " - ";
					echo mysql_result($T_consulta,  $regatual, 'apelido');						
					echo "\n";
				}			
			}
		}
		$flag=0;
	}

	function print_combo_mes()
	{
		global $mes_escolhe,$hoje,$id;
		echo"
			<SELECT NAME='COMBO_mes' ONCHANGE=\"javascript:mudador('modulo_principal.php?mes_escolhe='+document.FR_comum.COMBO_mes.value+'&id=$id');\" STYLE='FONT-SIZE=10px; FONT-FAMILY=verdana; BORDER-WIDTH:0; WIDTH:88; COLOR:#000000; BACKGROUND-COLOR:#DDDDDD;'>
				<OPTION VALUE='1'>Janeiro
				<OPTION VALUE='2'>Fevereiro
				<OPTION VALUE='3'>Março
				<OPTION VALUE='4'>Abril
				<OPTION VALUE='5'>Maio
				<OPTION VALUE='6'>Junho
				<OPTION VALUE='7'>Julho
				<OPTION VALUE='8'>Agosto
				<OPTION VALUE='9'>Setembro
				<OPTION VALUE='10'>Outubro
				<OPTION VALUE='11'>Novembro
				<OPTION VALUE='12'>Dezembro
			</SELECT>
		";
		if(($mes_escolhe=="")||($mes_escolhe==0))
			$mes_escolhe=$hoje['mon'];
		echo"
			<SCRIPT>
				document.FR_comum.COMBO_mes.value=$mes_escolhe;
			</SCRIPT>
		";
	}

	function print_mes($mes_print,$acr)
	{
		global $hoje, $mes_escolhe;
		if(($mes_print=="0")||($mes_escolhe==""))
			$mes_print=$hoje['mon'];
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
	
echo "
<HTML>
	<STYLE type=\"text/css\">
		<!--
			A.MailBL11:Link      { color: #FFFFFF;text-decoration: none; font-size: 10px; font-family: Verdana,Arial, Helvetica }
			A.MailBL11:Visited   { color: #FFFFFF;text-decoration: none; font-size: 10px; font-family: Verdana,Arial, Helvetica }
			A.MailBL11:Active   { color: #FFFFFF;text-decoration: none; font-size: 10px; font-family: Verdana,Arial, Helvetica }
			A.MailBL11:HOver   { color:#FFFFFF;text-decoration: underline }
		-->
	</STYLE>

<!--TITULO + BODY---------------------------------------------------------------------------------------------------------------------->

	<TITLE>Formiga</TITLE>
	<BODY BGCOLOR='#FFFFFF'>

<!--SCRIPTS---------------------------------------------------------------------------------------------------------------------->
	
	<SCRIPT>
		<!--
			function mudador(linha)
			{
				window.location.href = 'http://www.cartolano.com.br/_disabled/formiga/'+linha;
			}
		-->
	</SCRIPT>

<!--CORPO---------------------------------------------------------------------------------------------------------------------->

	<FORM NAME='FR_comum' METHOD='POST' ACTION='modulo_principal.php?ordem=$ordem'>
	<TABLE ALIGN='center' WIDTH='750' BGCOLOR='#FFFFFF' CELLPADING='0' CELLSPACING='0'>
		<TR>
			<TD WIDTH='100%'>

<!--CABEÇALHO---------------------------------------------------------------------------------------------------------------------->

					<FONT FACE='verdana' COLOR='#000000' STYLE='FONT-SIZE:40px;'>
						<B>
							Formiga :: 
						</B>
					</FONT>
					<FONT FACE='verdana' COLOR='gray' STYLE='FONT-SIZE:11px;'>
						Escrito, pensado e desenvolvido por Etienne Cartolano (KARTT).
					</FONT>
					<HR COLOR='#000000'>
			</TD>
		</TR>
	</TABLE>

<!--COMANDO SUPERIOR----------------------------------------------------------------------------------------------------------->

	<TABLE ALIGN='center' WIDTH='750' HEIGHT='25' BGCOLOR='#1099c6' CELLPADING='0' CELLSPACING='1'>
		<TR>
			<TD VALIGN='middle'>
				<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>								
					&nbsp;Usuário :: <B>GANDAUM</B>
				</FONT>
			</TD>
			<TD BGCOLOR='#000000' WIDTH='148' ALIGN='center'>
				<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>								
					<B>Mês :: &nbsp;";
						echo print_combo_mes();
						echo"</B>
				</FONT>
			</TD>
			<TD ALIGN='center' BGCOLOR='#000000' WIDTH='242'>
				<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>
					B R A S I L , ";echo $hoje['mday']; echo" de "; print_mes(0,0); echo " de ";  echo $hoje['year']; echo"
				</FONT>
			</TD>
		</TR>
	</TABLE>

<!--MESES + RAPIDINHA + ANIVER + DATA ESP + VALIDADE--------------------------------------------------------------------------------------------------->

	<TABLE ALIGN='center' WIDTH='750' CELLPADING='0'  CELLSPACING='0' BGCOLOR='#1099c6'>
		<TR>

		<!--RAPIDINHA------------------------------------------------------------------------------------->
				<TD  WIDTH='1'  BGCOLOR='#1099c6'></TD>
				<TD VALIGN='TOP' BGCOLOR='#1099c6'>	
					<TABLE ALIGN='center' WIDTH='100%' BGCOLOR='#006699' CELLPADING='0' CELLSPACING='0' BORDER='0' HEIGHT='142'>

					<!--CABECALHO------------------------------------------------------------------------------------->

						<TR>
							<TD BGCOLOR='#006699' HEIGHT='20' VALIGN='bottom'>
								<FONT FACE='verdana' COLOR='#FFFFFF' STYLE='FONT-SIZE: 10px;'>
									<B>&nbsp;&nbsp;Rapidinha...</B>
								</FONT>
							</TD>
						</TR>

					<!--COMBO------------------------------------------------------------------------------------->

						<TR>
							<TD WIDTH='82%' HEIGHT='20' ALIGN='center'>
								<SELECT ONCHANGE=\"javascript:print_2(document.FR_comum.COMB_NOME.value)\" NAME='COMB_NOME' STYLE='FONT-SIZE=10px; FONT-FAMILY=verdana; BORDER-WIDTH:0; WIDTH:200; COLOR:#000000; BACKGROUND-COLOR:#DDDDDD;'>
									<OPTION VALUE=''>Procure aqui...</OPTION>
		";
								$conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
								$banco=mysql_select_db("formiga_portal",$conexao);
								$var="SELECT * FROM dados_pessoas ORDER BY apelido";
								$executar=mysql_query("$var", $conexao);
								$linhas=mysql_num_rows($executar);
								$flag=0;
									for($flag=0;$flag<$linhas;$flag++)
									{
										if(mysql_result($executar, $flag, "apelido")!="")
										{
											if(mysql_result($executar, $flag, "id")==$id)
											{
												echo "<OPTION SELECTED VALUE=\"";
											}
											else
												echo "<OPTION VALUE=\"";
											echo mysql_result($executar, $flag, "id");
										echo "\">";
											echo mysql_result($executar, $flag, "apelido");
										}
									}
		echo"
								</SELECT>
							</TD>
							<TD WIDTH='18%' HEIGHT='20' >";
									if($id!="")
									{
										echo"
											<A HREF='javascript:mudador(\"php/modulo_comum.php?ordem=3&tipo_consulta=0&var_id=$id\")' class='MailBl11'>C</A>
											<A HREF='javascript:mudador(\"php/modulo_comum.php?ordem=4&tipo_consulta=0&var_id=$id\")' class='MailBl11'>A</A>
											<A HREF='javascript:mudador(\"php/modulo_comum.php?ordem=5&tipo_consulta=0&var_id=$id\")' class='MailBl11'>E</A>
										";
									}
		echo"
									<SCRIPT>
										function print_2(var_combo)
										{
											window.location.href=\"modulo_principal.php?id=\"+var_combo+\"&mes_escolhe=\"+$mes_escolhe;
										}						
									</SCRIPT>
							</TD>
						</TR>

					<!--DADOS------------------------------------------------------------------------------------->
	
						<TR>
							<TD VALIGN='top' ALIGN='center' BGCOLOR='#000000' COLSPAN='2'>
								<TABLE ALIGN='center' WIDTH='99%' CELLPADING='0' CELLSPACING='0' BORDER='1'BORDERCOLOR=#006699 VALIGN='top'>

";
								if($id!=""){
									$var_dados="SELECT * FROM dados_pessoas WHERE id=$id";
									$executar1=mysql_query("$var_dados", $conexao);
								}
echo "
								<!--NOME------------------------------------------------------------------------------------->

									<TR>
										<TD HEIGHT='15' WIDTH='100%' COLSPAN='2'>
											<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>&nbsp;<A HREF='javascript:mudador(\"php/modulo_comum.php?ordem=3&tipo_consulta=0&var_id="; echo mysql_result($executar1, "0", "id"); echo"\")' class='MailBl11'>";
												if($id!=""){
													 echo  mysql_result($executar1, "0", "nome");}
echo"
											</A></FONT>
										</TD>
									</TR>


								<!--TELEFONE------------------------------------------------------------------------------------->

									<TR>
										<TD HEIGHT='15' WIDTH='50%' >
											<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>&nbsp;<A HREF='javascript:mudador(\"php/modulo_comum.php?ordem=3&tipo_consulta=0&var_id="; echo mysql_result($executar1, "0", "id"); echo"\")' class='MailBl11'>";
												if($id!=""){
													if (mysql_result($executar1, "0", "tel_res")!='')
														echo  mysql_result($executar1, "0", "tel_res");
														else
														echo  mysql_result($executar1, "0", "tel_tramp");
												}
echo"

											</A></FONT>
										</TD>

								<!--CELULAR------------------------------------------------------------------------------------->

										<TD HEIGHT='15' WIDTH='50%'>
											<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF' >&nbsp;<A HREF='javascript:mudador(\"php/modulo_comum.php?ordem=3&tipo_consulta=0&var_id="; echo mysql_result($executar1, "0", "id"); echo"\")' class='MailBl11'>";
												if($id!=""){												 
													echo  mysql_result($executar1, "0", "tel_cel");}
echo"

											</A></FONT>
										</TD>
									</TR>

								<!--EMAIL------------------------------------------------------------------------------------->

									<TR>
										<TD HEIGHT='15' WIDTH='100%' COLSPAN='2'>
											<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>&nbsp;<A HREF='mailto:"; echo mysql_result($executar1, "0", "email"); echo"' class='MailBl11'>";
												if($id!=""){
													 echo  mysql_result($executar1, "0", "email");}
echo"

											</A></FONT>
										</TD>
									</TR>

								<!--RELACIONAMENTO------------------------------------------------------------------------------------->


									<TR>
										<TD HEIGHT='15' WIDTH='100%' COLSPAN='2'>
											<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>&nbsp;<A HREF='javascript:mudador(\"php/modulo_comum.php?ordem=3&tipo_consulta=0&var_id="; echo mysql_result($executar1, "0", "id"); echo"\")' class='MailBl11'>";
												if($id!=""){
													$R_flag=mysql_result($executar1, "0", "relaciona");
													$R_consulta=mysql_query("SELECT * FROM relacionamento WHERE id=$R_flag;",$conexao);
													$R_regi=mysql_num_rows($R_consulta);
													if($R_regi!=0)
													echo mysql_result($R_consulta, "0", "tipo");}
echo"
											</A></FONT>
										</TD>
									</TR>

								<!--PROFISSAO------------------------------------------------------------------------------------->


									<TR>
										<TD HEIGHT='15' WIDTH='100%' COLSPAN='2'>
											<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>&nbsp;<A HREF='javascript:mudador(\"php/modulo_comum.php?ordem=3&tipo_consulta=0&var_id="; echo mysql_result($executar1, "0", "id"); echo"\")' class='MailBl11'>";
												if($id!=""){
													$R1_flag=mysql_result($executar1, "0", "profissao");
													$R1_consulta=mysql_query("SELECT * FROM profissao WHERE id=$R1_flag;",$conexao);
													$R1_regi=mysql_num_rows($R1_consulta);
													if($R1_regi!=0)
													echo mysql_result($R1_consulta, "0", "tipo");}
echo"
											</A></FONT>
										</TD>
									</TR>
								<!--ANVER +  ICQ------------------------------------------------------------------------------------->					

									<TR>
										<TD HEIGHT='15' >
											<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>&nbsp;<A HREF='javascript:mudador(\"php/modulo_comum.php?ordem=3&tipo_consulta=0&var_id="; echo mysql_result($executar1, "0", "id"); echo"\")' class='MailBl11'>";
												if($id!=""){
													$R1_flag=mysql_result($executar1, "0", "id");
													$R1_consulta=mysql_query("SELECT * FROM dados_pessoas WHERE id=$R1_flag;",$conexao);
													$R1_regi=mysql_num_rows($R1_consulta);
													echo mysql_result($R1_consulta, "0", "icq");}
echo "
											</A></FONT>
										</TD>
										<TD HEIGHT='15' WIDTH='200'>
											<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>&nbsp;<A HREF='javascript:mudador(\"php/modulo_comum.php?ordem=3&tipo_consulta=0&var_id="; echo mysql_result($executar1, "0", "id"); echo"\")' class='MailBl11'>";
												if($id!=""){
													$R1_flag=mysql_result($executar1, "0", "id");
													$R1_consulta=mysql_query("SELECT * FROM dados_pessoas WHERE id=$R1_flag;",$conexao);
													$R1_regi=mysql_num_rows($R1_consulta);
													echo mysql_result($R1_consulta, "0", "aniver");}
echo "
											</A></FONT>
										</TD>
									</TR>
								</TABLE>
							</TD>
						</TR>
					</TABLE>
				</TD>
				
		<!--DATAESP + VALIDADE------------------------------------------------------------------------------------->
	
				<TD  BGCOLOR='#1099c6'  WIDTH='240' HEIGHT='142' VALIGN='top'>
					<TABLE ALIGN='center' WIDTH='100%' BGCOLOR='#006699' CELLPADING='0' CELLSPACING='0' BORDER='0' HEIGHT='142' VALIGN='top'>

				<!-- DATA ESP--------------------------------------------------------------------->

					<!--CABECALHO------------------------------------------------------------------------------------->
	
						<TR>
							<TD HEIGHT='45' VALIGN='middle'>
								<FONT FACE='verdana' COLOR='#FFFFFF' STYLE='FONT-SIZE: 10px;'>
									<B>&nbsp;Data Especial (";print_mes($mes_escolhe,0); echo ")</B>
								</FONT><BR>

					<!--NOMES------------------------------------------------------------------------------------->

								&nbsp;<TEXTAREA ONFOCUS='blur(this)' BORDER='0' STYLE='FONT-FAMILY:verdana; COLOR:#FFFFFF; FONT-SIZE:11px; BACKGROUND-COLOR:#000000; BORDER-WIDTH:0; WIDTH:230; HEIGHT:55px;'>";
								if($mes_escolhe=="")
									print_datas('data_esp',$hoje['mon'],0);
									else
										print_datas('data_esp',$mes_escolhe,0);
								echo "</TEXTAREA>
							</TD>
						</TR>

				<!-- VALIDADE------------------------------------------------------------------->

					<!--CABECALHO------------------------------------------------------------------------------------->
	
						<TR>
							<TD HEIGHT='45' VALIGN='middle'>
								<FONT FACE='verdana' COLOR='#FFFFFF' STYLE='FONT-SIZE: 10px;'>
									<B>&nbsp;Vencimentos (";print_mes($mes_escolhe,0); echo ")</B>
								</FONT><BR>

					<!--NOMES------------------------------------------------------------------------------------->

								&nbsp;<TEXTAREA ONFOCUS='blur(this)' BORDER='0' STYLE='FONT-FAMILY:verdana; COLOR:#FFFFFF; FONT-SIZE:11px; BACKGROUND-COLOR:#000000; BORDER-WIDTH:0; WIDTH:230; HEIGHT:40px;'>";
								if($mes_escolhe=="")
									print_datas('cart_emissao_validade',$hoje['mon'],2);
									else
										print_datas('cart_emissao_validade',$mes_escolhe,2);

									$data=date('Y-m-j');

									$exec_debito=mysql_query("SELECT * FROM banco WHERE vencimento >= '$data' ORDER BY vencimento", $conexao);
									$linhas_debito=mysql_num_rows($exec_debito);

									for($k=0;$k < $linhas_debito;$k++)
									{
										$venci=split("-",mysql_result($exec_debito, $k, "vencimento"));
										if(($venci[1]==$mes_escolhe)&&($venci[0]==$hoje['year']))
										{
											$banco=mysql_result($exec_debito, $k, "banco");
											if($banco==1) echo "Banespa";
											if($banco==2) echo "Banco Real";
											if($banco==3) echo "Nossa Caixa";
											if($banco==4) echo "Caixa Economica Federal";
											if($banco==5) echo "Banco Brasil";
											if($banco==6) echo "Itaú";
											if($banco==7) echo "Bradesco";
											if($banco==8) echo "HSBC";
											if($banco==9) echo "Unibanco";
											echo " - ";
											echo mysql_result($exec_debito, $k, "valor");
											echo " - ";
											$var_ven=split("-",mysql_result($exec_debito, $k, "vencimento"));
											echo "(".$var_ven[2].")"."\n";
										}
									}
								echo"</TEXTAREA>
							</TD>
						</TR>
					</TABLE>
				</TD>

		<!--ANIVERSARIO-------------------------------------------------------------------------------------------->
	
				<TD  BGCOLOR='#1099c6' WIDTH='240' HEIGHT='142' VALIGN='top'>
					<TABLE ALIGN='center' WIDTH='100%' BGCOLOR='#006699' CELLPADING='0' CELLSPACING='0' BORDER='0' HEIGHT='142' VALIGN='top'>

				<!-- MES ATUAL--------------------------------------------------------------------->

					<!--CABECALHO------------------------------------------------------------------------------------->
	
						<TR>
							<TD HEIGHT='45' VALIGN='middle'>
								<FONT FACE='verdana' COLOR='#FFFFFF' STYLE='FONT-SIZE: 10px;'>
									<B>&nbsp;Aniversários (";print_mes($mes_escolhe,0); echo ")</B>
								</FONT><BR>

					<!--NOMES------------------------------------------------------------------------------------->

								&nbsp;<TEXTAREA ONFOCUS='blur(this)' BORDER='0' STYLE='FONT-FAMILY:verdana; COLOR:#FFFFFF; FONT-SIZE:11px; BACKGROUND-COLOR:#000000; BORDER-WIDTH:0; WIDTH:230; HEIGHT:118px;'>";
								if($mes_escolhe=="")
									print_datas('aniver',$hoje['mon'],0);
									else
										print_datas('aniver',$mes_escolhe,0);
								echo"</TEXTAREA>
							</TD>
						</TR>
					</TABLE>

				</TD>
				<TD WIDTH='1' BGCOLOR='#1099c6'></TD>
			</TR>
			<TR>
				<TD HEIGHT='4'  BGCOLOR='#1099c6' COLSPAN='4'></TD>
			</TR>
		</TABLE>		
		<HR COLOR='#000000' WIDTH= '750'>

<!--DIVISAO CORPO------------------------------------------------------------------------------------------------------------------------->

	<!--MENU CORPO -------------------------------------------------------------------------------------------------------------------------->

		<TABLE  VALIGN='middle' ALIGN='center' WIDTH='750' BGCOLOR='#FFFFFF' CELLPADING='0' CELLSPACING='0' BORDER='0'>
			<TR>
	
				<!--MODULOS -------------------------------------------------------------------------------------------------------------------------->

				<TD WIDTH='240'>
					<TABLE  VALIGN='middle' WIDTH='220' BGCOLOR='#1099c6' CELLPADING='0' CELLSPACING='0' BORDER='0' ALIGN='center' HEIGHT='175'>
						<TR>

						<!--TITULO -------------------------------------------------------------------------------------------------------------------------->

							<TD ALIGN='left' HEIGHT='22' bgcolor=#000000>
								<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>
									&nbsp;&nbsp;&nbsp;Módulos
								</FONT>
							</TD>
						</TR>
						<TR>

						<!--CONSULTA -------------------------------------------------------------------------------------------------------------------------->

							<TD ALIGN='center'>
								<INPUT TYPE='button' VALUE='CONSULTA'  ONCLICK=\"javascript:mudador('./php/modulo_consulta.php');\" STYLE='width:110px; FONT-FAMILY:verdana; FONT-SIZE:12px;'>
							</TD>
						</TR>
						<TR>

						<!--CATALOGO -------------------------------------------------------------------------------------------------------------------------->

							<TD ALIGN='center'>
								<INPUT TYPE='BUTTON' VALUE='CATÁLOGO' 	ONCLICK=\"javascript:mudador('./php/modulo_catalogo.php?letra=a&tnome=0');\"	STYLE='width:110px; FONT-FAMILY:verdana; FONT-SIZE:12px;'>
							</TD>
						</TR>
						<TR>

						<!--ADICIONAL -------------------------------------------------------------------------------------------------------------------------->

							<TD ALIGN='center'>
								<INPUT TYPE='BUTTON' VALUE='ADICIONAL'  Onclick=\"javascript:window2=open('./php/modulo_adicional.php?nome=cidade','cidade','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,menubar=no,width=430,height=425,left=85,top=45')\" STYLE='width:110px; FONT-FAMILY:verdana; FONT-SIZE:12px;'>
							</TD>
						</TR>
						<TR>

						<!--BANCO -------------------------------------------------------------------------------------------------------------------------->

							<TD ALIGN='center'>
								<INPUT TYPE='button' VALUE='BANCO'  ONCLICK=\"javascript:mudador('./php/modulo_banco.php');\" STYLE='width:110px; FONT-FAMILY:verdana; FONT-SIZE:12px;'>
							</TD>
						</TR>
					</TABLE>
				</TD>

				<!--COMANDOS -------------------------------------------------------------------------------------------------------------------------->

				<TD WIDTH='250'>
					<TABLE  VALIGN='middle' WIDTH='230' BGCOLOR='#1099c6' CELLPADING='0' CELLSPACING='0' BORDER='0' ALIGN='center' HEIGHT='175'>
						<TR>

						<!--TITULO -------------------------------------------------------------------------------------------------------------------------->

							<TD ALIGN='left' HEIGHT='20' bgcolor=#000000>
								<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>
									&nbsp;&nbsp;&nbsp;Comandos
								</FONT>
							</TD>
						</TR>
						<TR>
	
						<!--INCLUIR----------------------------------------------------------------------------------------------------------->

							<TD ALIGN='center'>
								<INPUT TYPE='BUTTON' VALUE='INCLUIR NOVO' ONCLICK=\"javascript:mudador('./php/modulo_comum.php?ordem=0');\"		STYLE='FONT-FAMILY:verdana; FONT-SIZE:12px;'>
							</TD>
						</TR>
						<TR>

						<!-- -------------------------------------------------------------------------------------------------------------------------->

							<TD ALIGN='center'>
							</TD>
						</TR>
						<TR>

						<!-- -------------------------------------------------------------------------------------------------------------------------->

							<TD ALIGN='center'>
							</TD>
						</TR>
					</TABLE>
				</TD>

				<!--EVENTOS HOJE -------------------------------------------------------------------------------------------------------------------------->

				<TD WIDTH='290'>
					<TABLE  VALIGN='middle' WIDTH='285' BGCOLOR='#1099c6' CELLPADING='0' CELLSPACING='0' BORDER='0' ALIGN='center' HEIGHT='175'>
						<TR>

						<!--TITULO -------------------------------------------------------------------------------------------------------------------------->

							<TD ALIGN='left' HEIGHT='20' bgcolor=#000000>
								<FONT FACE='verdana' SIZE=1 COLOR='#FFFFFF'>
									&nbsp;&nbsp;&nbsp;Eventos para Hoje ("; echo $hoje['mday']; echo"/"; print_mes(0,0);echo"/"; echo $hoje['year'];echo")
								</FONT>
							</TD>
						</TR>
						<TR>

						<!--EVENTOS DADOS----------------------------------------------------------------------------------------------------------->

							<TD ALIGN='left' VALIGN='top' STYLE='text-align:center;'>
								<P  STYLE='margin-top:1.5em;font-family:verdana;color:#FFFFFF;font-size:10px;text-align:left;width:260px;'>";
									print_datas('aniver',$hoje['mon'],1);
									print_datas('data_esp',$hoje['mon'],1);
									print_datas('cart_emissao_validade',$hoje['mon'],2);
									print_banco();
echo "
								</P>
							</TD>
						</TR>
					</TABLE>
				</TD>
			</TR>
		</TABLE>

	<!--MENU BARRA INF-------------------------------------------------------------------------------------------------------------------------->

		<HR COLOR='#000000' WIDTH='740'>
		<TABLE  VALIGN='middle' ALIGN='center' WIDTH='750' BGCOLOR='#FFFFFF' CELLPADING='0' CELLSPACING='0' BORDER='0' HEIGHT='25'>
			<TR>

			<!--MENS-------------------------------------------------------------------------------------------------------------------------->

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

			<!--LINKS-------------------------------------------------------------------------------------------------------------------------->


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

			<!--FECHAR-------------------------------------------------------------------------------------------------------------------------->

				<TD ALIGN='center' BGCOLOR='#000000' WIDTH='50'>
					<A HREF=\"javascript:mudador('./index.php')\" class='MailBL11'>Fechar</A>
				</TD>
			</TR>
		</TABLE>
		
<!--FIM DO CORPO-------------------------------------------------------------------------------------------------------------------------->

	</BODY>
</HTML>
";
?>
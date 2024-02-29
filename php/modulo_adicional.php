<?php

echo "
	<HTML>
		<SCRIPT LANGUAGUE=\"Javascript\">
			function mudador(end)
			{
				this.location=end;
			}
			function mudador_atualiza(end2)
			{
				this.location=end2;
				window.opener.atualizar();
			}

		</SCRIPT>
		<TITLE>
";
		echo "FORMIGA :: Módulo Adicional - ";
		echo $nome;
echo "
		</TITLE>
		<BODY>
			<TABLE CELLSPACING='0' CELLPADDING='0' WIDTH=100%>
				<TR>
					<TD width=100% COLSPAN=2>
						<TABLE CELLSPACING='0' CELLPADDING='0' WIDTH=100%>
							<TR>
								<TD ALIGN='top'>
									<FONT FACE='verdana' STYLE='FONT-SIZE:25px'><B>
										FORMIGA: 
									</B></FONT>
									<FONT FACE='verdana' STYLE='FONT-SIZE:11px'>
										MÓDULO ADICIONAL - <B>$nome</B>
									</FONT>
									<HR COLOR=#000000>
								</TD>
							</TR>
						</TABLE>
					</TD>
				</TR>
			</TABLE>
			<TABLE CELLSPACING='0' CELLPADDING='0' WIDTH=100%>
				<TR>
					<TD VALIGN='middle' ALIGN=center>
					<FORM NAME='FR_adiciona'>
						<TABLE CELLSPACING='0' CELLPADDING='0' WIDTH=100% HEIGHT='100%' >
							<TR>
								<TD HEIGHT='40' VALIGN='middle' BGCOLOR='#006699' width='10'>
								</TD>
								<TD HEIGHT='40' VALIGN='middle' BGCOLOR=#006699>
										<INPUT TYPE='text' MAXLENGTH='47' NAME='BOX_TIPO' VALUE='$BOX_TIPO' STYLE='FONT-FAMILY:verdana; COLOR:#000000; FONT-SIZE:11px; WIDTH:320; HEIGHT:20px;'>
								</TD>
								<TD HEIGHT='40' VALIGN='middle' BGCOLOR='#006699' width='10'>
									<INPUT type='button' NAME='BT_INCLUIR' ONCLICK=\"mudador_atualiza('./modulo_adicional.php?caixa=$caixa&ordem=1&BOX_TIPO='+document.FR_adiciona.BOX_TIPO.value+'&nome=$nome');\" VALUE='INCLUIR' STYLE='FONT-FAMILY:verdana; COLOR:#FFFFFF; FONT-SIZE:11px; BACKGROUND-COLOR:red; BORDER-WIDTH:0; WIDTH:60; HEIGHT:20;'>
								</TD>
								<TD HEIGHT='40' VALIGN='middle' BGCOLOR='#006699' width='10'>
								</TD>
							</TR>
						</TABLE>
						<TABLE CELLSPACING='0' CELLPADDING='0' WIDTH=100% HEIGHT='100%' >
							<TR>	
								<TD HEIGHT='20' BGCOLOR='#000000'>
									<FONT FACE=verdana COLOR='#FFFFFF' STYLE='FONT-SIZE:11px'>&nbsp;&nbsp;&nbsp;status :: ";
									if(($ordem=="1")&&($BOX_TIPO!=""))
									{
										$conexao1=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
										$banco1=mysql_select_db("formiga_portal",$conexao1);
										$consulta1=mysql_query("SELECT * FROM $nome WHERE tipo='$BOX_TIPO';",$conexao1);
										$regi1=mysql_num_rows($consulta1);
										if($regi1=="0")
										{
											$exec=mysql_query("INSERT INTO $nome (tipo) values ('$BOX_TIPO');", $conexao1);		
											echo "<B>\"$BOX_TIPO\"</B>...  Foi pra Conta !";
										}
										else
										{
											echo " Já TEM ! Olha aih Embaixo.";
										}
									}
									if(($ordem=="2")&&($BOX_TIPO!=""))
									{
										$conexao1=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996")
										$banco1=mysql_select_db("formiga_portal",$conexao1);
										$consulta1=mysql_query("SELECT * FROM $nome WHERE tipo='$BOX_TIPO';",$conexao1);
										$regi1=mysql_num_rows($consulta1);
										if($regi1=="1")
										{
											$E_exec=mysql_query("DELETE FROM $nome WHERE tipo='$BOX_TIPO';", $conexao1);		
											echo "<B>\"$BOX_TIPO\"</B>...  Foi Excluido !";
											$BOX_TIPO="";
										}
										else
										{
											echo " Não Existe este Registro";
										}
									}

echo"								</TD>
							</TR>
							<TR><TD HEIGHT='10'></TD></TR>
						</TABLE>
						<SELECT NAME='SEL_adiciona' MULTIPLE ONCHANGE=\"mudador('modulo_adicional.php?caixa=$caixa&nome=$nome&BOX_TIPO='+document.FR_adiciona.SEL_adiciona.value)\" BORDER='1' STYLE='FONT-FAMILY:verdana; COLOR:#FFFFFF; FONT-SIZE:11px; BACKGROUND-COLOR:#000000; BORDER-WIDTH:0; WIDTH:390; HEIGHT:240px;'>";
							$conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996"))
							$banco=mysql_select_db("formiga_portal",$conexao);
							$consulta=mysql_query("SELECT * FROM $nome ORDER BY tipo;",$conexao);
							$regi=mysql_num_rows($consulta);
							for($regatual=0;$regatual<$regi;$regatual++){
							if(mysql_result($consulta, $regatual, "tipo")!="")
								{
								if(($ordem==1)&&(mysql_result($consulta, $regatual, "tipo")==$BOX_TIPO))
									{
										echo "&nbsp;<OPTION SELECTED VALUE='";
									}
									else
										{
											echo "&nbsp;<OPTION VALUE='";
										}
								echo mysql_result($consulta, $regatual, "tipo");
								echo "'>";
								echo mysql_result($consulta, $regatual, "tipo");
								}
							}echo "</SELECT>
					</TD>
				</TR>
</FORM>
<FORM NAME='FR_adiciona2'>
			</TABLE>
			<HR COLOR=#000000>
			<SELECT NAME='SEL_adiciona2' ONCHANGE=\"mudador('modulo_adicional.php?caixa=$caixa&nome='+document.FR_adiciona2.SEL_adiciona2.value)\" BORDER='1' STYLE='FONT-FAMILY:verdana; COLOR:#FFFFFF; FONT-SIZE:11px; BACKGROUND-COLOR:#000000; BORDER-WIDTH:0; WIDTH:160;'>
				<OPTION VALUE=''>outros...
				<OPTION VALUE='cidade'>cidade
				<OPTION VALUE='escola'>escola
				<OPTION VALUE='estado'>estado
				<OPTION VALUE='pais'>pais
				<OPTION VALUE='profissao'>profissao
				<OPTION VALUE='relacionamento'>relacionamento
			</SELECT>
			<INPUT type='button' NAME='BT_INCLUIR' ONCLICK=\"mudador_atualiza('./modulo_adicional.php?caixa=$caixa&ordem=1&BOX_TIPO='+document.FR_adiciona.BOX_TIPO.value+'&nome=$nome');\" VALUE='INCLUIR' STYLE='FONT-FAMILY:verdana; COLOR:#FFFFFF; FONT-SIZE:11px; BACKGROUND-COLOR:red; BORDER-WIDTH:0; WIDTH:60; HEIGHT:20;'>
			<INPUT type='button' NAME='BT_EXCLUIR' ONCLICK=\"mudador_atualiza('./modulo_adicional.php?caixa=$caixa&ordem=2&BOX_TIPO='+document.FR_adiciona.BOX_TIPO.value+'&nome=$nome');\" VALUE='EXCLUIR' STYLE='FONT-FAMILY:verdana; COLOR:#FFFFFF; FONT-SIZE:11px; BACKGROUND-COLOR:red; BORDER-WIDTH:0; WIDTH:60; HEIGHT:20;'>
			<INPUT type='button' NAME='BT_ATUALIZAR' ONCLICK=\"mudador_atualiza('./modulo_adicional.php?caixa=$caixa&ordem=0&BOX_TIPO='+document.FR_adiciona.BOX_TIPO.value+'&nome=$nome');\" VALUE='ATUALIZAR' STYLE='FONT-FAMILY:verdana; COLOR:#FFFFFF; FONT-SIZE:11px; BACKGROUND-COLOR:red; BORDER-WIDTH:0; WIDTH:70; HEIGHT:20;'>
			<INPUT type='button' ONCLICK=\"window.close('this'); \" VALUE='Fechar' STYLE='FONT-FAMILY:verdana; COLOR:#FFFFFF; FONT-SIZE:11px; BACKGROUND-COLOR:#006699; BORDER-WIDTH:0; WIDTH:50; HEIGHT:20;'>
		</BODY>
	</HTML>	
";
?>
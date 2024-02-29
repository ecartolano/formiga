<?php

	function guarda_id($fc_id)
	{
		global $ids,$k;
		
		$flag=0;
		for($a=0;$a<count($ids);$a++)
			{
				if($ids[$a]==$fc_id)
					$flag=1;
			}
		if($flag==0){
			$ids[$k]= $fc_id;
			$k++;	
		}
	}
	function imprimir($p_id)
	{
		global $TEXT_caixa;
		$conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
		$banco=mysql_select_db("formiga_portal",$conexao);
		$consulta=mysql_query("SELECT * FROM dados_pessoas WHERE id=$p_id;",$conexao);
		$regi=mysql_num_rows($consulta);
		for($regatual=0;$regatual<$regi;$regatual++)
			{
				echo"
				<TABLE width=630 cellspacing='0' cellpadding='0' align=center border=1 bordercolor=#000000>
					<TR>
						<TD width=50 height=25 align=center>
							<B><FONT color=gray FACE=verdana STYLE='font-size:12px;'>";
							echo mysql_result($consulta, $regatual, "id");
				echo "</B>
						</TD>
						<TD width=200>
							&nbsp;&nbsp;<B><A class='L11' HREF='javascript:mudador(\"modulo_comum.php?tipo_consulta=0&ordem=3&registros=$regi&pesq=$TEXT_caixa&var_id=$p_id\")'>";
							echo mysql_result($consulta, $regatual, "apelido");
				echo "</A></B></FONT>
						</TD>
						<TD>
							&nbsp;&nbsp;<A class='L11' HREF='javascript:mudador(\"modulo_comum.php?tipo_consulta=0&ordem=3&registros=$regi&pesq=$TEXT_caixa&var_id=$p_id\")'>";
							echo mysql_result($consulta, $regatual, "nome");
				echo "</A>
						</TD>
					</TR>
				</TABLE>
				<TABLE width=630 cellspacing='2' cellpadding='0' align=center border=0 bgcolor=#DDDDDD>								
					<TR>
						<TD  valign=bottom >
							&nbsp;&nbsp;&nbsp;<A class='L11' HREF='javascript:mudador(\"modulo_comum.php?tipo_consulta=0&ordem=3&registros=$regi&pesq=$TEXT_caixa&var_id=$p_id\")'>";

		$R_conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
		$R_banco=mysql_select_db("formiga_portal",$R_conexao);
		$R_flag=mysql_result($consulta, $regatual, "relaciona");
		$R_consulta=mysql_query("SELECT * FROM relacionamento WHERE id=$R_flag;",$R_conexao);
		$R_regi=mysql_num_rows($R_consulta);

							echo mysql_result($R_consulta, $R_regi-1, "tipo");
				echo"
						</A></TD>
						<TD height=20 valign=bottom width=99 align=center>
							&nbsp;<A class='L11' HREF='javascript:mudador(\"modulo_comum.php?tipo_consulta=0&ordem=3&registros=$regi&pesq=$TEXT_caixa&var_id=$p_id\")'>";
					
							echo mysql_result($consulta, $regatual, "aniver");
				echo"
						</A></TD>
					</TR>
				</TABLE>
				<TABLE width=630 cellspacing='2' cellpadding='0' align=center border=0 bgcolor=#DDDDDD>								
					<TR>
						<TD width=130 align=center>
							&nbsp;<A class='L11' HREF='javascript:mudador(\"modulo_comum.php?tipo_consulta=0&ordem=3&registros=$regi&pesq=$TEXT_caixa&var_id=$p_id\")'>";
							echo mysql_result($consulta, $regatual, "tel_res");
				echo"</A></TD>
						<TD width=130 align=center>
							&nbsp;<A class='L11' HREF='javascript:mudador(\"modulo_comum.php?tipo_consulta=0&ordem=3&registros=$regi&pesq=$TEXT_caixa&var_id=$p_id\")'>";
							echo mysql_result($consulta, $regatual, "tel_cel");
				echo"</A></TD>
						<TD width=270 align=center>
							&nbsp;<A class='L11' HREF='mailto:";echo mysql_result($consulta, $regatual, "email");echo "'>";
							echo mysql_result($consulta, $regatual, "email");
				echo"</A></TD>
						<TD width=100 align=center>
							&nbsp;<A class='L11' HREF='javascript:mudador(\"modulo_comum.php?tipo_consulta=0&ordem=3&registros=$regi&pesq=$TEXT_caixa&var_id=$p_id\")'>";
							echo mysql_result($consulta, $regatual, "icq");
				echo"</A></TD>
					</TR>
				</TABLE>
				<TABLE width=630 cellspacing='2' cellpadding='0' align=center border=0 bgcolor=#DDDDDD align=center> 
					<TR>
						<TD width=12></TD>
						<TD >
							<A class='L11' HREF='javascript:mudador(\"modulo_comum.php?tipo_consulta=0&ordem=3&registros=$regi&pesq=$TEXT_caixa&var_id=$p_id\")'>";
							echo mysql_result($consulta, $regatual, "obs");
				echo"
						</A></TD>
						<TD width=10></TD>
					</TR>
					<TR><TD height=6></TD></TR>
				</TABLE>
				<TABLE width=630 cellspacing='0' cellpadding='0' align=center border=0 bordercolor=#000000>
					<TR>	
						<TD bgcolor=#FFFFFF>&nbsp;</TD>
						<TD width=70 align=center bgcolor=#DDDDDD>
							<A HREF='javascript:mudador(\"modulo_comum.php?tipo_consulta=0&ordem=5&registros=$regi&pesq=$TEXT_caixa&var_id=$p_id\")' class='L11'><B>E</B></A>
							<A HREF='javascript:mudador(\"modulo_comum.php?tipo_consulta=0&ordem=4&registros=$regi&pesq=$TEXT_caixa&var_id=$p_id\")' class='L11'><B>A</B></A>
							<A HREF='javascript:mudador(\"modulo_comum.php?tipo_consulta=0&ordem=3&registros=$regi&pesq=$TEXT_caixa&var_id=$p_id\")' class='L11'><B>C</B></A>
						</TD>
					</TR>
				</TABLE>
				";


			} 
	}
	function procurador($quem)
	{
		global $TEXT_caixa,$ordem,$quant,$flag;
		$conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
		$banco=mysql_select_db("formiga_portal",$conexao);
		$consulta=mysql_query("SELECT * FROM dados_pessoas WHERE $quem LIKE '%$TEXT_caixa%' ORDER BY $quem;",$conexao);
		$regi=mysql_num_rows($consulta);
		if(($ordem=="1")&&($TEXT_caixa!="")&&($regi!=0))
			{
				for ($regatual = 0; $regatual< $regi ; $regatual++)
					{
						guarda_id( mysql_result($consulta, $regatual, "id")); 							
					}
			}
		mysql_close($conexao);	
	}

	function procurador2($quem,$onde)
	{
		global $TEXT_caixa,$ordem,$quant;
		$conexao=mysql_connect("formiga_portal.mysql.dbaas.com.br", "formiga_portal", "Formiga1996");
		$banco=mysql_select_db("formiga_portal",$conexao);
		$consulta=mysql_query("SELECT * FROM $onde WHERE tipo LIKE '%$TEXT_caixa%' ORDER BY tipo;",$conexao);
		$regi=mysql_num_rows($consulta);
		if(($ordem=="1")&&($TEXT_caixa!="")&&($regi!=0))
			{
				for ($regatual=0; $regatual< $regi ; $regatual++)		
					{
						$pesq='SELECT * FROM dados_pessoas WHERE '.$quem.'='.mysql_result($consulta, $regatual, "id").';';
						$consult=mysql_query($pesq,$conexao);
						$regi2=mysql_num_rows($consult);
						if($regi2!=0)
						{
							for ($regatual2=0; $regatual2< $regi2 ; $regatual2++)		
								{
									guarda_id( mysql_result($consult, $regatual2, "id")); 							
								}
						}
					}	
			} 		
	}

if($TEXT_caixa!="")
	{
		$k=0;
		procurador('apelido');
		procurador('nome');
		procurador2('relaciona','relacionamento');
		procurador('aniver');
		procurador2('profissao','profissao');
		procurador2('profissao_escola','escola');
		procurador('email');
		procurador('email1');
		procurador('www');
		procurador('www1');
		procurador('data_esp');
		procurador('data_esp_ob');
		procurador('tel_res');
		procurador('tel_res1');
		procurador('tel_cel');
		procurador('tel_cel1');
		procurador('tel_tramp');
		procurador('tel_tramp1');
		procurador('tel_outro');
		procurador('tel_outro_ob');
		procurador('tel_outro1');
		procurador('tel_outro1_ob');
		procurador('tel_fax');
		procurador('tel_fax1');
		procurador('telbip_opera');
		procurador('telbip_cod');
		procurador('icq');
		procurador('end');
		procurador('end_comp');
		procurador('end_numero');
		procurador('end_bairro');
		procurador('end_cep');
		procurador2('end_cidade','cidade');
		procurador2('end_estado','estado');
		procurador2('end_pais', 'pais');
		procurador('end1');
		procurador('end1_comp');
		procurador('end1_numero');
		procurador('end1_bairro');
		procurador('end1_cep');
		procurador2('end1_cidade','cidade');
		procurador2('end1_estado','estado');
		procurador2('end1_pais', 'pais');
		procurador('trampo_local');
		procurador('trampo_razao');
		procurador('trampo_cargo');
		procurador('trampo_dept');
		procurador('trampo_secretaria');
		procurador('trampo_secretaria_tel');
		procurador('trampo_end');
		procurador('trampo_end_comp');
		procurador('trampo_end_numero');
		procurador('trampo_end_bairro');
		procurador('trampo_end_cep');
		procurador2('trampo_end_cidade','cidade');
		procurador2('trampo_end_estado','estado');
		procurador2('trampo_end_pais', 'pais');
		procurador('rg');
		procurador('cic');
		procurador('titulo');
		procurador('titulo_zona');
		procurador('titulo_sessao');
		procurador('cert_nasc');
		procurador('cert_nasc_livro');
		procurador('cert_nasc_folha');
		procurador('cert_nasc_numero');
		procurador('alist');
		procurador('cart_emissao_validade');		
		procurador('cart_mot');
		procurador('obs');
		$ordem=0;
}
	echo "
		<HTML>
			<SCRIPT>
				<!--
					function mudador(linha)
					{
						document.location.href=linha;
					}
				-->
			</SCRIPT>
                            	<STYLE type=\"text/css\">
              	              	<!--
	                                		A.L11:Link      { color:  #000000;text-decoration: none; font-size: 12px; font-family: Verdana,Arial, Helvetica }
                                          		A.L11:Visited   { color: #000000;text-decoration: none; font-size: 12px; font-family: Verdana,Arial, Helvetica }
                                                     		A.L11:Active   { color:  #000000;text-decoration: none; font-size: 12px; font-family: Verdana,Arial, Helvetica }
                            	                         	A.L11:HOver   { color:  red;text-decoration: underline }
				-->
			</STYLE>
			<BODY>
				<TABLE cellspacing='0' cellpadding='0' ALIGN='center' WIDTH='750'>
					<TR>
						<TD>
							<FONT size=5 face=verdana><B>FORMIGA :: MÓDULO CONSULTA</B></FONT>
							<HR color=#000000>
						</TD>
					</TR>
					<TR>
						<TD align=center>
							<BR>
							<INPUT type='submit' value='Voltar para Início' name='BT_sair'			style='width: 175px; background-color: ; border-color:#000000; border-width:1;'  ' onClick=\"javascript:mudador('../modulo_principal.php')\">
							<INPUT type='submit' value='Modulo de Catálogo' name='BT_Modulo_de_Catalogo'	style='width: 175px; background-color: ; border-color:#000000; border-width:1;'  ' onClick=\"javascript:mudador('modulo_catalogo.php?tnome=0&letra=a')\">
							<INPUT type='submit' value='Modulo de Bancos' 	name='BT_Modulo_de_Banco'		style='width: 175px; background-color: ; border-color:#000000; border-width:1;'  onClick=\"javascript:mudador('modulo_banco.php')\">
							<INPUT type='submit' value='Incluir Novo' name='BT_incluir' style='width: 175px; background-color: #ffd7bd; border-color:#000000; border-width:1;' onClick=\"javascript:mudador('modulo_comum.php?tipo_consulta=0&ordem=0&registros=$regi&pesq=$TEXT_caixa')\">
						</TD>
					</TR>
				</TABLE>
				<BR><BR>
				<FORM method='POST' name='FR_consulta' action='modulo_consulta.php?ordem=1'>
				<TABLE width=730 cellspacing='0' cellpadding='0' align=center>						
					<TR>
						<TD>
							<FONT color=#000000 FACE=verdana STYLE='font-size:12px;'>Pesquisar por :: &nbsp;
							<INPUT type='text' name='TEXT_caixa' style='width: 500px; background-color: ; border-color:#000000; border-width:1;'>
						</TD>
						<TD>
							<INPUT type='submit' value='Consultar' name='BT_consultar'>
						</TD>
					</TR>
				</TABLE><BR>
				<TABLE width=730 cellspacing='0' cellpadding='0' align=center>						
					<TR>
						<TD height=30 valign=bottom>";
					if($TEXT_caixa!="")
					{
						 echo "
								<FONT color=#000000 FACE=verdana STYLE='font-size:12px;'>
								Foram Encontrados <U><B><I>"; echo count($ids); echo"</U></B></I> registro(s) para <B><I><U>";	
						echo $TEXT_caixa;
						echo "</U></I></B>.</FONT>";
					}
				echo "
						</TD>
					</TR>
				</TABLE>
				<BR>
				";

if($TEXT_caixa!="")
	{
			for($k=0;$k<count($ids);$k++)
				{
					imprimir($ids[$k]);
				}
	} 
		
	echo "
			</BODY>
		</FORM>
		</HTML>
	"; 
?>
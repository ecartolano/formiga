<?php

	$dia=date('j');
	$dia_semana=date('l');
	$mes=date('m');
	$ano=date('Y');
	$data=date('Y-m-j H:m:s');

	//FUNCAO CRIA CAIXA COM DIA
		//  DIA PARA SELECIONAR, NOME DA CAIXA, ESTILO DA CAIXA, ONCLICK

		function caixa_dia($var,$nome,$estilo,$click)
		{
			global $dia;

			echo  "\t". "\t"."<SELECT NAME='$nome'";
				if($estilo!='') { echo" STYLE='$estilo'  "; };
				if($click!='') { echo" ONCLICK='$click'  "; };
			echo " >"."\n";

			if($var=="")
				$var=$dia;
			for($k=1;$k<10;$k++){
				echo "\t". "\t"."\t"."<OPTION"; if($var==$k) echo " SELECTED"; echo " VALUE='0$k'>$k"."\n";}
			for($k=10;$k<32;$k++){
				echo "\t". "\t"."\t"."<OPTION"; if($var==$k) echo " SELECTED"; echo " VALUE='$k'>$k"."\n";}

			echo "\t". "\t"."</SELECT>"."\n"."\n";
		}


	//FUNCAO CRIA CAIXA COM MES
		//  DIA PARA SELECIONAR, NOME DA CAIXA, ESTILO DA CAIXA, ONCLICK

		function caixa_mes($var,$nome,$estilo,$click)
		{
	
			global $mes;

			echo  "\t". "\t"."<SELECT NAME='$nome'";
				if($estilo!='') { echo" STYLE='$estilo'  "; };
				if($click!='') { echo" ONCLICK='$click'  "; };
			echo " >"."\n";

			if($var=="")
				$var=$mes;
echo"			<OPTION "; if($var=='01') echo" SELECTED"; echo" VALUE='01'>Jan
			<OPTION "; if($var=='02') echo" SELECTED"; echo" VALUE='02'>Fev
			<OPTION "; if($var=='03') echo" SELECTED"; echo" VALUE='03'>Mar
			<OPTION "; if($var=='04') echo" SELECTED"; echo" VALUE='04'>Abr
			<OPTION "; if($var=='05') echo" SELECTED"; echo" VALUE='05'>Mai
			<OPTION "; if($var=='06') echo" SELECTED"; echo" VALUE='06'>Jun
			<OPTION "; if($var=='07') echo" SELECTED"; echo" VALUE='07'>Jul
			<OPTION "; if($var=='08') echo" SELECTED"; echo" VALUE='08'>Ago
			<OPTION "; if($var=='09') echo" SELECTED"; echo" VALUE='09'>Set
			<OPTION "; if($var=='10') echo" SELECTED"; echo" VALUE='10'>Out
			<OPTION "; if($var=='11') echo" SELECTED"; echo" VALUE='11'>Nov
			<OPTION "; if($var=='12') echo" SELECTED"; echo" VALUE='12'>Dez
";
			echo "\t". "\t"."</SELECT>"."\n"."\n";
		}

	//FUNCAO CRIA CAIXA COM ANO
		//  DIA PARA SELECIONAR, NOME DA CAIXA, ESTILO DA CAIXA, ONCLICK

		function caixa_ano($var,$nome,$estilo,$click)
		{
			global $ano;

			echo  "\t". "\t"."<SELECT NAME='$nome'";
				if($estilo!='') { echo" STYLE='$estilo'  "; };
				if($click!='') { echo" ONCLICK='$click'  "; };
			echo " >"."\n";

			if($var=="")
				$var=$ano;
			for($k=$ano-10;$k<=$ano;$k++){
				echo "\t". "\t"."\t"."<OPTION"; if($var==$k) echo " SELECTED"; echo " VALUE='$k'>$k"."\n";}
			echo "\t". "\t"."</SELECT>"."\n";
		}

	//FUNCTION DEVOLVE NOME DO MES
		// MES PARA VOLTAR e ACRESCIMO

	function devolve_mes($mes_print,$acr)
	{
		global $hoje;

		if($mes_print=="")
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

?>
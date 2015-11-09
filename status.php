<?php require_once('includes/connect.php');
session_start();?>

<!DOCTYPE html>

<html>

<head>
	<title>Copiadora Montes Claros</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	
	<meta name="description" content="Copiadora Montes Claros é a mais tradicional copiadora da cidade. 
	Cópias, plastificação, encadernação, reforma de livros e documentos, envio de fax, impressão e digitalização 
	de documentos.">
	
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
	
  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

 <script src="https://maps.googleapis.com/maps/api/js"></script>
 
 
 <style>
 
 	.statuscaixa {
 		width:auto; position: relative; }

    .abertura {
    	text-align: center;
    	font-size:25px;
    	font-family: Arial; }
    	
    .fechamento {

    	text-align: center;
    	font-size:25px;
    	font-family: Arial; }
 	
 </style>
 
 
  </head>

<body>
	
	<a href="index.php"><p style="float:right; padding-right: 20px;">Retornar ao Site</p></a>
	
		<div id="main">
<table width="100%" style="border: 0px; margin-left: 0px;">
		
	<tr style="border: 0px;">
		
		<td align="center" style="border: 0px;">
		<img src="images/Untitled.png">
		</td>
		
		<td align="center" style="border: 0px;">
			
			<h1 align="center" style="color: #5196D5;">Copiadora Montes Claros</h1>
		<div id="data" style="font-size:25px;  font-family: Arial;"></div>
		</td>
		
		<td align="center" style="border: 0px;">
		<img src="images/Untitled.png">
		</td>
		
	</tr>
	</table>
<!--<h1 style="font-size:25px;  font-family: Arial; padding-left: 60px;">Copiadora Montes Claros</h1>-->
	<br>
	
	<?php 	if($_SESSION['administradora'] == 'Cida')
	{ ?> <p  style="font-size:25px;  font-family: Arial; padding-left: 120px;">Olá Cida, clique aqui para <a href="administrador.php">Analisar Tabelas</a>.</p> <?php }
	
	else {
		$useme = $_SESSION['user'];
		$passme = $_SESSION['pass'];

$sql="SELECT * FROM Acesso WHERE Nome='$useme' and Senha='$passme'";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()){ ?>

<br><span style="font-size:25px;  font-family: Arial; padding-left: 120px;" >Olá <?php echo $row['Nome']; ?>,</span>

<?php }	} ?>
	
	
	
	<br>
	<br>
	<br>
	<br>
	
	<div class="statuscaixa">
		
		<?php

 $mes = date('M');
    $dia = date('d');
    $ano = date('Y');
    
    $mes_extenso = array(
        'Jan' => 'Janeiro',
        'Feb' => 'Fevereiro',
        'Mar' => 'Marco',
        'Apr' => 'Abril',
        'May' => 'Maio',
        'Jun' => 'Junho',
        'Jul' => 'Julho',
        'Aug' => 'Agosto',
        'Nov' => 'Novembro',
        'Sep' => 'Setembro',
        'Oct' => 'Outubro',
        'Dec' => 'Dezembro'
    );
$data = "{$dia} de " . $mes_extenso["$mes"];

$sql="SELECT * FROM ControleCaixa WHERE Data='$data' AND StatusEntrada=0 AND StatusSaida=0";
if ($result=$conn->query($sql)){
// Check if row exists
$rowcount=$result->num_rows;
if($rowcount==1){ ?>
		
		
		<table align='center'>
		<tr>
		<td>
			<div class="abertura">
				<p><font color="#ff0000">Abertura do Caixa Pendente</font><br>
					<a href="inserirentrada.php">Executar Abertura</a></p>
			</div>
		</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
			<div class="fechamento">
				<p><font color="#ff0000">Fechamento do Caixa Pendente</font><br>
					<a href="inserirsaida.php">Executar Fechamento</a></p>
			</div>
		</td>
		</tr>
		</table>
		
		<?php
} else { $sql="SELECT * FROM ControleCaixa WHERE Data='$data' AND StatusEntrada=1 AND StatusSaida=0";
if ($result=$conn->query($sql)){
// Check if row exists
$rowcount=$result->num_rows;
if($rowcount==1){?>
		
		<table align='center'>
		<tr>
		<td>
			<div class="abertura">
				<p><font color="#33CC33">Abertura do Caixa Executada</font><br>Obrigado</p>
			</div>
		</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
			<div class="fechamento">
				<p><font color="#ff0000">Fechamento do Caixa Pendente</font><br>
					<a href="inserirsaida.php">Executar Fechamento</a></p>
			</div>
		</td>
		</tr>
		</table>
		
		<?php
} else { $sql="SELECT * FROM ControleCaixa WHERE Data='$data' AND StatusEntrada=1 AND StatusSaida=1";
if ($result=$conn->query($sql)){
// Check if row exists
$rowcount=$result->num_rows;
if($rowcount==1){?>
		
		<table align='center'>
		<tr>
		<td>
			<div class="abertura">
				<p><font color="#33CC33">Abertura do Caixa Executada</font><br>Obrigado</p>
			</div>
		</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
			<div class="fechamento">
				<p><font color="#33CC33">Fechamento do Caixa Executado</font><br>Obrigado</p>
			</div>
		</td>
		</tr>
		</table>
		
		<?php
} else { $sql="SELECT * FROM ControleCaixa WHERE Data='$data' AND StatusEntrada=0 AND StatusSaida=1";
if ($result=$conn->query($sql)){
// Check if row exists
$rowcount=$result->num_rows;
if($rowcount==1){?>
		
		<table align='center'>
		<tr>
		<td>
			<div class="abertura">
				<p><font color="#ff0000">Abertura do Caixa Bloqueada</font><br></p>
			</div>
		</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
			<div class="fechamento">
				<p><font color="#33CC33">Fechamento do Caixa Executado</font><br>Obrigado</p>
			</div>
		</td>
		</tr>
		</table>
		
		<?php }}}}}}}}?>
		
	</div>

	<br>
	<br>
	<br>

<script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>
   
</div>

<script>

  NomeMes = new Array(12)
    NomeMes[0] = "Janeiro"
    NomeMes[1] = "Fevereiro"
    NomeMes[2] = "Março"
    NomeMes[3] = "Abril"
    NomeMes[4] = "Maio"
    NomeMes[5] = "Junho"
    NomeMes[6] = "Julho"
    NomeMes[7] = "Agosto"
    NomeMes[8] = "Setembro"
    NomeMes[9] = "Outubro"
    NomeMes[10] = "Novembro"
    NomeMes[11] = "Dezembro"
 
 var data=new Date();
 var dia=data.getDate();
  if(dia < 10) {
        dia = "0" + dia;
    }
 var mes=data.getMonth();
 var ano=data.getFullYear();
 
 data = dia + ' de ' + NomeMes[mes] + ' de ' + ano;
 
 document.getElementById("data").innerHTML = data;
 
 </script>


<?php include ('footer.php'); ?>
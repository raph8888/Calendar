	<?php
	require_once('includes/connect.php');
	require_once('includes/calendar.php');
	session_start();
	?>
	
	<?php $dayid = "li-" .date('d-m-Y'); ?>

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
table, th, td {
     border: 1px solid black;
     text-align: center;
     
}
	
  	
  	html, body {
    height: initial; !important
}

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
	
		<p  align='center'><a href="administrador.php">Voltar para o Calendário</a></p>
			<br>
				<br>

	
		<h1 align="center" style="margin-bottom: 5px;">Controle de Caixa Online</h1>
		<h2 align="center">Tabela de Abertura e Fechamento do Caixa</h2>
	
	<br>
		
<?php

$sql = "SELECT * FROM ControleCaixa ORDER BY IDda DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table align='center'><tr>
    <th>Data</th>
    <th>Abertura 1</th>
     <th>Abertura 2</th>
      <th>Valor de Abertura</th>
       <th>Fechamento 1</th>
        <th>Fechamento 2</th>
         <th>Valor de Fechamento</th>
          <th>Status Abertura</th>
           <th>Status Fechamento</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["Data"]."</td>
        <td>".$row["Entrada1"]."</td>
        <td>".$row["Entrada2"]."</td>
        <td>".$row["ValorEntrada"]."</td>
        <td>".$row["Saida1"]."</td>
        <td>".$row["Saida2"]."</td>
        <td>".$row["ValorSaida"]."</td>
        <td>".$row["StatusEntrada"]."</td>
        <td>".$row["StatusSaida"]."</td></tr>";
    }
    echo "</table>";
	
} else {
    echo "0 results";
}

?>



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
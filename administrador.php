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
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
	<link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>
	
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	
<style>
	
	.tabelaacesso {
		padding-left: 60px;}
		
	table, th, td {
		border: 1px solid black;
		text-align: center;
		border-collapse: collapse;
		padding: 0px 20px 0px 20px;}
		
	#<?php echo $dayid; ?> {
		background-color: #7092BE !important;
		color:white !important;}
	
	.end {
		background-color: #E0D4D4 !important;}
		
	html, body {
		height: initial; !important}
		
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
					<!-- <div id="data" style="font-size:25px;  font-family: Arial;"></div> -->
				</td>
				
				<td align="center" style="border: 0px;">
					<img src="images/Untitled.png">
				</td>
				
			</tr>
		</table>
		
		<h2 align="center" style="margin-bottom: 5px;">Controle de Caixa Online</h2>
		
		<br><br>
		
		<div class="container">
			<div class="row">
				
				<div class="col-md-6">
				<?php
				
				$calendar = new Calendar();
				echo $calendar->show();
				
				?>
				</div>
				
				<div class="col-md-6">
				<br>
				
				<div id="yourdiv" align="center"><br><p>Clique no dia que deseja consultar.</p><br></div>
				
				<br><br>
				</div>
				
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				
				<div class="col-md-6">
				<br><br><br><br>
				
				<p align="center">Para ver a Tabela Completa como aparecia antes, <a href="tabelacontrole.php">clique aqui</a></p>
				<p align="center">Para status do dia, executar abertura e fechamento do caixa, <a href="status.php">clique aqui</a></p>
				
				<br><br>
				</div>
				
				<div class="col-md-6">
				<br><br><br>
				
				<h2 align="center">Tabela de Acesso</h2>
				
				<?php
				$sql = "SELECT * FROM Acesso";
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0) {
					echo "<table class='tabelaacesso' align='center'><tr>
					<th>Identidade</th>
					<th>Nome</th>
					<th>Senha</th></tr>";
					
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<tr>
						<td>".$row["ID"]."</td>
						<td>".$row["Nome"]."</td>
						<td>".$row["Senha"]."</td></tr>";}
						
						echo "</table>";
				} else {
					echo "0 results";
				}
				$conn->close();
				?>
				</div>
				
			</div>
		</div>
		
 <script>
 $( "li" ).click(function() {
 
 	var date = $(this).attr("id");
 	
 	$.ajax({
				data: { name: date },
				type: 'POST',
				url: 'viewday.php',
				success:function (result) {
				$("#yourdiv").html(result);
				}
			});
});
</script>


<?php include ('footer.php'); ?>
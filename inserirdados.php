<?php
require_once('includes/connect.php');
if (isset($_POST['user1']) && isset($_POST['pass1']) && isset($_POST['valorentrada'])){
$user1 = $_REQUEST['user1'];
$pass1 = $_REQUEST['pass1'];
$user2 = $_REQUEST['user2'];
$pass2 = $_REQUEST['pass2'];
$valorentrada = $_REQUEST['valorentrada'];
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
$sql="SELECT * FROM Acesso WHERE Nome='$user1' and Senha='$pass1'";
if ($result=$conn->query($sql)){
// Mysqli_num_row is counting table row
$rowcount=$result->num_rows;
if($rowcount==1){

$sql ="INSERT INTO ControleCaixa (Data, Entrada1, Entrada2, ValorEntrada, StatusEntrada)
VALUES('$data', '$user1', '$user2', '$valorentrada', '1')";

if ($conn->query($sql) === TRUE) {

header("Location: http://copiadoramoc.com/status.php");
}
} else {
header("Location: http://copiadoramoc.com/endereco.php");
}
} else {
	header("Location: http://copiadoramoc.com/endereco.php");
}
}

if (isset($_POST['user1']) && isset($_POST['pass1']) && isset($_POST['valorsaida'])){
$user1 = $_REQUEST['user1'];
$pass1 = $_REQUEST['pass1'];
$user2 = $_REQUEST['user2'];
$pass2 = $_REQUEST['pass2'];
$valorsaida = $_REQUEST['valorsaida'];
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
$sql="SELECT * FROM Acesso WHERE Nome='$user1' and Senha='$pass1'";
if ($result=$conn->query($sql)){
// Mysqli_num_row is counting table row
$rowcount=$result->num_rows;
if($rowcount==1){

$sql ="UPDATE ControleCaixa SET Saida1='$user1', Saida2='$user2', ValorSaida='$valorsaida', StatusSaida = '1' WHERE Data = '$data'";

if ($conn->query($sql) === TRUE) {

header("Location: http://copiadoramoc.com/status.php");
} else {
header("Location: http://copiadoramoc.com/index.php");
}
} else {
header("Location: http://copiadoramoc.com/endereco.php");
}
} else {
	header("Location: http://copiadoramoc.com/endereco.php");
}
}

$conn->close;
?>

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
 
 
  </head>

<body>
	
	<a href="index.php"><p style="float:right; padding-right: 20px; padding-top: 20px;">Retornar ao Site</p></a>
	
		<div id="main">
<br><br><br><br><br>
	
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

$sql="SELECT * FROM ControleCaixa WHERE Data='$data' AND StatusEntrada=1";
if ($result=$conn->query($sql)){
// Mysqli_num_row is counting table row
$rowcount=$result->num_rows;
if($rowcount==1){ ?>
	
	 <div class="login-card">
 	<div id="data2"></div>
    <h1>Fechamento do Caixa</h1><br>
  <form action="#" method="post" enctype="multipart/form-data">
   <input type="text" name="user1" placeholder="Nome 1" required>
   <input type="password" name="pass1" placeholder="Senha 1" required>
    <br>
     <input type="text" name="user2" placeholder="Nome 2" required>
    <input type="password" name="pass2" placeholder="Senha 2" required>
    <br>
     <input type="text" name="valorsaida" placeholder="Valor Fechamento do dia" required>
    <input type="submit" name="login" class="login login-submit" value="Concluir">
  </form>

</div>


<?php
} else { ?>
	
	<div class="login-card">
 	<div id="data"></div>
    <h1>Abertura do Caixa</h1><br>
  <form action="#" method="post" enctype="multipart/form-data">
    <input type="text" name="user1" placeholder="Nome 1" required>
    <input type="password" name="pass1" placeholder="Senha 1" required>
    <br>
    <input type="text" name="user2" placeholder="Nome 2" required>
    <input type="password" name="pass2" placeholder="Senha 2" required>
    <br>
     <input type="text" name="valorentrada" placeholder="Valor Abertura do dia" required>
    <input type="submit" name="login" class="login login-submit" value="Concluir">
  </form>

  <!--<div class="login-help">
    <a href="#">Registro</a> • <a href="#">Esqueceu a Senha?</a>
  </div>-->
</div>
	
	<?php }
}
	?>


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
 document.getElementById("data2").innerHTML = data;
 
 </script>


<?php include ('footer.php'); ?>
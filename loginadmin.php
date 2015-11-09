<?php
require_once('includes/connect.php');
session_start();

if (isset($_POST['user']) && isset($_POST['pass'])){
	
$myusername=$_REQUEST['user'];
$mypassword=$_REQUEST['pass'];
$_SESSION['user'] = $myusername;
$_SESSION['pass'] = $mypassword;
$sql="SELECT * FROM Acesso WHERE Nome='$myusername' and Senha='$mypassword'";

if ($result=$conn->query($sql)){
	
// Mysqli_num_row counts table rows, checking if username and password exist.
$rowcount=$result->num_rows;

if($rowcount==1){
	
	$_SESSION['administradora'] = $myusername;
	$_SESSION['senha'] = $mypassword;
	$datadoano = date('d-m-Y');
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
	
	$sql="SELECT * FROM ControleCaixa WHERE Data='$data'";
	
	if ($result=$conn->query($sql)){
			
		// Mysqli_num_row is counting table row. Checking if the date is already on the table.
		$rowcount=$result->num_rows;
		
			if($rowcount==1){
	
		header("Location: http://copiadoramoc.com/status.php");
			
			} else {
					
				$sql ="INSERT INTO ControleCaixa (Data)
				VALUES('$data')";
				
				if ($conn->query($sql) === TRUE) {
						
					header("Location: http://copiadoramoc.com/status.php");
				
				} else { echo "A data de hoje nao foi inserida corretamente na Base de Dados.<br>
				Por favor, entre em CONTATO no site www.raph-web.com";
				
				}
			}
		}

	} else { echo "Nome ou Senha de Acesso incorretos."; }
}}

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
	
	<a href="index.php"><p style="float:right; padding-right: 20px;">Retornar ao Site</p></a>
	
		<div id="main">
			
			
		<table width="100%">
		
	<tr>
		
		<td align="center">
		<img src="images/Untitled.png">
		</td>
		
		<td align="center">
			
			<a href="index.php" align="center" style="text-decoration: none; color: #5196D5;"><h1>Copiadora Montes Claros</h1></a>		
		
		</td>
		
		<td align="center">
		<img src="images/Untitled.png">
		</td>
		
	</tr>
	</table>
<!--<h1 style="font-size:25px;  font-family: Arial; padding-left: 60px;">Copiadora Montes Claros</h1>-->
	
	<br>
	
<!--<div id="fancybox-content" style="border-width: 10px; width: 209px; height: auto;">
	
	<div style="width:auto;height:auto;overflow: auto;position:relative;">
		
		<div id="login">
			
        <form action="#" method="post" class="login" enctype="multipart/form-data">
        	
        <div id="form-items">
        	
            <p>raph-web login</p>
            
            <table>
	<input type="text" placeholder="admin" name="myusername" class="input" autofocus required />
	
	<br> <br>
	
	<input type="password" placeholder="password" name="mypassword" class="input" onfocus="if (this.value =='Password')this.value='';" required />
	
	<br> <br>
	
	<input type="submit" class="button" name="Login" value="submit" >
	</table>
	
	</div>
	
        </form>
  </div></div></div></div>	-->
  
   <div class="login-card">
   	    <h1>Acesso</h1>
    <h1><small><div id="data"></div></small></h1><br>
  <form action="#" method="post" enctype="multipart/form-data">
    <input type="text" name="user" placeholder="Nome" required>
    <input type="password" name="pass" placeholder="Senha" required>
    <input type="submit" name="login" class="login login-submit" value="Acessar">
  </form>

  <!--<div class="login-help">
    <a href="#">Registro</a> • <a href="#">Esqueceu a Senha?</a>
  </div>-->
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>
   
</div>

<script>

  NomeMes = new Array(12)
    NomeMes[0] = "1"
    NomeMes[1] = "2"
    NomeMes[2] = "3"
    NomeMes[3] = "4"
    NomeMes[4] = "5"
    NomeMes[5] = "6"
    NomeMes[6] = "7"
    NomeMes[7] = "8"
    NomeMes[8] = "9"
    NomeMes[9] = "10"
    NomeMes[10] = "11"
    NomeMes[11] = "12"
 
 var data=new Date();
 var dia=data.getDate();
  if(dia < 10) {
        dia = "0" + dia;
    }
 var mes=data.getMonth();
 var ano=data.getFullYear();
 
 data = dia + ' / ' + NomeMes[mes] + ' / ' + ano;
 
 document.getElementById("data").innerHTML = data;
 
 </script>


<?php include ('footer.php'); ?>
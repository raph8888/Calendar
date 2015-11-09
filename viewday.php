<?php

require_once('includes/connect.php');

$str= $_POST['name'];

//$id = "li-19-10-2015";

$rest = substr($str, 3, 2);  // returns "19"

$mes = substr($str, 6, 2);  // returns "10"

$mes_extenso = array(
        '01' => 'Janeiro',
        '02' => 'Fevereiro',
        '03' => 'Marco',
        '04' => 'Abril',
        '05' => 'Maio',
        '06' => 'Junho',
        '07' => 'Julho',
        '08' => 'Agosto',
        '09' => 'Setembro',
        '10' => 'Outubro',
        '11' => 'Novembro',
        '12' => 'Dezembro'
    );


$datareal = "{$rest} de " . $mes_extenso["$mes"];

$sql = "SELECT * FROM ControleCaixa WHERE Data='$datareal'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    	
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
    echo "Nao ha dados para esse dia." .$datareal;
}

?>
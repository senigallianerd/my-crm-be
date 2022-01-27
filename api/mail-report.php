<?php
if($_GET['email']){
  ob_start();
?>

<html>
<head>
<title>Mail Report</title>
<style>
      th{
        background:#7777772e;
      }
      table {
        color: #333;
        background: white;
        border: 1px solid grey;
        font-size: 12pt;
        border-collapse: collapse;
      }
      table thead th,
      table tfoot th {
        color: #777;
        background: rgba(0,0,0,.1);
      }
      table th,
      table td {
        padding: .5em;
        border: 1px solid lightgrey;
      }

</style>
</head>
<body>

<?php

include "./conf/conf.php";

$docs = [];

$monthToValue = array("1"=>"Gennaio", "2"=>"Febbraio", "3"=>"Marzo", "
      4"=>"Aprile", "5"=>"Maggio", "6"=>"Giugno",
      "7"=>"Luglio", "8"=>"Agosto", "9"=>"Settembre",
      "10"=>"Ottobre", "11"=>"Novembre", "12"=>"Dicembre" );

$month = $_GET['month'];
$year = $_GET['year'];

if(!$month)
    $month=date("m");

if(!$year)
    $year=date("Y");

// se siamo a Dicembre devo inserire il mese di Gennaio
$nextMonth = $month < 12 ? $month+1 : 1;

// se siamo a Dicembre devo inserire l'anno successivo
$correctYear = $month < 12 ? $year : $year+1;

echo '<br> Risultati di ricerca del mese: <b>' .$monthToValue[intval($nextMonth)]. '</b> anno: <b>' .$correctYear. '</b>';
echo '<br><br>';

$sql = "SELECT nome,cognome,numero,targa,frazionamento,premioRata,data, Docs.note as noteDoc FROM Docs,Users WHERE MONTH(data) = ".$nextMonth." and YEAR(data) = ".$correctYear." and UserId = Users.id ORDER BY DATE(data) ASC";

$result = $con->query($sql);

if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
  array_push($docs,$row);
 }
}

if(empty($docs)){
  echo "Nessun risultato trovato";
}
else{
  ?>

<table>
  <tr>
    <th>Nome</th>
    <th>Cognome</th>
    <th>Polizza</th>
    <th>Targa</th>
    <th>Note</th>
    <th>Frazionamento</th>
    <th>Premio Rata</th>
    <th>Scadenza</th>
  </tr>

  <?php

  foreach($docs as $doc) {
    echo "<tr>
              <td>".$doc['nome']."</td>
              <td>".$doc['cognome']."</td>
              <td>".$doc['numero']."</td>
              <td>".$doc['targa']. "</td>
              <td>".addSlashes($doc['noteDoc']). "</td>
              <td>".$doc['frazionamento']. "</td>
              <td>".$doc['premioRata']." € </td>
              <td>".date("d/m/Y", strtotime($doc['data']))."</td>
          </tr>";
}
}


$con->close();

function sendMail($text){
  $url = 'https://www.frakorn.it/mail-server/send.php';
  $data = array('sendTo' => 'frakorn@gmail.com', 'message' => $text,'subject' => 'MAIL REPORT','fromName' => 'CRM');
  $options = array(
          'http' => array(
          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
          'method'  => 'POST',
          'content' => http_build_query($data)
          )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  if ($result === FALSE) { 
          echo "Error Sending Mail"; 
  }
  echo "<br> Email inviata correttamente";
}
?>
</table>

</body>
</html>

<?php
// ottengo tutto il contenuto HTML della mia pagina
$html = ob_get_contents();

if($_GET['email']=='true')
  sendMail($html);

ob_end_flush();
}
?>

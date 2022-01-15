<?php
include "./conf/conf.php";

// mi prendo i parametri inviati da client
$params = json_decode(file_get_contents('php://input') , true);

$users = [];

// indice colonne, utile per l'ordinamento (sorting utente), perchè l'utente invia l'indice della colonna, quindi serve questo mapping
$columns = array(
    0 => 'id',
    1 => 'cognome',
    2 => 'nome'
);

$where_condition = "";
$sqlTot = "";
$sqlRec = "";

$inputSearch = $params['search']['value'];
$splitInput = explode(" ", $inputSearch);

// GESTIONE RICERCA CON JOIN di CLIENTI CON NUMERO POLIZZA O TARGA
if (strpos($inputSearch, 'targa') !== false || strpos($inputSearch, 'polizza') !== false && count($splitInput) == 2){
  $fieldSearch = strpos($inputSearch, 'targa') !== false ? 'targa' : 'numero';

  $sql_query = "SELECT U.* FROM Users U LEFT JOIN Docs D ON U.id = D.userId WHERE U.id = D.userId AND D.".$fieldSearch." = '".$splitInput[1]."'";
  $totalRecords = mysqli_num_rows($queryTot);

  $result = $con->query($sql_query);
  if ($result->num_rows > 0){
      while ($row = $result->fetch_assoc())
      {
          array_push($users, $row);
      }
  }

$json_data = array(
  "draw" => intval($params['draw']) ,
  "recordsTotal" => intval($totalRecords) ,
  "recordsFiltered" => intval($totalRecords) ,
  "data" => $users
);

echo json_encode($json_data);
$con->close();

}
else{  // GESTIONE RICERCA NOME O COGNOME CLIENTE
    if (count($splitInput) == 2)
    {
        $where_condition .= " WHERE ";
        $where_condition .= " ( nome LIKE '%" . $splitInput[1] . "%' ";
        $where_condition .= " AND cognome LIKE '%" . $splitInput[0] . "%' )";
    }
    else if (!empty($params['search']['value'])){
        $where_condition .= " WHERE ";
        $where_condition .= " ( nome LIKE '%" . $params['search']['value'] . "%' ";
        $where_condition .= " OR cognome LIKE '%" . $params['search']['value'] . "%' )";
    }

    $sql_query = " SELECT * FROM Users ";
    $sqlTot .= $sql_query;
    $sqlRec .= $sql_query;

    if (isset($where_condition) && $where_condition != ''){

        $sqlTot .= $where_condition;
        $sqlRec .= $where_condition;
    }

    $sqlRec .= " ORDER BY " . $columns[$params['order'][0]['column']] . "   " . $params['order'][0]['dir'] . "  LIMIT " . $params['start'] . " ," . $params['length'] . " ";

    $queryTot = mysqli_query($con, $sqlTot) or die("Database Error:" . mysqli_error($con));

    $totalRecords = mysqli_num_rows($queryTot);

    $result = $con->query($sqlRec);
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc())
        {
            array_push($users, $row);
        }
    }

    $json_data = array(
      "draw" => intval($params['draw']) ,
      "recordsTotal" => intval($totalRecords) ,
      "recordsFiltered" => intval($totalRecords) ,
      "data" => $users
  );
  
  echo json_encode($json_data);
  $con->close();
}

?>

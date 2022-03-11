<?php
include "./conf/conf.php";

// mi prendo i parametri inviati da client
$params = json_decode(file_get_contents('php://input') , true);

$users = [];

// indice colonne, utile per l'ordinamento (sorting utente), perchè l'utente invia l'indice della colonna, quindi serve questo mapping
$columns = array(
    0 => 'cognome',
    1 => 'nome',
    2 => 'note',
    3 => 'id'
);

$where_condition = "";
$sqlTot = "";
$sqlRec = "";

$inputSearch = $params['search']['value'];
$splitInput = explode(" ", $inputSearch);

// GESTIONE RICERCA CON JOIN di CLIENTI CON NUMERO POLIZZA O TARGA
if (strpos($inputSearch, 'targa') !== false || strpos($inputSearch, 'polizza') !== false && $splitInput[0]==''){
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
else{  // GESTIONE ORDINAMENTO COLONNE
    if(($columns[$params['order'][0]['column']]=='cognome' || $columns[$params['order'][0]['column']]=='nome') && $params['search']['value']=='' && $splitInput[0]=='' ){
        $where_condition .= "WHERE ".$columns[$params['order'][0]['column']]." != ''";
    }
    else if (count($splitInput) >= 1){ // GESTIONE RICERCA CONCAT
        $where_condition .= "WHERE CONCAT(cognome, ' ', nome) LIKE '%".addSlashes($inputSearch)."%' || CONCAT(nome, ' ', cognome) LIKE '%".addSlashes($inputSearch)."%'";
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

    $sqlRec .= " ORDER BY ".$columns[$params['order'][0]['column']]. "   " . $params['order'][0]['dir'] . "  LIMIT " . $params['start'] . " ," . $params['length'] . " ";
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
      "data" => $users,
      "sql" => $sqlRec
  );
  
  echo json_encode($json_data);
  $con->close();
}

?>

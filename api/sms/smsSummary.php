<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: GET');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
  // inclide
  include_once '../../config/Database.php';
  include_once '../../models/Sms.php';

  //Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate sms object
  $sms = new Sms($db);

  // sms query
  $result = $sms->smsSummary();
  // Get row count
  $num = $result->rowCount();

  //Check if any sms
  if ($num > 0) {
    // sms array
    $smss_arr = array();
    $smss_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $sms_item = array(
        'id' => $id,
        'sender' => $sender,
        'sms_content' => $sms_content,
        'created_at' => $created_at
      );

      // Push to 'data'
      array_push($smss_arr['data'], $sms_item);
    }

    // Turn to JSON & output
    echo json_encode($smss_arr);
  } else {
    // No Poste
    echo json_encode(
      array('message' => 'No Smss Found')
    );
  }
?>
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

  // Get ID
  $sms->id = isset($_GET['id']) ? $_GET['id'] : die();

  //sms query
  $sms->consumeSms();

  // Create array
  $sms_arr = array(
    'id' => $sms->id,
    'sender' => $sms->sender,
    'sms_content' => $sms->sms_content,
    'created_at' => $sms->created_at
  );

  // Make json
  print_r(json_encode($sms_arr));

  // delete sms after reading
  $sms->deleteSms();

?>
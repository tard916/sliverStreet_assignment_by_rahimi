<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: GET');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
  // inclide
  include_once '../../config/Database.php';
  include_once '../../models/Email.php';

  //Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate email object
  $email = new Email($db);

  // Get ID
  $email->id = isset($_GET['id']) ? $_GET['id'] : die();

  //email query
  $email->consumeEmail();

  // Create array
  $email_arr = array(
    'id' => $email->id,
    'sender' => $email->sender,
    'email_content' => $email->email_content,
    'created_at' => $email->created_at
  );

  // Make json
  print_r(json_encode($email_arr));

  // delete email after reading
  $email->deleteemail();

?>
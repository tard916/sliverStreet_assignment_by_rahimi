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

  // email query
  $result = $email->emailSummary();
  // Get row count
  $num = $result->rowCount();

  //Check if any email
  if ($num > 0) {
    // email array
    $emails_arr = array();
    $emails_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $email_item = array(
        'id' => $id,
        'sender' => $sender,
        'email_content' => $email_content,
        'created_at' => $created_at
      );

      // Push to 'data'
      array_push($emails_arr['data'], $email_item);
    }

    // Turn to JSON & output
    echo json_encode($emails_arr);
  } else {
    // No Poste
    echo json_encode(
      array('message' => 'No emails Found')
    );
  }
?>
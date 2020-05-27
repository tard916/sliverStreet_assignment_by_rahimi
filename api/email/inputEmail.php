<?php 
   // Headers
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: POST');
   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
   include_once '../../config/Database.php';
   include_once '../../models/Email.php';
 
   // Instantiate DB & connect
   $database = new Database();
   $db = $database->connect();
 
   // Instantiate sms object
   $email = new Email($db);
 
   // Get raw posted data
   $data = json_decode(file_get_contents("php://input"));
 
   $email->sender = $data->sender;
   $email->email_content = $data->email_content;
 
   // Create sms
   if($email->inputEmail()) {
     echo json_encode(
       array('message' => 'email Created')
     );
   } else {
     echo json_encode(
       array('message' => 'Email Not Created')
     );
   }

?>  
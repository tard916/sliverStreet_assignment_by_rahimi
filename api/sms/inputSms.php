<?php 
   // Headers
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: POST');
   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
   include_once '../../config/Database.php';
   include_once '../../models/Sms.php';
 
   // Instantiate DB & connect
   $database = new Database();
   $db = $database->connect();
 
   // Instantiate sms object
   $sms = new Sms($db);
 
   // Get raw posted data
   $data = json_decode(file_get_contents("php://input"));
 
   $sms->sender = $data->sender;
   $sms->sms_content = $data->sms_content;
 
   // Create sms
   if($sms->inputSms()) {
     echo json_encode(
       array('message' => 'Sms Created')
     );
   } else {
     echo json_encode(
       array('message' => 'Sms Not Created')
     );
   }

?>  
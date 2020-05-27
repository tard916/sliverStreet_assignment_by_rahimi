<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messageries</title>
  <style>
    .container{
      display: contents;
      justify-content: center;
      margin: 2.5em;
      padding: .5rem;
    }
    .row {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .messageries {
      justify-content: center;
    }
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>
<body>
<div class="container">
<div class="row">
  <h1 class="title">
      List of all messages in the queue
</h1>
</div>
<div>
<table class="messageries">
  <tr>
    <th>ID</th>
    <th>Sender</th>
    <th>SMS Content</th>
    <th>Created At</th>
  </tr>
  <?php 
    
    // inclide
    include_once './config/Database.php';
    include_once './models/Sms.php';

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
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo$row['sender']; ?></td>
          <td><?php echo$row['sms_content']; ?></td>
          <td><?php echo$row['created_at']; ?></td>
        </tr>
<?php
    }
}else {
  // No Poste
  echo json_encode(
    array('message' => 'No Smss Found')
  );
}
?>
</table>
</div> 
</div> 
</body>
</html>
<?php 
  class Sms {
    // DB staff
    private $conn;
    private $table = 'sms';

    // Post Properties
    public $id;
    public $sender;
    public $sms_content;
    public $created_at;

    // Constractor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Sms
    public function smsSummary() {
      // create query
      $query = 'SELECT * FROM '.$this->table.' ORDER BY created_at DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Execute query
      $stmt->execute();

      return $stmt;
    }

    //Create Sms 
    public function inputSms() {
      // Create query
      $query = 'INSERT INTO '. $this->table. ' SET 
        sender = :sender,
        sms_content = :sms_content';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Sanitize data
      $this->sender = htmlspecialchars(strip_tags($this->sender));
      $this->sms_content = htmlspecialchars(strip_tags($this->sms_content));

      // Bind data
      $stmt->bindParam(':sender', $this->sender);
      $stmt->bindParam(':sms_content', $this->sms_content);

      // Execute query
      if ($stmt->execute()) {
        return true;
      }

      // Print error if somethings goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    // Get Single Sms
    public function consumeSms() {
      // create query
      $query = 'SELECT * FROM '.$this->table.' WHERE id = :id LIMIT 0,1';
            
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind id
      $stmt->bindParam(':id', $this->id);
      
      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->sender = $row['sender'];
      $this->sms_content = $row['sms_content'];
      $this->created_at = $row['created_at'];

      return $stmt;          
    }

    // Delete Sms
    public function deleteSms() {
      // Create query
      $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));

      // Bind data
      $stmt->bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
  }
?>    
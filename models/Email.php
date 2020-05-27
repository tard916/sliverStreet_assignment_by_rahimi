<?php 
  class Email {
    // DB staff
    private $conn;
    private $table = 'email';

    // Post Properties
    public $id;
    public $sender;
    public $email_content;
    public $created_at;

    // Constractor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Email
    public function emailSummary() {
      // create query
      $query = 'SELECT * FROM '.$this->table.' ORDER BY created_at DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Execute query
      $stmt->execute();

      return $stmt;
    }

    //Create Email 
    public function inputEmail() {
      // Create query
      $query = 'INSERT INTO '. $this->table. ' SET 
        sender = :sender,
        email_content = :email_content';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Sanitize data
      $this->sender = htmlspecialchars(strip_tags($this->sender));
      $this->email_content = htmlspecialchars(strip_tags($this->email_content));

      // Bind data
      $stmt->bindParam(':sender', $this->sender);
      $stmt->bindParam(':email_content', $this->email_content);

      // Execute query
      if ($stmt->execute()) {
        return true;
      }

      // Print error if somethings goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    // Get Single Email
    public function consumeEmail() {
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
      $this->email_content = $row['email_content'];
      $this->created_at = $row['created_at'];

      return $stmt;          
    }

    // Delete Email
    public function deleteEmail() {
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
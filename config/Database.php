<?php
  class Database {
    // DB connection params
    private $host = 'localhost';
    private $db_name = 'sabr'; // Silverstreet Assignment By Rahimi
    private $username = 'rahimidb'; // to be changed
    private $password = '@Diallo91'; // to be changed

    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;

      try {
        $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,
        $this->username, $this->password);

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e) {
        echo 'Connection Error: '. $e->getMessage();
      }

      return $this->conn;
    }

  }
?>

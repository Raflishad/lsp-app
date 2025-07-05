<?php
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;      // Database handler (PDO)
    private $stmt;     // Statement handler

    public function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die("Koneksi DB gagal: " . $e->getMessage());
        }
    }

    // Prepare query
    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind parameter
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):   $type = PDO::PARAM_INT; break;
                case is_bool($value):  $type = PDO::PARAM_BOOL; break;
                case is_null($value):  $type = PDO::PARAM_NULL; break;
                default:               $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Eksekusi statement
    public function execute() {
        return $this->stmt->execute();
    }

    // Ambil banyak data
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    // Ambil satu data
    public function single() {
        $this->execute();
        return $this->stmt->fetch();
    }

    // Ambil jumlah baris
    public function rowCount() {
        return $this->stmt->rowCount();
    }

    // Ambil last insert ID
    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }
}

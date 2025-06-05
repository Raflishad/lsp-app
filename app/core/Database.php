<?php
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $dbh;

    public function __construct() {
        try {
            // Buat koneksi ke MySQL
            $this->dbh = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi DB gagal: " . $e->getMessage());
        }
    }

    // Contoh pemakaian query
    public function query($sql) {
        return $this->dbh->query($sql);
    }
}

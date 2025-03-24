<?php
class Database {
    private $host = "192.168.204.38";
    private $port = "1521";
    private $sid = "xe";
    private $username = "system";
    private $password = "adminK2";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            // Conexión a Oracle usando OCI
            $tns = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=" . $this->host . ")(PORT=" . $this->port . "))(CONNECT_DATA=(SID=" . $this->sid . ")))";
            
            $this->conn = new PDO(
                "oci:dbname=" . $tns,
                $this->username,
                $this->password
            );
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?> 
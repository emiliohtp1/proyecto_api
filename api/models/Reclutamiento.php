<?php
class Reclutamiento {
    private $conn;
    private $table_name = "reclutamiento";

    public $salarioporhora;
    public $usuario_id;
    public $usuario_nombre;
    public $usuario_horastrabajadas;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                (SALARIOPORHORA, USUARIO_ID, USUARIO_NOMBRE, USUARIO_HORASTRABAJADAS) 
                VALUES 
                (:salarioporhora, :usuario_id, :usuario_nombre, :usuario_horastrabajadas)";

        $stmt = $this->conn->prepare($query);

        $this->salarioporhora = htmlspecialchars(strip_tags($this->salarioporhora));
        $this->usuario_id = htmlspecialchars(strip_tags($this->usuario_id));
        $this->usuario_nombre = htmlspecialchars(strip_tags($this->usuario_nombre));
        $this->usuario_horastrabajadas = htmlspecialchars(strip_tags($this->usuario_horastrabajadas));

        $stmt->bindParam(":salarioporhora", $this->salarioporhora);
        $stmt->bindParam(":usuario_id", $this->usuario_id);
        $stmt->bindParam(":usuario_nombre", $this->usuario_nombre);
        $stmt->bindParam(":usuario_horastrabajadas", $this->usuario_horastrabajadas);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?> 
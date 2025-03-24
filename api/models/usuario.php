<?php
// Usuario.php
class Usuario {
    private $conn;
    private $table_name = "usuario";

    public $id;
    public $nombre;
    public $edad;
    public $puesto;
    public $horastrabajadas;

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
                (ID, NOMBRE, EDAD, PUESTO, HORASTRABAJADAS) 
                VALUES 
                (:id, :nombre, :edad, :puesto, :horastrabajadas)";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->edad = htmlspecialchars(strip_tags($this->edad));
        $this->puesto = htmlspecialchars(strip_tags($this->puesto));
        $this->horastrabajadas = htmlspecialchars(strip_tags($this->horastrabajadas));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":edad", $this->edad);
        $stmt->bindParam(":puesto", $this->puesto);
        $stmt->bindParam(":horastrabajadas", $this->horastrabajadas);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}

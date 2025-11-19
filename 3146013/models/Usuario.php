<?php

class usuario {
    private $id;
    private $nombre;
    private $correo;
    private $rol;
    private $telefono;
    public static $conexion;

    public function __construct($id, $nombre, $correo, $rol, $telefono) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->rol = $rol;
        $this->telefono = $telefono;
    }

    public static function connect() {
        $host = "localhost";
        $nombreBD = "adso3146013";
        $usuario = "root";
        $password = "";
        try{
                $conexion = new PDO("mysql:host=$host;dbname=$nombreBD", $usuario, $password);
                $conexion->setAttribute(PDO::ATTR_ERRMODE,
                 PDO::ERRMODE_EXCEPTION);
                return $conexion;
            } catch(PDOException $e) {
                echo "Error de conexion: " . $e->getMessage();
                return null;
            }
        }

    public static function listar() {
        $conexion = self::connect();
        if (!$conexion) {
            return [];
        }
        try {
            $query = "SELECT id, nombre, correo, rol, telefono FROM usuarios";
            $stmt = $conexion->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En caso de error devolvemos array vacío para no romper la vista
            return [];
        }
    }
    public function insertar(){
        $conexion = self::connect();
        $query = "INSERT INTO usuarios(nombre, correo, rol, telefono) VALUES (:nombre, :correo, :rol, :telefono)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(":nombre", $this->nombre);
    $statement->bindParam(":correo", $this->correo);
    $statement->bindParam(":rol", $this->rol);   
    $statement->bindParam(":telefono", $this->telefono);
        $statement->execute();
    }
    public static function ConsultarTodos(){
        $conexion = self::connect();
        $query = "SELECT * FROM usuarios";
        $statement = $conexion->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
}

<?php

require_once __DIR__ . '../../config/database.php';

class Usuario
{
    private $conn;

    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->conectar();
    }

    public function buscarPorEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function criarUsuario($nome, $email, $senha)
    {
        $sql = "INSERT INTO users (nome , email, senha) VALUES( ?, ?, ?)";

        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("sss", $nome, $email, $senha);
        $stmt->execute();

        $resultado = $stmt->execute();

        $stmt->close();

        return $resultado;
    }
}
?>
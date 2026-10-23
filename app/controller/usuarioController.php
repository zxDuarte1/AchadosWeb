<?php 
require_once __DIR__ . "/../model/usuario.php";

Class UsuarioController{

    private $usuarioModel;

    public function __construct(){
        $this -> usuarioModel = new Usuario();
    }

    public function index(){
        if (isset($_SESSION['id'])) {
            header('Location: index.php?action=dashboard');
            exit;
        }
        include __DIR__ . "../../view/public/home.php";
    }
    public function login(){
        if (isset($_SESSION['id'])) {
            header('Location: index.php?action=dashboard');
            exit;
        }
        include __DIR__ . "../../view/auth/login.php";
    }
    public function register(){
        if (isset($_SESSION['id'])) {
            header('Location: index.php?action=dashboard');
            exit;
        }
        include __DIR__ . "../../view/auth/register.php";
    }
    public function dashboard(){
        if (!isset($_SESSION['id'])) {
            header('Location: index.php?action=dashboard');
            exit;
        }
        include __DIR__ . "../../view/public/dashboard.php";
    }
    public function logout(){
        session_destroy();
        header("Location: index.php");
        exit;
    }


    
    public function autenticar(){

        if (!isset($_POST['email'], $_POST['senha'])) {
            header('Location: index.php');
            exit;
        }
        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        if (empty($email) || empty($senha)) {
            $erro = "Preencha seu email e senha!";
            include __DIR__ . '../../view/login.php';
        }

        $usuario = $this -> usuarioModel -> buscarPorEmail($email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            session_regenerate_id(true);
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: index.php?action=dashboard");
            exit;
        }

        $erro = "E-email ou senha estão incoprretas!";
        echo($erro);
        include __DIR__ . '../../view/auth/login.php';
    }



}

?> 



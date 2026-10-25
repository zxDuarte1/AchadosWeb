<?php
require_once __DIR__ . "/../model/usuario.php";

class UsuarioController
{

    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

    public function index()
    {
        if (isset($_SESSION['id'])) {
            header('Location: index.php?action=dashboard');
            exit;
        }
        include __DIR__ . "../../view/public/home.php";
    }
    public function loginLocation()
    {
        if (isset($_SESSION['id'])) {
            header('Location: index.php?action=dashboard');
            exit;
        }
        include __DIR__ . "../../view/auth/login.php";
    }
    public function registerLocation()
    {
        if (isset($_SESSION['id'])) {
            header('Location: index.php?action=dashboard');
            exit;
        }
        include __DIR__ . "../../view/auth/register.php";
    }
    public function dashboardLocation()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: index.php?action=dashboard');
            exit;
        }
        include __DIR__ . "../../view/public/dashboard.php";
    }
    public function logout()
    {
        session_destroy();
        header("Location: index.php");
        exit;
    }



    public function autenticar()
    {

        if (!isset($_POST['email'], $_POST['senha'])) {
            header('Location: index.php');
            exit;
        }
        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        if (empty($email) || empty($senha)) {
            $erro = "Preencha seu email e senha!";
            include __DIR__ . '../../view/auth/login.php';
        }

        $usuario = $this->usuarioModel->buscarPorEmail($email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            session_regenerate_id(true);
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: index.php?action=dashboard");
            exit;
        }

        $erro = "E-email ou senha estão incoprretas!";
        echo ($erro);
        include __DIR__ . '../../view/auth/login.php';
    }

    public function criarUsuario()
    {
        if (!isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
            header('Location: index.php');
            exit;
        }
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        if (empty($nome) || empty($email) || empty($senha)) {
            $erro = "Preencha todos os campos!";
            include __DIR__ . '../../view/auth/register.php';
            exit;
        }

        $emailExistente = $this->usuarioModel->buscarPorEmail($email);

        if (!$emailExistente) {
            $usuario = $this->usuarioModel->criarUsuario($nome, $email, $senha);
            header("Location: index.php?action=login");
            exit;
        }

        $erro = "Erro na criação do usuario (E-mail já existente)!";
        echo ($erro);
    }



}

?>
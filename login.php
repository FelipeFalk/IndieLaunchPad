<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty(md5($_POST['senha'])))
    {

        include_once('db.php');
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

        $sql = "SELECT * FROM usuarios WHERE email_usuario = '$email' and senha_usuario = '$senha'";
        
        $result = $conn->query($sql);
        $row = $result->fetch_object();

        $id_usuario = $row->id_usuario;
        $cargos_id_cargo = $row->cargos_id_cargo;
        
        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            unset($_SESSION['cargos_id_cargo']);
            unset($_SESSION['id_usuario']);
            header('Location: index.php');
        }
        else
        {   
            $_SESSION['id_usuario'] = $id_usuario;
            $_SESSION['cargos_id_cargo'] = $cargos_id_cargo;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: dashboard.php');
        }
    }
    else
    {

        header('Location: index.php');
        
    }
?>
<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty(md5($_POST['senha'])))
    {

        include_once('db.php');
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

        $sql = "SELECT * FROM usuarios WHERE email_usuario = '$email' and senha_usuario = '$senha'";
        
        $result =$conn->query($sql);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: index.html');
        }
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: dashboard.php');
        }
    }
    else
    {

        header('Location: index.html');
        
    }
?>
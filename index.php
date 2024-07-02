<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/ico.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 30px #333333 inset;
            -webkit-text-fill-color: #FFFFFF !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        /* Firefox */
        input:-moz-autofill {
            -moz-box-shadow: 0 0 0 30px #333333 inset;
            -moz-text-fill-color: #FFFFFF !important;
        }

        /* Outros navegadores */
        input:-webkit-autofill {
            box-shadow: 0 0 0 30px #333333 inset;
            -webkit-text-fill-color: #FFFFFF !important;
            transition: background-color 5000s ease-in-out 0s;
        }
        /* Estilos gerais */
        body {
            background-color: #121212;
            color: #FFFFFF;
            font-family: Arial, sans-serif;
        }

        /* Container */
        .container {
            max-width: 400px; /* Ajustado para centralizar melhor o formulário */
            margin-top: 20px;
        }

        /* Títulos */
        h1 {
            text-align: center;
        }

        /* Formulário */
        .form-label {
            color: #BBBBBB;
        }

        .form-control {
            background-color: #333333;
            border: none;
            color: #FFFFFF;
            margin-bottom: 10px; /* Espaçamento inferior entre os campos */
        }

        .form-control:focus {
            background-color: #333333;
            border-color: #6200EE;
            box-shadow: 0 0 0 0.2rem rgba(98, 0, 238, 0.25);
            color: #FFFFFF; /* Cor do texto ao focar no input */
        }

        /* Botões */
        .btn-primary {
            background-color: #6200EE;
            border-color: #6200EE;
            width: 48%; /* Ajustado para ocupar menos espaço e centralizar */
        }

        .btn-primary:hover {
            background-color: #3700B3;
            border-color: #3700B3;
        }

        .btn-outline-custom {
            color: #6200EE;
            border-color: #6200EE;
            width: 48%; /* Ajustado para ocupar menos espaço e centralizar */
        }

        .btn-outline-custom:hover {
            background-color: #6200EE;
            color: #FFFFFF;
        }

        /* Logo e Nome */
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            max-width: 300px; /* Ajuste conforme o tamanho do seu logo */
            height: auto;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="img/logo.jpg" alt="Logo IndieLaunchPad">
        </div>
        <h1>Login</h1>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" id="senha" name="senha" class="form-control" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                <a href="signin.php" class="btn btn-outline-custom">Cadastre-se</a>
            </div>
        </form>
    </div>
</body>
</html>

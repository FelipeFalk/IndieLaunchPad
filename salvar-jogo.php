<?php
session_start();
include_once ('db.php');
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nomeJogo = $_POST["nomeJogo"];
        $descricaoJogo = $_POST["descricaoJogo"];
        $dataLancamento = $_POST["dataLancamento"];
        $email = $_SESSION['email'];

        $sql = "SELECT id_usuario FROM usuarios WHERE email_usuario = '$email'";
        $result =$conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $idUsuario = $row['id_usuario'];
    
            // Inserir os dados do jogo no banco de dados, incluindo o ID do usuário
            $sql = "INSERT INTO jogos (nome_jogo, descricao_jogo, data_lancamento_jogo, usuarios_id_usuario) VALUES ('$nomeJogo', '$descricaoJogo', '$dataLancamento', '$idUsuario')";
    
            if ($conn->query($sql) === TRUE) {
                $idJogo = $conn->insert_id;
    
                // Verificar se a imagem foi enviada corretamente
                if (isset($_FILES['imagemJogo']) && $_FILES['imagemJogo']['error'] == 0) {
                    $imagemJogo = $_FILES['imagemJogo'];
                    $extensao = pathinfo($imagemJogo['name'], PATHINFO_EXTENSION);
                    $novoNomeImagem = $idJogo . '_imagem.' . $extensao;
    
                    $diretorio = 'img/';
                    $caminhoImagem = $diretorio . $novoNomeImagem;
    
                    // Mover a imagem para o diretório de destino
                    if (move_uploaded_file($imagemJogo['tmp_name'], $caminhoImagem)) {
                        echo "Jogo cadastrado com sucesso!";
                    } else {
                        echo "Erro ao fazer upload da imagem.";
                    }
                } else {
                    echo "Imagem não enviada ou erro no upload.";
                }
            } else {
                echo "Erro: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Usuário não encontrado.";
        }
        header('Location: index.php');
        break;

    /*case 'editar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];

        $sql = "UPDATE usuarios SET
                            nome = '{$nome}',
                            email = '{$email}',
                            senha = '{$senha}',
                            data_nasc = '{$data_nasc}'
                        WHERE 
                            id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possível editar');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;

    case 'excluir':

        $sql = "DELETE FROM usuarios WHERE id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluído com sucesso');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;*/
}
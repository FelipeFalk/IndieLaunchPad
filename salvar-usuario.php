<?php
    include_once('db.php');
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $apelido = $_POST["apelido"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
        
            $sql = "INSERT INTO usuarios (nome_real_usuario, apelido_usuario, email_usuario, senha_usuario, cargos_id_cargo) VALUES ('{$nome}','{$apelido}','{$email}','{$senha}','1')";

            $res = $conn->query($sql);
            
            if($res==true){
                print "<script>alert('Cadastrado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print"<script>alert('Não foi possível cadastrar');</script>";
                print"<script>location.href='?page=listar';</script>";
            }
            header('Location: index.php');
            break;

            case 'editar':
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
                            id=".$_REQUEST["id"];              
    
                $res = $conn->query($sql);
                
                if($res==true){
                    print "<script>alert('Editado com sucesso');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }else{
                    print "<script>alert('Não foi possível editar');</script>";
                    print"<script>location.href='?page=listar';</script>";
                }
                break;

                case 'excluir':

                    $sql = "DELETE FROM usuarios WHERE id=".$_REQUEST["id"];
                    
                    $res = $conn->query($sql);
                    
                    if($res==true){
                        print "<script>alert('Excluído com sucesso');</script>";
                        print "<script>location.href='?page=listar';</script>";
                    }else{
                        print "<script>alert('Não foi possível excluir');</script>";
                        print"<script>location.href='?page=listar';</script>";
                    }
                    break;
    }
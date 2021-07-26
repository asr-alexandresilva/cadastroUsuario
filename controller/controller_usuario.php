<?php
// valida quantidade de itens no super global post 
// (Contra ataque de hacker que tentam passar varios campos para travar o servidor)
if(count($_POST) > 20){
    die();
}

require_once('../../../../wp-includes/pluggable.php');
require_once('../../../../wp-config.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');


require_once('../dao/usuarioDAO.php');
require('../model/usuario.php');
require('../model/apoio.php');

$apoio = new apoio();
$opcao = $apoio->validar_campo_oper($texto = isset($_POST['oper']) ? $_POST['oper'] : null);

switch ($opcao) {
        // case para castro de usuario
    case 1:
        $usuario = new Usuario();
        $usuarioDAO = new UsuarioDAO();
        $mensagem = new stdClass();
        try {
            $id = $apoio->validar_campo_form($texto = isset($_POST['id']) ? $_POST['id'] : null, 10);
            $nome = $apoio->validar_campo_form($texto = isset($_POST['nome']) ? $_POST['nome'] : null, 200);
            $email = $apoio->validar_campo_form($texto = isset($_POST['email']) ? $_POST['email'] : null, 100);
            $celular = $apoio->validar_campo_form($texto = isset($_POST['celular']) ? $_POST['celular'] : null, 30);
            $status = $apoio->validar_campo_form($texto = isset($_POST['status']) ? $_POST['status'] : null, 30);
            $produto = $apoio->validar_campo_form($texto = isset($_POST['produto']) ? $_POST['produto'] : null, 150);
            $tipo_produto = $apoio->validar_campo_form($texto = isset($_POST['tipo_produto']) ? $_POST['tipo_produto'] : null, 50);
            $status_produto = $apoio->validar_campo_form($texto = isset($_POST['status_produto']) ? $_POST['status_produto'] : null, 100);

            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setCelular($celular);
            $usuario->setProduto($produto);
            $usuario->setTipo_produto($tipo_produto);
            $usuario->setStatus_produto($status_produto);
            // setado status "ativo, para nao ter perigo de inativarem o usuario pelo lado do cliente no site
            $usuario->setStatus('ativo');
            // -------------------------

            $email_usuario_existe = $usuarioDAO->buscar_usuario_email($usuario->getEmail(), $usuario->getTipo_produto());

            // atualiza usuario
            if ($id != null || $id > 0 || $email_usuario_existe->email != null) {
                // valida se o id existe por email, caso nao exista ele adiciona o id que veio na requisicao
                if ($email_usuario_existe->id != null) {
                    $usuario->setId($email_usuario_existe->id);
                } else {
                    $usuario->setId($id);
                }

                $usuarioDAO->atualizar_dados($usuario);
            }
            // cadastra usuario
            else {
                $id_usuario = $usuarioDAO->inserir_dados($usuario);
                $usuario->setId($id_usuario);
            }
            $mensagem->codigo = 1;
            $mensagem->mensagem = 'Usuário cadastrado com sucesso!';
            // $mensagem->dados = $usuario;
            echo json_encode($mensagem);
        } catch (\Throwable $th) {
            $mensagem->codigo = 0;
            $mensagem->mensagem = 'Erro ao efetuar cadastro!';
            $mensagem->error = $th;
            die();
        }

        break;

        // case para publicar item
    case 2:
        if (is_user_logged_in()) {
            $apoio = new apoio();
            $usuarioDAO = new UsuarioDAO();
            $mensagem = new stdClass();

            $tipo_produto = $texto = isset($_POST['tipo_produto']) ? $_POST['tipo_produto'] : null;

            $usuarios = $usuarioDAO->buscar_usuarios_tipo_produto($tipo_produto);

            $mensagem->codigo = 1;
            $mensagem->mensagem = 'Usuários encontrados com sucesso!';
            $mensagem->dados = $usuarios;

            echo json_encode($mensagem);
        } else {
            wp_redirect(wp_login_url());
            die();
        }

        break;
        die();
}
die();

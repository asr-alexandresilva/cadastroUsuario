<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author Alexandre Silva
 */
require_once('../../../../wp-config.php');
require_once('../../../../wp-includes/wp-db.php');

class UsuarioDAO
{
    // ******************************** cadastro e atualizacao ********************************
    public function inserir_dados($usuario)
    {
        global $wpdb;

        $wpdb->insert('usuario_bull', array(
            'nome' => $usuario->getNome(),
            'email' => $usuario->getEmail(),
            'telefone' => $usuario->getTelefone(),
            'celular' => $usuario->getCelular(),
            'descricao' => $usuario->getDescricao(),
            'autor' => $usuario->getAutor(),
            'status' => $usuario->getStatus(),
            'tipo' => $usuario->getTipo(),
            'img' => $usuario->getImg(),
            'ordem' => $usuario->getOrdem(),
            'produto' => $usuario->getProduto(),
            'tipo_produto' => $usuario->getTipo_produto(),
            'status_produto' => $usuario->getStatus_produto(),
        ));

        $id = $wpdb->insert_id;

        return $id;
    }

    public function atualizar_dados($usuario)
    {
        global $wpdb;

        $wpdb->update(
            'usuario_bull',
            array(
                'nome' => $usuario->getNome(),
                'email' => $usuario->getEmail(),
                'telefone' => $usuario->getTelefone(),
                'celular' => $usuario->getCelular(),
                'descricao' => $usuario->getDescricao(),
                'autor' => $usuario->getAutor(),
                'status' => $usuario->getStatus(),
                'tipo' => $usuario->getTipo(),
                'img' => $usuario->getImg(),
                'ordem' => $usuario->getOrdem(),
                'produto' => $usuario->getProduto(),
                'tipo_produto' => $usuario->getTipo_produto(),
                'status_produto' => $usuario->getStatus_produto(),
            ),
            array('id' => $usuario->getId())
        );

        $msg = "ok";

        return $msg;
    }

    // atualiza dados passados por parametros do usuario
    // parametro deve estar na ordem certa array('nome_item' => 'valor')
    public function atualizar_itens($itens, $id)
    {
        //ok
        global $wpdb;

        $wpdb->update(
            'usuario_bull',
            $itens,
            array('id' => $id)
        );

        $msg = "ok";

        return $msg;
    }

    // ==============================================================================
    // ******************************** Buscar itens ********************************

    public function buscar_usuario_email($email, $tipo_produto)
    {
        global $wpdb;
        $result = $wpdb->get_results(
            "SELECT 
                id, 
                email 
            from 
                usuario_bull 
            where 
                email = '$email' 
                and tipo_produto = '$tipo_produto';"
        );

        return $result[0];
    }

    public function buscar_usuarios_tipo_produto($tipo_produto)
    {
        global $wpdb;
        $result = $wpdb->get_results(
            "SELECT
                nome,
                email,
                celular,
                data_criacao,
                produto,
                status_produto
            from
                usuario_bull
            where
                tipo_produto = '$tipo_produto';"
        );

        return $result;
    }

    // =========================================================================================
    // ******************************** Apagar e Inativar itens ********************************

    public function inativar_usuario($id)
    {
        //ok
        global $wpdb;

        $wpdb->update(
            'usuario_bull',
            array(
                'status' => "inativo"
            ),
            array('id' => $id)
        );

        $msg = "ok";

        return $msg;
    }

    public function apagar_usuario($id)
    {
        //ok
        global $wpdb;

        $wpdb->delete('usuario_bull', array(
            'id' => $id,
        ));

        return "ok";
    }
}

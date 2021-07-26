<?php

/**
 * Plugin Name: Cadastro Usuário MVC
 * Plugin URI: arpsdesigner@gmail.com
 * Description: Cadastro de usuário e relatório
 * Author: Alexandre Silva
 * Author URI: arpsdesigner@gmail.com
 * Version: 1.0.0
 * License: @alexandresilva
 */
//
global $jal_db_version;
$jal_db_version = '1.0';

function jal_install_cad_usuario()
{
	global $wpdb;
	global $jal_db_version;
	$charset_collate = $wpdb->get_charset_collate();

	$table_name = 'usuario_bull';
	$sql = "CREATE TABLE $table_name (
	id bigint(20) NOT NULL AUTO_INCREMENT,
	nome varchar(250),
	email varchar(250),
    telefone varchar(150),
    celular varchar(150),
	descricao varchar(255),
	autor varchar(250),
	status varchar(250), 
	tipo varchar(250),
	img varchar(255),
	ordem varchar(150),
	produto varchar(250),
	tipo_produto varchar(250),
	status_produto varchar(250),
	data_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	data_alteracao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
	) $charset_collate;";


	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	dbDelta($sql2);
	dbDelta($sql3);
	dbDelta($sql4);
	dbDelta($sql5);


	add_option('jal_db_version', $jal_db_version);
}

register_activation_hook(__FILE__, 'jal_install_cad_usuario');


add_shortcode('cad_usuario_estrategia_warzone', 'projeto_cad_usuario_estrategia_warzone');

function projeto_cad_usuario_estrategia_warzone()
{
	include 'views/cad_usuario_estrategia_warzone.php';
}

add_shortcode('cad_usuario_mentoria', 'projeto_cad_usuario_mentoria');

function projeto_cad_usuario_mentoria()
{
	include 'views/cad_usuario_mentoria.php';
}

add_shortcode('relatorio_usuarios', 'projeto_relatorio_usuarios');

function projeto_relatorio_usuarios()
{
	include 'views/relatorio_usuarios.php';
}

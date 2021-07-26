<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of item
 *
 * @author Alexandre Silva
 */
class Usuario
{

    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $celular;
    private $descricao;
    private $autor;
    private $status;
    private $tipo;
    private $img;
    private $ordem;
    private $produto;
    private $tipo_produto;
    private $status_produto;
    private $data_criacao;
    private $data_alteracao;

    function getId()
    {
        return $this->id;
    }

    function getNome()
    {
        return $this->nome;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getTelefone()
    {
        return $this->telefone;
    }

    function getCelular()
    {
        return $this->celular;
    }

    function getDescricao()
    {
        return $this->descricao;
    }

    function getAutor()
    {
        return $this->autor;
    }

    function getStatus()
    {
        return $this->status;
    }

    function getTipo()
    {
        return $this->tipo;
    }

    function getImg()
    {
        return $this->img;
    }

    function getOrdem()
    {
        return $this->ordem;
    }

    function getProduto()
    {
        return $this->produto;
    }

    function getTipo_produto()
    {
        return $this->tipo_produto;
    }

    function getStatus_produto()
    {
        return $this->status_produto;
    }

    function getData_criacao()
    {
        return $this->data_criacao;
    }

    function getData_alteracao()
    {
        return $this->data_alteracao;
    }

    // ============================

    function setId($id)
    {
        $this->id = $id;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    function setCelular($celular)
    {
        $this->celular = $celular;
    }

    function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    function setAutor($autor)
    {
        $this->autor = $autor;
    }

    function setStatus($status)
    {
        $this->status = $status;
    }

    function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    function setImg($img)
    {
        $this->img = $img;
    }

    function setOrdem($ordem)
    {
        $this->ordem = $ordem;
    }

    function setProduto($produto)
    {
        $this->produto = $produto;
    }

    function setTipo_produto($tipo_produto)
    {
        $this->tipo_produto = $tipo_produto;
    }

    function setStatus_produto($status_produto)
    {
        $this->status_produto = $status_produto;
    }

    function setData_criacao($data_criacao)
    {
        $this->data_criacao = $data_criacao;
    }

    function setData_alteracao($data_alteracao)
    {
        $this->data_alteracao = $data_alteracao;
    }
}

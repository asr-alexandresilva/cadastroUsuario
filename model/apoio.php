<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of apoio
 *
 * @author Alexandre Silva
 */
class apoio
{


    public function criar_cache($nome_arquivo, $dados)
    {

        $caminho_local = '../cache/';
        //$data = date("d-m-Y", strtotime('monday this week'));
        $fp = fopen($caminho_local . $nome_arquivo . ".json", 'w');
        fwrite($fp, json_encode($dados));
        fclose($fp);
    }

    // converte array em em string para gravar no banco
    public function tratar_valores_array_banco($valores_array, $aspas)
    {
        // var_dump($valores_array);
        $array_arrays = array();
        if ($aspas) {
            foreach ($valores_array as $array) {
                $array_corrigido  = "'" . $array . "'";
                array_push($array_arrays, $array_corrigido);
            }
            $valores_ok = join(",", $array_arrays);
        } else {
            $valores_ok = join(",", $valores_array);
        }

        return $valores_ok;
    }

    // converte array em string e deixa escolher o separador
    public function converter_array_em_string($array, $separador)
    {
        $valores_ok = join($separador, $array);

        return $valores_ok;
    }

    // trata array para ser gravado no banco, porem "Se nao for array, retorna o valor normal"
    public function gravar_array_no_banco($array)
    {
        if (is_array($array)) {
            $array = json_encode($array);
        }
        return $array;
    }

    // trata json (array) enviado em requisicao ajax
    public function tratar_json_requisicao_ajax($item_json)
    {
        $jsonText = str_replace("\\", "", $item_json);
        $jsonObj = json_decode($jsonText);
        $item_json = $jsonObj;

        return $item_json;
    }

    public function validar_campo_form($campo_form, $limit_campo)
    {
        if (strlen($campo_form) > $limit_campo) {
            die();
        } else {
            $this->valida_codigo_php_string($campo_form);
            $campo_form = trim($campo_form);
            $campo_form = stripslashes($campo_form);
            $campo_form = htmlspecialchars($campo_form);
            return $campo_form;
        }
    }

    public function valida_codigo_php_string($string)
    {

        $findarray = array(
            'file_put_contents',
            '<?=',
            '<?php',
            '?>',
            'eval(',
            '$_REQUEST',
            'var_dump',
            'print_r',
            'echo',
            '$_SERVER',
            'exec(',
            'shell_exec(',
            'invokefunction',
            'call_user_func_array',
            'display_errors',
            'ini_set',
            'set_time_limit',
            'set_magic_quotes_runtime',
            'DOCUMENT_ROOT',
            'include(',
            'include_once(',
            'require(',
            'require_once(',
            'base64_decode',
            'file_get_contents',
            'sizeof',
            'array('
        );

        for ($i = 0; $i < sizeof($findarray); $i++) {
            $res = strpos($string, $findarray[$i]);
            if ($res !== false) {
               die();
            }
        }

        return $string;
    }

    // valida campo oper
    public function validar_campo_oper($oper)
    {
        if (strlen($oper) > 3 || !is_numeric($oper)) {
            die();
        } else {
            return $oper;
        }
    }
}

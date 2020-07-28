<?php
    require __DIR__ . '/vendor/autoload.php';

    if (isset($_POST["cep"])) {
        $cep = $_POST["cep"];
        
        $formated_cep = preg_replace("/[^0-9]/", "", $cep);
        if (!preg_match('/^[0-9]{8}?$/', $formated_cep)) {
            
        } else {
            $class = new Jarouche\ViaCEP\BuscaViaCEPJSON();
        
            $result = $class->retornaCEP($cep);
            $retorno =  $class->retornaConteudoRequisicao();
            $retorno = json_decode($retorno);

            $retorno->cep = preg_replace("/[^0-9]/", "",$retorno->cep);
        }

    }
?>
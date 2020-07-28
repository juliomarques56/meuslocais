<?php 

    include 'conexao.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];
    $bairro = $_POST['nubairromero'];
    $uf = $_POST['uf'];
    $cidade = $_POST['cidade'];
    $data = $_POST['data'];

    $sql = "UPDATE `locais` SET `nome`='$nome',`cep`='$cep',`logradouro`=$logradouro,`numero`='$numero', `bairro`='$bairro', `uf`='$uf', `cidade`='$cidade', `data`='$data' WHERE id = $id";
    mysqli_query($conexao, $sql); 

    header('Location:index.php');
?>
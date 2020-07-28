<?php 

    include 'conexao.php';
    
    $nome = $_POST['nome'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $uf = $_POST['uf'];
    $cidade = $_POST['cidade'];
    $data = $_POST['data'];
    $dataformatada = new DateTime($data);
    $dataformatada = $dataformatada->format('Y-m-d');

    $sql = "INSERT INTO `locais`(`nome`, `cep`, `logradouro`, `complemento`, `numero`, `bairro`, `uf`, `cidade`, `data`) VALUES ('$nome','$cep','$logradouro','$complemento','$numero', '$bairro', '$uf', '$cidade', '$dataformatada')";
    $inserir = mysqli_query($conexao, $sql); 

    header('Location:index.php');
?>
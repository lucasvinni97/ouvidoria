<?php require "conecta_banco.php"; ?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="ut-8" />
    <link rel="stylesheet" type="text/css" href="estilos/geral.css" />
    <title>Ouvidoria Municipal da Cidade de Hello World</title>
</head>
<body>
    <header id="cabecalho">
        <div class="logotipo">
            <a href="index.php"><img src="estilos/logotipo.png" alt="" title="" /></a>
        </div>
    </header>
        <nav id="navegacao">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="#">Relatórios</a></li>
                <li><a href="">Reclamações</a></li>
            </ul>
        </nav>

    <section id="corpo">
        <div class="painel">
        <?php
            if (isset($_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['mensagem'], $_POST['nascimento'])) {
            // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
                date_default_timezone_set('America/Sao_Paulo');

                $data = date("d/m/Y H:i");
                $nome = $_POST['nome'];
                $sobrenome = $_POST['sobrenome'];
                $email = $_POST['email'];
                $mensagem = $_POST['mensagem'];
                $nascimento = $_POST['nascimento'];

                if (empty($nome) && empty($sobrenome) && empty($email) && empty($mensagem) && empty($nascimento)) {
                    echo "<h5>Você deve preencher os campos do formulário!</h5>";
                } else {
                    $sql = "INSERT INTO dados (nome, sobrenome, email, mensagem, data_post, nascimento) VALUES ('$nome', '$sobrenome', '$email', '$mensagem', '$data', '$nascimento')";

                    if (mysqli_query($conecta, $sql)) {
                        echo "<h5>" . $nome . ' agradecemos a sua mensagem! Aguarde um e-mail em seu e-mail para confirmar que recebemos seus dados, e brevemente será respondido.' . "</h5>";
                    } else {
                        echo "Erro " . $sql . "<br>" . mysqli_error($conecta);
                    }
                 }
                 mysqli_close($conecta);
                }
        ?>
        </div>
    </section> 
</body>
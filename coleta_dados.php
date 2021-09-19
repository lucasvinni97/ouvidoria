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
                <li><a href="#">Reclamações</a></li>
            </ul>
        </nav>

    <section id="corpo">
        <div class="painel">
        <?php
            if (isset($_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['mensagem'])) {
                $nome = $_POST['nome'];
                $sobrenome = $_POST['sobrenome'];
                $email = $_POST['email'];
                $mensagem = $_POST['mensagem'];

                if (empty($nome) && empty($sobrenome) && empty($email) && empty($mensagem)) {
                    echo "<h5>Você deve preencher os campos do formulário!</h5>";
                } else {
                    $sql = "INSERT INTO dados (nome, sobrenome, email, mensagem) VALUES ('$nome', '$sobrenome', '$email', '$mensagem')";

                    if (mysqli_query($conecta, $sql)) {
                        echo "<h5>" . $nome . ' agradecemos a sua mensagem! Aguarde um e-mail em seu e-mail para confirmar que recebemos seus dados, e brevemente será respondido.' . "</h5>";
                    } else {
                        echo "Erro " . $sql . "<br>" . mysqli_error($conecta);
                    }
                 }

            $corpo_email = "<html>
                                Olá, $nome, estamos enviando este e-mail para confirmar que recebemos a sua reclamação em nossa ouvidoria.<br><br>A Prefeitura Municipal de Hello World agradece o seu tempo, e tão brevemente se compromete a responder este e-mail.</html>
                            ";

            $remetente = "contato@saveweb.com.br";
            $destino = $email;
            $assunto = "OUVIDORIA: Sua reclamação foi recebida!";

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: $nome <$email>';

            $disparaEmail = mail($destino, $assunto, $corpo_email, $headers);

            } else {
                echo "<h5>Não há dados para serem enviados :(</h5>";
            }


        ?>
        </div>
    </section> 
</body> 

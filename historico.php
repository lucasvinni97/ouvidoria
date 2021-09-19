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
                <li><a href="historico.php">Reclamações</a></li>
            </ul>
        </nav>

    <section id="corpo">
        <div class="painel">
            <h1>Ouvidoria Municipal da cidade Hello World</h1>
            <h5>Use os canais abaixos para fazer uma crítica, sugestão ou elogio 🤔</h5>
        </div>

        <?php 
                $consulta = "SELECT * FROM dados";

                $resultado = mysqli_query($conecta, $consulta);
        
          while ($dado = mysqli_fetch_array($resultado)) {
                    echo "
                        <div id='registros'>
                            <div class='reg-foto'>
                                <img src='estilos/foto-perfil.jpg' />
                            </div>
                            <div class='reg-mensagem'>
                                <strong> " . $dado['nome'] . $dado['sobrenome'] . " </strong> disse:<br> " . 
                                $dado['mensagem'] . "
                            </div>
                    </div>
                    "; 
        }
        ?>
       

    </section>
</body>
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
        <div class="formulario">
            <form action="coleta_dados.php" name="" method="POST">
                <label>Nome</label>
                    <input type="text" name="nome" />
                <label>Sobrenome</label>
                    <input type="text" name="sobrenome" />
                <label>E-mail</label>
                    <input type="email" name="email" /><br />
                <label>Sua mensagem/reclamação</label><br /><br />
                    <textarea type="text" name="mensagem" rows="10"></textarea>
                <label>Ano de Nascimento</label>
                    <select name="nascimento">
                        <?php 
                        for ($ano = date("Y"); $ano <= 2021 && $ano > 1921; $ano -= 1) {
                                    
                        echo '<option name="nascimento" value="'. $ano .'">' .
                            $ano . '
                        </option>';
                            } 
                        ?>
                    </select>
                    
                    <br /><br /><br />
                <center><input type="submit" name="enviar" value="Enviar" /></center>
            </form>
        </div>

        <div class="painel">
            <h1>Últimas Reclamações</h1>
            <h5>Veja o que os cidadãos de Hello World vêm dizendo sobre a administração da cidade 🤔</h5>
        </div>

        <div id="registros" style="margin-top: 20px">
            <div class="reg-foto">
                <img src="estilos/foto-perfil.jpg" />
            </div>
            <?php 
                $consulta = mysqli_query($conecta, "SELECT * FROM dados ORDER BY id_form DESC LIMIT 2");

            $exibe = mysqli_fetch_array($consulta);

            if (isset($exibe)) {
                echo "<div class='reg-mensagem'><strong style='font-size:20px;font-family: Poppins-Bold'>" . $exibe['nome'] . " " . $exibe['sobrenome'] . "</strong> em <i>" . $exibe['data_post'] . " </i> disse:<br> <span style='font-family: Poppins-Light'>" . $exibe['mensagem'] . "</span></div>";
            } else {
                echo "Ainda não há dados...";
            }
            mysqli_close($conecta);
            ?>
        </div>
    </section>
</body>
</html>
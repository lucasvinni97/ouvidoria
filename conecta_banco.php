<?php 
$conecta = mysqli_connect("127.0.0.1", "root", "", "form_database");

if (!$conecta) {
    die("Falhou a conexão com o banco" . mysqli_connect_error());
}
?>
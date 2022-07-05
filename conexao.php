<!-- PAINEL DE CONFIGURAÇÃO 
AQUI VOCÊ VAI DEFINIR O NOME DO SEU SITE, TODO O SISTEMA FOI CRIADO POR VINICIUS GUIMARAES, BOM USO ^^
-->
<?php
$servidor = "localhost";
$usuarios = "root";
$senha = "";
$dbname = "animesonline";
$servico = "Animes"; // Insira o serviço ex: Séries, Filmes, Animes, Mangás etc.
$nome_site = "Nome do seu site";
$discord = "0"; // Caso tenho discord, user 1 caso não deixe no 0
$link_discord = "https://discord.gg/codigo"; // Se o discord estiver ligado, coloque o link aqui

/* Criar conexão */
$conn = mysqli_connect($servidor, $usuarios, $senha, $dbname);





?>
<?php

// Inicia a sessão. Isso permite que os dados possam ser armazenados entre as requisições (ex: usuário logado, pontuação, etc.).
session_start();

// Obtém o parâmetro 'route' da URL (caso exista). Se não existir, define 'start' como o valor padrão.
// Esse parâmetro define a  "rota" ou página que será carregada no sistema (ex: página inicial, jogo, etc.).
$route = $_GET['route'] ?? 'start';

// A variável $script vai armazenar o nome do script que será carregado com base na rota.
$script = null;

// Utiliza uma estrutura de controle switch para definir qual script carregae com base no valor de $route.
switch ($route) {
    // Se a rota for 'start', carrega o script para a página inicial do jogo.
    case 'start':
        $script = 'start'; // Define que o script 'start.php' será carregado,
        break;

    // Se a rota for 'game', carrega o script do jogo em si.
    case 'game':
        $script = 'game'; // Define que o script 'game.php' será carregado.
        break;

    // Se a rota for 'gameover', carrega o script de finalização do jogo.
    case 'gameover':
        $script = 'gameover'; // Define que o script 'gameover.php' será carregado.
        break;

    // Se a rota não for nenhuma das anteriores, carrega um script para página 404 (página não encontrada).
    default:
        $script = '404'; // Define que o script '404.php' será carregado.
        break;
}

// Carrega o arquivo de dados das capitais, que contém uma lista ou array com os países e suas capitais.
// Este é um arquivo PHP que retorna dados.
$capitals = require __DIR__ . '/data/capitals.php';

// Carrega o cabeçalho da página (um arquivo HTML/PHP com a estrutura inicial do site, como a barra de navegação).
require_once __DIR__ . "/scripts/header.php";

// Carrega o script correspondente à rota definida anteriormente. O nome da script foi definido na variável $script.
// Exemplo: se a rota for 'game', o arquivo 'game.php' será carregado.
require_once __DIR__ . "/scripts/$script.php";

// Carrega o rodapé da página (um arquivo HTML/PHP com a estrutura final do site, como as informações de copyright).
require_once __DIR__ . "/scripts/footer.php";
#!/usr/bin/env php

<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Alura\BuscadorDeCursos\Buscador;

/**
 * O comando composer install lê o arquivo composer.lock e instala as exatas dependências lá definidas.
 * No nosso caso, nós já tinhamos o arquivo criado, então o composer.lock foi lido e como não havia alterações,
 * nada foi instalado.

 * Já o comando composer update lê o arquivo composer.json, instala as dependências mais atuais dentro das
 * restrições definidas e atualiza o composer.lock.
 *
 * Sendo assim, em um projeto em andamento (tendo o arquivo composer.lock), para instalarmos uma nova
 * dependência precisamos executar o composer require ou após adicionar a dependência no arquivo
 * composer.json executar o comando composer update.
 */

/*
 * Todos os arquivos devem ter como seu nome o nome da classe contida nele e a extensão .php
 * A classe Teste deve estar no arquivo chamado Teste.php, por exemplo.
 *
 * Cada um dos namespaces após o vendor namespace deve ser mapeados para uma estrutura de diretórios.
 * Levando em consideração que Alura\Namespace\Padrao está mapeado para /src/php/code, a classe
 * Alura\Namespace\Padrao\Helper\ClasseHelper deve estar no caminho /src/php/code/Helper/ClasseHelper.php.
 *
 * Um vendor namespace (namespace raiz ou padrão) deve ser mapeado para uma pasta base da aplicação
 * Sempre precisa haver um mapeamento entre um namespace raiz para uma pasta base. Ex.: Todas as
 * classes e namespaces que tiverem no namespace Alura\Namespace\Padrao poderão ser encontrados na pasta /src/php/code.
 *
 */

Teste::metodo();
Teste2::metodo();

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}

exibirMensagem("Qualquer Mensagem");
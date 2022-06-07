<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    /**
     * @var ClientInterface
     */
    private ClientInterface $httpClient;

    /**
     * @var Crawler
     */
    private Crawler $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function buscar(string $url): array
    {
        $resposta = $this->httpClient->request('GET', $url);

        $html = $resposta->getBody();
        //echo $html->read(10); //pega apenas os 10 primeiros bytes
        //$html = $html->__toString();

        //echo $html;
        //echo $resposta->getStatusCode();
        //echo $resposta->getHeaderLine('content-type');

        $this->crawler->addHtmlContent($html);
        $elementos_cursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach ($elementos_cursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }
        return $cursos;
    }
}
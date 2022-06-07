<?php
//importar arquivo isolado pelo autoloader -> "files": ["./funcoes.php"],
//Estes arquivos serão importados independente de serem acessados ou não.
function exibirMensagem(string $msg)
{
    echo $msg . PHP_EOL;
}
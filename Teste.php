<?php
//importar pelo autoloader classe(s) que não obedece a psr-4 -> "classmap": ["./Teste.php"],
class Teste
{
    public static function metodo(){
        echo "teste" . PHP_EOL;
    }
}

class Teste2
{
    public static function metodo(){
        echo "teste2" . PHP_EOL;
    }
}
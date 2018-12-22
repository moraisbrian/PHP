<?php

$nome = "Brian";
$a = 1;
$b = 2;
$c = 7;

function ExibiNome(){
    global $nome;
    echo $nome;
}

ExibiNome();

echo '<hr/>';

function Soma($a, $b, $c){
    $a = $a + $b + $c;
    echo $a;
}

Soma($a, $b, $c);

echo '<hr/>';

function SomaDois(){
    echo $GLOBALS['a'] + $GLOBALS['b'] + $GLOBALS['c'];
}

SomaDois();

?>
<?php
$nome = false;

var_dump($nome);

if(is_string($nome)):
    echo "é string";
else:
    echo "não é string";
endif;
////////////////////////////////////

echo "<hr/>";

$carros = array("gol", "brasilha", 20);
var_dump($carros);
if(is_array($carros)):
    echo "Array";
else:
    echo "não array";
endif;

echo "<hr/>";

//objeto

class Cliente{
    private $nome;
    public function AtribuirNome($nome){
        $this->nome = $nome;
    }
}


$cliente = new Cliente();
$cliente->AtribuirNome("Brian");
var_dump($cliente);

?>
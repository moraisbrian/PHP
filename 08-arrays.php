<?php
$carros = array("fusca", "brasilha", "opala");
print_r($carros);

//Inserindo valores
$carros[] = "gol";

//Criar indices no array
$carros = array(1=>"fusca", 2=>"brasilha", 3=>"opala");

echo "<hr>";

$motos = array();
$motos[] = "honda";
echo $motos[0];

$clientes = ["rodrigo", "felipe", "bia"];

//contar array
echo count($carros); 

echo "<hr>";

foreach($carros as $valor){
    echo $valor."<br>";
}

echo "<hr>";

//Array associativo
$pessoa = array("nome" => "Brian", "idade" => 23);
$pessoa["cidade"] = "varzea";

print_r($pessoa);

echo "<hr>";

//multidirecionais (matrizes)
$animais = array(
    "mamiferos"=> array("vaca", "baleia", "bode"),
    "repiteis"=> array("lagarto", "cobra"));

    echo $animais["repiteis"][1];
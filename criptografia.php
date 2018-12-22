<?php
$senha = "123456";

$novaSenha = base64_encode($senha);
echo $novaSenha;
echo '<br/>';
$novaSenha = base64_decode($novaSenha);
echo $novaSenha;

echo '<hr/>';

echo md5($senha);

echo '<hr/>';

echo sha1($senha);

echo '<hr/>';

$senhaSegura = password_hash($senha, PASSWORD_DEFAULT);
echo $senhaSegura;
echo '<br/>';

$senha_db = '$2y$10$BW9NjIjxCfMb4EJ9gy2CYOBhovoG2yKrVbS8nWZ8OoCEvJaB54xMC';

if(password_verify($senha, $senha_db)){
    echo 'Certo';
}else{
    echo 'Errado';
}
?>
<?php 
session_start();
echo $_SESSION['nome'].'<br>';
echo $_SESSION['senha'].'<br>';
echo session_id();
 ?>
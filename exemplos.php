<?php
// session_start();
// $_SESSION["email"] = "laique@hotmail.com";
// $_SESSION["tipo"] = "administrador";

// session_destroy();
// print_r($_SESSION);

//d -> representa o dia (01 -31);
//m -> representa (1-12)
//y ->  representa o ano em quatro digitos
// l -> representa o dia da semana
// H ->formato da hora (00 a 23)
// h ->formato da hora (01 a 12)
// i ->representa os minutos (00 a 59)
// s ->representa os minutos (00 a 59)
// a ->representa se é AM ou PM
// date_default_timezone_set('America/Sao_Paulo');

// echo "Todos os direitos servardos 2020 -  " . date('d/m/Y H:i:sa');
// session_start();
// $_SESSION["tipo_usuario"] = "administrador";

// print_r($_SESSION);

// class Pessoa{
//     public $nome;
//     public function __construct($nome){
//         $this->nome = $nome;
    
//     }
// }


// $nome = "joão";
// $idade = 18;
// $salario = 2800.58;
// $verdade = true;
// $pessoas = array( new Pessoa('Tiago'), new Pessoa('Natalia'),new Pessoa('Fabio'),new Pessoa('Jennifer'));

// foreach ($pessoas as $key => $value) {
//    echo $value->nome;
// }

$hash = password_hash('123456',PASSWORD_ARGON2I);
$senhaDigita = '123456';

print_r(rand());


?>
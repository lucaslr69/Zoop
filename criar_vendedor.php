<?php
session_start();

$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);


$cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
$razao_social = filter_input(INPUT_POST, 'razao_social', FILTER_SANITIZE_STRING);
$nome_fantasia = filter_input(INPUT_POST, 'nome_fantasia', FILTER_SANITIZE_STRING);
$data_abertura = filter_input(INPUT_POST, 'data_abertura', FILTER_SANITIZE_STRING);
$fone = filter_input(INPUT_POST, 'fone', FILTER_SANITIZE_STRING);
$ruapj = filter_input(INPUT_POST, 'ruapj', FILTER_SANITIZE_STRING);
$numeropj = filter_input(INPUT_POST, 'numeropj', FILTER_SANITIZE_STRING); //número do estabelecimento
$complementopj = filter_input(INPUT_POST, 'complementopj', FILTER_SANITIZE_STRING);
$bairropj = filter_input(INPUT_POST, 'bairropj', FILTER_SANITIZE_STRING);
$cidadepj = filter_input(INPUT_POST, 'cidadepj', FILTER_SANITIZE_STRING);
$estadopj = filter_input(INPUT_POST, 'estadopj', FILTER_SANITIZE_STRING);
$ceppj = filter_input(INPUT_POST, 'ceppj', FILTER_SANITIZE_STRING);

define('MARKETPLACE', 'ID DO MARKETPLACE AQUI'); //colocar dentro dos ' '
define('KEY', 'CHAVE DE PRODUÇÃO AQUI'); //colocar dentro dos ' '
define('SELLER', 'SEU ID DE VENDEDOR'); //colocar dentro dos ' '

require __DIR__ . '/vendor/autoload.php';

use App\API\Zoop;

$api = new Zoop(MARKETPLACE, KEY, SELLER);

if($tipo == 'pf'){

    try {
     $vendedor = $api->createSellerPf([
         'first_name' => $nome,
         'last_name' => $sobrenome,
         'taxpayer_id' => $cpf,
         'email' => $email,
         'address' => [
             'line1' => $rua,
             'line2' => '',
             'neighborhood' => $centro,
             'city' => $cidade,
             'state' => $estado,
             'postal_code' => $cep,
             'country_code' => 'BR',
         ],
     ]);
     header("Location: /registro-sucesso");
    } catch (\Exception $e) {
        header("Location: /registro-error");
    }

} else {
    try {
        $vendedorseller = $api->createSellerPj([
                'owner' => [
                    'first_name' => $nome,
                    'last_name' => $sobrenome,
                    'taxpayer_id' => $cpf,
                    'email' => $email,
                    'address' => [
                        'line1' => $rua,
                        'line2' => '',
                        'neighborhood' => $centro,
                        'city' => $cidade,
                        'state' => $estado,
                        'postal_code' => $cep,
                        'country_code' => 'BR',
                    ],
                ],
                'business_name' => $razao_social,
                'business_email' => $email,
                'description' => $nome_fantasia,
                'business_description' => $nome_fantasia,
                'statement_descriptor' => $nome_fantasia,
                'ein' => $cnpj,
                'business_opening_date' => $data_abertura,
                'business_phone' => $fone,
                'business_address' => [
                    'line1' => $ruapj,
                    'line2' => $numeropj,
                    'line3' => $complementopj,
                    'neighborhood' => $bairropj,
                    'city' => $cidadepj,
                    'state' => $estadopj,
                    'postal_code' => $ceppj,
                    'country_code' => 'BR',
                ],
                
            ]);
     header("Location: /registro-sucesso");
    } catch (\Exception $e) {
        header("Location: /registro-error");
    }
}

 



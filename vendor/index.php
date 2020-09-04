<?php

define('MARKETPLACE', '077361e6065f4f60a895533de5cf5ea5');
define('KEY', 'zpk_prod_Sl9VF3HT5QdhZ59qZjLeyNXY');
define('SELLER', '16f627669839416dad970f9dc6f3fa8a');

require __DIR__ . '/vendor/autoload.php';

use App\API\Zoop;

$api = new Zoop(MARKETPLACE, KEY, SELLER);

echo '<pre>';

$idLuquinha = '498c2c7f2e2b46b2af9cc5628363c000';

// try {
//     $pagamento = $api->payCreditCard(array(
//         'description' => 'Plano Nitro',
//         'amount' => 1.00,
//         'card' => array(
//             'card_number' => 'numero cartao',
//             'holder_name' => 'nome',
//             'expiration_month' => 'VENCIMENTO',
//             'expiration_year' => 'ANO',
//             'security_code' => 'CODIGO',
//         )
//     ), 'ID_PEDIDO_SITE');
//     print_r($pagamento);
//   } catch(\Exception $e){
//       echo $e->getMessage() . PHP_EOL;
//   }

// $dataExpired = date('Y-m-d', strtotime(date('Y-m-d') . ' + 3 day'));
// $dayofweek = date('w', strtotime($dataExpired));

// // se a data limite de pagamento for sábado, aumenta 2 dias no vencimento
// if ($dayofweek == '6') {
//     $dataExpired = date('Y-m-d', strtotime($dataExpired . ' + 2 day'));
// }

// // se for domingo, aumenta 1 dia no vencimento
// if ($dayofweek == '0') {
//     $dataExpired = date('Y-m-d', strtotime($dataExpired . ' + 1 day'));
// }

// // gerar boleto
// try {
//     $boleto = $api->generateTicket(array(
//         'amount' => 20.00,
//         'description' => 'Pagamento Zoop',
//         'top_instructions' => 'Instruções de pagamento',
//         'body_instructions' => 'Não receber após a data de vencimento.',
//         'expiration_date' => (string) $dataExpired,
//         'payment_limit_date' => (string) $dataExpired,
//     ), $idLuquinha, rand(20,1000));

//     print_r($boleto);
// } catch (\Exception $e) {
//     echo $e->getMessage() . PHP_EOL;
// }

// listar os vendedores
// try {
//     $allSeller = $api->getAllSellers();
// } catch (\Exception $e) {
//     echo $e->getMessage() . PHP_EOL;
// }
// var_dump($allSeller);

// criar um cliente
// try {
//     $comprador = $api->createClient([
//         'first_name' => 'Everton Pessoa',
//         'taxpayer_id' => '07407218447',
//         'email' => 'everton.amp@gmail.com',
//         'address' => [
//             'line1' => 'Rua Dr Barbosa Lima, 93',
//             'line2' => '',
//             'neighborhood' => 'Centro',
//             'city' => 'Passira',
//             'state' => 'PE',
//             'postal_code' => '55650000',
//             'country_code' => 'BR',
//         ],
//     ]);
//     print_r($comprador);
// } catch (\Exception $e) {
//     echo $e->getMessage() . PHP_EOL;
// }

// listar todos os clientes
// try {
//     $allClients = $api->getAllClients();
// } catch (\Exception $e) {
//     echo $e->getMessage() . PHP_EOL;
// }

// var_dump($allClients);

// buscar informação de um determinado cliente
// try {
//     $comprador = $api->getClient('3640a4c425744b15b9c59b584ea81aef');
// } catch (\Exception $e) {
//     echo $e->getMessage() . PHP_EOL;
// }
// print_r($comprador);

// // deletando um cliente
// try {
//     $response = $api->deleteClient('3640a4c425744b15b9c59b584ea81aef');

// } catch (\Exception $e) {
//     echo $e->getMessage() . PHP_EOL;
// }

// print_r($response);

//498c2c7f2e2b46b2af9cc5628363c000

// deletando um cliente
try {
    $response = $api->getTransaction('f139e3703c78499e8048fb04ec37ef8e');

} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

var_dump($response);

// print_r($response);
<?php

namespace Api\controller\in_bound;

use Api\database\firebird_database\model\Funcionario;
use Api\util\MensagensUtil;
use Api\database\api_pdv\dao\KeyDAO;
use Api\config\Sessao;
use DateTime;

class KeyController
{
    // private static $authKey = "VnHQqx4MV2UE5KO3EIXBrdZn";

    // public static function authenticar()
    // {
    //     if (!isset($_GET["key"])) {
    //         MensagensUtil::acessoNegado("Dados faltando.");
    //     }

    //     $dataKey = KeyDAO::buscarDadosLogin(trim($_GET["key"]));

    //     if(!empty($dataKey)){
    //         // Verifica se a data da chave não expirou
    //         if(!empty($dataKey->data_fim)){
    //             $data_fim = new DateTime($dataKey->data_fim);
    //             $data_atual = new DateTime();
    //             if($data_atual > $data_fim){
    //                 MensagensUtil::acessoNegado("Chave de acesso expirada");
    //             }
    //         }

    //         if($dataKey->integrado_sgmat == "S"){
    //             if(empty($dataKey->banco)){
    //                 MensagensUtil::acessoNegado("Sua integração com o sistema necessita que um banco de dados seja informado");
    //             }
    //         }

    //         $header = [
    //             "typ"=> "JWT",
    //             "alg"=> "HS256"
    //         ];

    //         $payload = [
    //             'banco'=> $dataKey->banco,
    //             'integrado_sgmat'=> $dataKey->integrado_sgmat,
    //             "data_fim"=> $dataKey->data_fim
    //         ];

    //         //JSON
    //         $header = json_encode($header);
    //         $payload = json_encode($payload);

    //         //Base 64
    //         $header = base64_encode($header);
    //         $payload = base64_encode($payload);

    //         //Sing
    //         $sing = hash_hmac('sha256', $header . "." .$payload, self::$authKey, true);
    //         $sing = base64_encode($sing);

    //         $token = $header. '.' . $payload . '.' . $sing;
        
    //         return [
    //             "data_fim"=> $dataKey->data_fim,
    //             "impressora"=> $dataKey->impressora,
    //             "pagamento"=> $dataKey->pagamento,
    //             "integrado_sgmat"=> $dataKey->integrado_sgmat,
    //             "online"=> !empty($dataKey->banco),
    //             "token" => $token
    //         ];
    //     }
    //     MensagensUtil::acessoNegado("Chave invalida");
    // }

    // public static function autorizar(): bool
    // {

    //     $http_header = apache_request_headers();

    //     if ((isset($http_header["Authorization"]) && $http_header["Authorization"] != null)
    //         || (isset($http_header["authorization"]) && $http_header["authorization"] != null)
    //     ) {
    //         if (isset($http_header["Authorization"]) && $http_header["Authorization"] != null) {
    //             $bearer = explode(" ", $http_header["Authorization"]);
    //         } else {
    //             $bearer = explode(" ", $http_header["authorization"]);
    //         }

    //         $token = explode(".", $bearer[1]);
    //         $header = $token[0];
    //         $payload = $token[1];
    //         $sign = $token[2];

    //         // Conferir Assinatura
    //         $valid = hash_hmac('sha256', $header . "." .$payload, self::$authKey, true);
    //         $valid = base64_encode($valid);

    //         if ($sign === $valid) {

    //             $payload = json_decode(base64_decode($payload));
            
    //             // Verifica se a chave ainda tem uma data valida
    //             if(!empty($payload->data_fim)){
    //                 $data_fim = new DateTime($payload->data_fim);
    //                 $data_atual = new DateTime();
    //                 if($data_atual > $data_fim){
    //                     MensagensUtil::acessoNegado("Chave de acesso expirada");
    //                 }
    //             }

    //             Sessao::$integradoSgmat = $payload->integrado_sgmat;
    //             Sessao::$banco = $payload->banco;
    //             Sessao::$dataFim = $payload->data_fim;
    //             Sessao::$idEmpresa = $payload->id_empresa ?? null;
    //             Sessao::$funcionarioNivel = $payload->funcionario_nivel ?? null;
    //             Sessao::$funcionarioNome = $payload->funcionario_nome ?? null;
    //             Sessao::$funcionarioCodigo = $payload->funcionario_codigo ?? null;

    //             return true;
    //         }
    //     }

    //     return false;
    // }

    // public static function gerarTokenFuncionario(Funcionario $funcionario){

    //     $header = [
    //         "typ"=> "JWT",
    //         "alg"=> "HS256"
    //     ];

    //     $payload = [
    //         'id_empresa'=> $funcionario->getCodEmpresa(),
    //         'banco'=> Sessao::$banco,
    //         'integrado_sgmat'=> Sessao::$integradoSgmat,
    //         "data_fim"=> Sessao::$dataFim,
    //         "funcionario_nivel"=> $funcionario->getNivel(),
    //         "funcionario_nome"=> $funcionario->getNome(),
    //         "funcionario_codigo"=> $funcionario->getCodigo()
    //     ];

    //      //JSON
    //      $header = json_encode($header);
    //      $payload = json_encode($payload);

    //      //Base 64
    //      $header = base64_encode($header);
    //      $payload = base64_encode($payload);

    //      //Sing
    //      $sing = hash_hmac('sha256', $header . "." .$payload, self::$authKey, true);
    //      $sing = base64_encode($sing);

    //      $token = $header. '.' . $payload . '.' . $sing;
     
    //      return [
    //          "funcionario_nivel"=> $funcionario->getNivel(),
    //          "funcionario_nome"=> $funcionario->getNome(),
    //          "funcionario_codigo"=> $funcionario->getCodigo(),
    //          "token" => $token
    //      ];
    // }

}
<?php

namespace Api\controller\in_bound;

use Api\service\ProdutoService;

class ProdutoController
{


    public function GET($parametro1 = null)
    {
        $produtoService = new ProdutoService();

        if ($parametro1 != null) {
            if (is_numeric($parametro1)) {
                $produtoService->buscarTodosProdutos($parametro1);
            } else if ($parametro1 == "estoque-zerado") {
            }
        } else {
            return $produtoService->buscarTodosProdutos();
        }
    }

    public function POST($parametro1 = null)
    {
        $requestValue = file_get_contents("php://input");
        $json = json_decode($requestValue);

        $produtoService = new ProdutoService();

        $produtoService->buscarProdutoPorCodigo($json);
    }
    public function PUT($parametro1 = null)
    {
        $requestValue = file_get_contents("php://input");
        $json = json_decode($requestValue);

        //$id = $parametro1;
        //$nome = $json['nome'] ?? null;
        //$email = $json['email'] ?? null;

        $produtoService = new ProdutoService();

        if ($parametro1 != null) {
            $produtoService->atualizarProduto($json, $parametro1);
        }


        if ($produtoService == true) {
            echo json_encode(['mensagem' => 'Produto atualizado com sucesso.']);
        } else {
            echo json_encode(['mensagem' => 'Falha ao atualizar o produto.']);
        }
    }

    public function DELETE($parametro5)
    {
        $requestValue = file_get_contents("php://input");
        $json = json_decode($requestValue);

        $produtoService = new ProdutoService();
        $produtoService->deletarNomeEmail($parametro5);
    }
}

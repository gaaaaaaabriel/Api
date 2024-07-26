<?php

namespace Api\service;

use Api\database\mysql\dao\ProdutoDAO;
use Api\database\mysql\model\Produto;

class ProdutoService
{

    public function buscarTodosProdutos()
    {
        $produtoDao = new ProdutoDAO();
        $produtos = $produtoDao->getAll();

        echo json_encode($produtos);
        exit;
    }


    public function buscarProdutoPorCodigo($json)
    {
        $produtoDao = new ProdutoDAO();

        $produto = new Produto();

        $produto->setClienteNome($json->nome);
        $produto->setClienteEmail($json->email);


        $produtoDao->insert($produto);
    }

    public function atualizarProduto($json, $id)
    {
        $produtoDao = new ProdutoDAO();
        $produto = new Produto();

        $produto->setId($id);
        $produto->setClienteNome($json->nome ?? null);
        $produto->setClienteEmail($json->email ?? null);

        return $produtoDao->update($produto);
    }

    public function deletarNomeEmail($id){
        $produtoDao = new ProdutoDAO();
        $produto = new Produto();
        $produto->setId($id);

        $produtoDao->delete($produto);
    }
}

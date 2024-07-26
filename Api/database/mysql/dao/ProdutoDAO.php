<?php

namespace Api\database\mysql\dao;

use Api\database\mysql\model\Produto;
use Api\database\mysql\MySqlPDO;
use Api\util\MensagensUtil;
use Throwable;
use PDO;

class ProdutoDAO
{
    //essa função esta fazendo o papel de pegar todos os produtos 
    //que tem dentro de um banco de dados, e retornando dentro 
    //da variavel "$produtos = [];" que é um array.
    public function getAll()
    {
        //conecxão com banco de dados pela calsse
        //MySqlPDO, usando o metodo getInstance
        $pdo = MySqlPDO::getInstance();

        //consulta sql, vai buscar todas as colunas da tabela produto
        $sql = "SELECT * FROM produtos";
        $stmt = $pdo->prepare($sql);

        try {
            //executa   o comando, e retorna em objeto, por conta do "fetchAll(PDO::FETCH_OBJ);"
            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_OBJ);

            $produtos = [];

            foreach ($dados as $key => $dado) {

                $produto = new Produto();
                $produto->setId($dado->id);
                $produto->setClienteEmail($dado->cliente_email);
                $produto->setClienteNome($dado->cliente_nome);

                array_push($produtos, $produto->toList());
            }

            return $produtos;
        } catch (Throwable $e) {
            MensagensUtil::erroInterno($e->getMessage());
        } finally {
            $stmt->closeCursor();
        }
    }

    //função para inserir dados "POST"
    public function insert(Produto $produto)
    {
        //conecxão com banco de dados
        $pdo = MySqlPDO::getInstance();

        //comando sql para inserir dados na tabela
        $sql = "INSERT INTO produtos (cliente_email, cliente_nome) VALUES (:email, :nome)";
        $stmt = $pdo->prepare($sql);

        //aqui estou dizendo que "':email', $produtos->getClienteEmail()" vai buscar um parametro 
        //que esta dentro da função get, e vai atribuir no codigo acima 
        $stmt->bindParam(":email", $produto->getClienteEmail());
        $stmt->bindParam(":nome", $produto->getClienteNome());

        //tratamento de exeção 
        try {
            if ($stmt->execute()) {
                MensagensUtil::sucesso("sucesso");
            } else {
                MensagensUtil::requisicaoComErro();
            }
        } catch (Throwable $th) {
            MensagensUtil::erroInterno($th->getMessage());
        }
    }

    //UPDATE produtos SET cliente_nome = :nome, cliente_email = :email WHERE id = :id
    //função para atualizar produtos "PUT"
    public function update(Produto $produto)
    {
        $pdo = MySqlPDO::getInstance();

        $comando_sql = [];

        if ($produto->getClienteNome() != null) {
            $comando_sql[] = "cliente_nome = :nome";
        }
        if ($produto->getClienteEmail() != null) {
            $comando_sql[] = "cliente_email = :email";
        }

        // Verifique se há algo para atualizar
        //if (empty($comando_sql)) {
        //    // Se não houver campos para atualizar, retorne um erro ou trate o caso
        //    return false;
        //}

        $sql = "UPDATE produtos SET " . implode(",", $comando_sql) . " WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        $paramId = $produto->getId();
        $paramNome = $produto->getClienteNome();
        $paramEmail = $produto->getClienteEmail();

        $stmt->bindParam(':id', $paramId);

        if ($produto->getClienteNome() != null) {
            $stmt->bindParam(':nome', $paramNome);
        }

        if ($produto->getClienteEmail() != null) {
            $stmt->bindParam(':email', $paramEmail);
        }

        try {
            $stmt->execute();
            return true;
        } catch (Throwable $th) {
            return false;
        }
    }

    //função para deletar seja lá oque voce quiser "DELETE"
    public function delete(Produto $produto)
    {
        $pdo = MySqlPDO::getInstance();
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $produto->getId());

        try {
            if ($stmt->execute()) {
                MensagensUtil::sucesso("sucesso");
            } else {
                MensagensUtil::requisicaoComErro();
            }
        } catch (Throwable $th) {
            MensagensUtil::erroInterno($th->getMessage());
        }
    }

    public function getById($id)
    {
    }
}

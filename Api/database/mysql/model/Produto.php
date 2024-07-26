<?php

namespace Api\database\mysql\model;

class Produto
{
    private $id;
    private $cliente_nome;
    private $cliente_email;

    public function toList()
    {
        return [
            "id" => $this->id,
            "cliente_nome" => utf8_encode($this->cliente_nome),
            "cliente_email" => utf8_encode($this->cliente_email),
        ];
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getClienteNome()
    {
        return $this->cliente_nome;
    }

    public function setClienteNome($cliente_nome)
    {
        $this->cliente_nome = $cliente_nome;
    }

    public function getClienteEmail()
    {
        return $this->cliente_email;
    }

    public function setClienteEmail($cliente_email)
    {
        $this->cliente_email = $cliente_email;
    }
}

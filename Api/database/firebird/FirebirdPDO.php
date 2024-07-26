<?php

namespace Api\database\firebird_database;

use Api\util\MensagensUtil;
use Api\config\Sessao;
use PDO;
use Throwable;

class FirebirdPDO
{
    private static $usuario = "SYSDBA";
    private static $senha = "aivilo7";

    // Instância singleton.
    public static $instance;

    public static function getInstance(): PDO
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO("firebird:host=localhost;dbname=" . Sessao::$banco . ";charset=UTF8", self::$usuario, self::$senha);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Throwable $throwable) {
                MensagensUtil::erroInterno($throwable->getMessage());
            }
        }
        return self::$instance;
    }

}

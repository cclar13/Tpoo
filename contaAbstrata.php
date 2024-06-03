<?php

abstract class Conta
{
    public $saldo;
    public $titular;

    function __construct($titular, $saldoInicial, $conn) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
        $this->conn = $conn;
    }

    public function getTitular()
    {
        return $this->titular;
    }
    public function getSaldo()
    {
        return $this->saldo;
    }

//    public function setTitular()
//    {
//        $this->titular;
//    }
//
//    public function setSaldo()
//    {
//        $this->saldo;
//    }
    abstract function depositarDinheiro($valor,$titular);

}


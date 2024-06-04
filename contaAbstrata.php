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

    abstract public function depositarDinheiro($valor,$titular);
    abstract public function verTitular();
    abstract public function addTitular($titular);


}


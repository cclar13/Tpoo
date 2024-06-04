<?php
include('contaAbstrata.php');
class ContaPoupanca extends Conta
{
    public function depositar($valor)
    {
        parent::depositar($valor); // Call the parent class's depositar method
    }

    public function resgatar($valor)
    {
        $this->sacar($valor); // You might want to add specific logic for resgatar
    }
}
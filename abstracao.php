<?php

abstract class Pessoa
{
    protected $nome;
    protected $idade;
    protected $sexo;

    public function getNome($n)
    {
        return $this->nome;
    }

    public function setNome($n)
    {
        $this->nome = $n;
    }

    abstract protected function Falar();

}

class  Clarisse extends Pessoa
{
    public function Falar()
    {
        echo "falou";
}
}

$clarisse = new Clarisse();
//$clarisse = setNome("clarisse");
//echo $clarisse->getNome();
$clarisse->Falar();
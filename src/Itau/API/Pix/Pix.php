<?php
namespace Itau\API\Pix;

use Itau\API\TraitEntity;

class Pix implements \JsonSerializable
{
    use TraitEntity;

    private string $chave;
    private string $txid;
    private Valor $valor;
    private Calendario $calendario;


    public function setChave($chave): self
    {
        $this->chave = $chave;
        return $this;
    }

    public function setTxid($txid): self
    {
        $this->txid = $txid;
        return $this;
    }
    
    public function getTxid(): string
    {
        return $this->txid;
    }

    public function valor(): Valor
    {
        $valor = new Valor();

        $this->setValor($valor);

        return $valor;
    }

    public function setValor(Valor $valor): self
    {
        $this->valor = $valor;
        return $this;
    }

    public function calendario(): Calendario
    {
        if(!isset($this->calendario)) {
            $calendario = new Calendario();

            $this->setCalendario($calendario);
        }

        return $this->calendario;
    }
    
    public function setCalendario(Calendario $calendario): self
    {
        $this->calendario = $calendario;
        return $this;
    }
    
    public function setDevedor(array $dados) {
        $devedor = new Devedor($dados);
        $this->devedor = $devedor;
    }
}
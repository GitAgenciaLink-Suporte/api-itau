<?php

namespace Itau\API\Pix;

use Itau\API\TraitEntity;

class Calendario implements \JsonSerializable
{
    use TraitEntity;

    private int $expiracao = 86400;
    private string $validadeAposVencimento = '';
    private string $dataDeVencimento = '';

    public function setExpiracao(string $expiracao): self
    {
        $this->expiracao = $expiracao;
        return $this;
    }
    
    public function setVencimento(string $vencimento, string $dias = '0'): self
    {
        $this->dataDeVencimento = $vencimento;
        $this->validadeAposVencimento = $dias;
        unset($this->expiracao);
        return $this;
    }
    
    public function hasVencimento() {
        return $this->dataDeVencimento != '';
    }
}
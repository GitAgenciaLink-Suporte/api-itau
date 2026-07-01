<?php

namespace Itau\API\Pix;

use Itau\API\TraitEntity;

class Calendario implements \JsonSerializable
{
    use TraitEntity;

    private int $expiracao = 86400;

    public function setExpiracao(string $expiracao): self
    {
        $this->expiracao = $expiracao;
        return $this;
    }
}
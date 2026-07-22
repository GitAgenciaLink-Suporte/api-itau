<?php

namespace Itau\API\Pix;

use Itau\API\TraitEntity;

class Devedor implements \JsonSerializable
{
    use TraitEntity;

    private string $email       = '';
    private string $logradouro  = '';
    private string $cidade      = '';
    private string $uf          = '';
    private string $cep         = '';
    private string $cpf         = '';
    private string $cnpj        = '';
    private string $nome        = '';

    public function __construct(array $dados)
    {
        $this->email      = $dados['email'];
        $this->logradouro = $dados['logradouro'];
        $this->cidade     = $dados['cidade'];
        $this->uf         = $dados['uf'];
        $this->cep        = preg_replace('/[^0-9]/', '', $dados['cep']);
        $this->nome       = $dados['nome'];
        
        if($dados['tipo_documento'] == 'cpf') {
            $this->cpf = preg_replace('/[^0-9]/', '', $dados['documento']);
            unset($this->cnpj);
        } else {
            $this->cnpj = preg_replace('/[^a-zA-Z0-9]/', '', $dados['documento']);
            unset($this->cpf);
        }
    }
}
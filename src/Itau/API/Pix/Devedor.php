<?php

namespace Itau\API\Pix;

use Itau\API\TraitEntity;

class Devedor implements \JsonSerializable
{
    use TraitEntity;

    private string $nome        = '';
    private string $cpf         = '';
    private string $cnpj        = '';
    private string $email       = '';
    private string $logradouro  = '';
    private string $cidade      = '';
    private string $uf          = '';
    private string $cep         = '';

    public function __construct(array $dados)
    {
        //apenas nome e cpf/cnpj são obrigatórios
        $this->nome = $dados['nome'];
        if($dados['tipo_documento'] == 'cpf') {
            $this->cpf = preg_replace('/[^0-9]/', '', $dados['documento']);
        } else {
            $this->cnpj = preg_replace('/[^a-zA-Z0-9]/', '', $dados['documento']);
        }
        
        $this->email      = $dados['email'] ?? '';
        $this->logradouro = $dados['logradouro'] ?? '';
        $this->cidade     = $dados['cidade'] ?? '';
        $this->uf         = $dados['uf'] ?? '';
        $this->cep        = $dados['cep'] ?? '';
        
        //remover atributos vazios
        foreach ($this as $key => $value) {
            if($value == '') {
                unset($this->$key);
            }
        }
    }
}
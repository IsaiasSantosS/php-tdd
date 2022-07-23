<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    public function testSeONomeDoProdutoESetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setNome('Produto 1');

        $this->assertEquals('Produto 1', $produto->getNome(), 'Nomes não são iguais');
    }

    public function testSeOPrecoDoProdutoESetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setPreco('1354.04');

        $this->assertEquals('1354.04', $produto->getPreco(), 'Preços não são iguais');
    }

    public function testSeOSlugDoProdutoESetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setSlug('produto-1');

        $this->assertEquals('produto-1', $produto->getSlug(), 'Slugs não são iguais');
    }
}

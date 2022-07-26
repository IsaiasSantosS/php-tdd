<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{

    private $carrinho;
    private $produto;

    /*
    * Executar antes de cada teste
    */
    public function setUp()
    {
        $this->carrinho = new Carrinho;
        $this->produto = new Produto;
    }

    /*
    * Executar depois de cada teste
    */
    public function tearDown()
    {
        unset($this->carrinho);
        unset($this->produto);
    }

    /*
    * Executar uma vez antes dos testes
    */
    public static function setUpBeforeClass()
    {
        
    }

    /*
    * Executar uma vez despois dos testes
    */
    public static function tearDownAfterClass()
    {
        
    }

    /*
    * Pré condição para executar os teste
    */
    protected function assertPreConditions()
    {
        $classe = class_exists('\\Code\\Carrinho');
        $this->assertTrue($classe);
    }

    /*
    * Pos condição para executar os teste
    */
    protected function assertPosConditions()
    {

    }

    public function testAdicionarProdutosNoCarrinho()
    {
        $produtoUm = $this->produto;
        $produtoUm->setNome('Teste 1');
        $produtoUm->setPreco(19.5);
        $produtoUm->setSlug('produto-1');

        $produtoDois = clone $this->produto;
        $produtoDois->setNome('Teste 2');
        $produtoDois->setPreco(10.5);
        $produtoDois->setSlug('produto-2');

        $carrinho = $this->carrinho;

        $carrinho->addProduto($produtoUm);
        $carrinho->addProduto($produtoDois);

        $this->assertIsArray($carrinho->getProdutos());
        $this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[0]);
        $this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[1]);
    }

    public function testSeValoresDoProdutoDoCarrinhoConformePassado()
    {
        // $produtoUm = $this->produto;
        // $produtoUm->setNome('Teste 1');
        // $produtoUm->setPreco(19.5);
        // $produtoUm->setSlug('produto-1');
        
        //Criando um stub
        $produtoStub = $this->getStubProduto();

        $carrinho = $this->carrinho;

        $carrinho->addProduto($produtoStub);

        $this->assertEquals('Teste 1', $carrinho->getProdutos()[0]->getNome());
        $this->assertEquals(19.5, $carrinho->getProdutos()[0]->getPreco());
        $this->assertEquals('produto-1', $carrinho->getProdutos()[0]->getSlug());
    }

    public function testQuantidadeDeProdutosEValorTotalDoCarrinho()
    {
        $produtoUm = $this->produto;
        $produtoUm->setNome('Teste 1');
        $produtoUm->setPreco(19.5);
        $produtoUm->setSlug('produto-1');

        $produtoDois = clone $this->produto;
        $produtoDois->setNome('Teste 2');
        $produtoDois->setPreco(10);
        $produtoDois->setSlug('produto-2');

        $carrinho = $this->carrinho;

        $carrinho->addProduto($produtoUm);
        $carrinho->addProduto($produtoDois);
        
        $this->assertEquals(2 , $carrinho->getQuantidadeProdutos());
        $this->assertEquals(29.5 , $carrinho->getValorTotalProdutos());
    }

    public function testSeLogESalvoQuandoInformadoParaAAdicaoDeProduto()
    {
        $carrinho = new Carrinho();

        $logMock = $this->getMockBuilder(Log::class)
        ->setMethods(['log'])
        ->getMock();

        $logMock->expects($this->once())
        ->method('log')
        ->with($this->equalTo('Adicionando produto no carrinho'));

        $carrinho->addProduto($this->getStubProduto(), $logMock);

    }

    private function getStubProduto(){
        $produtoStub = $this->createMock(Produto::class);
        $produtoStub->method('getNome')->willReturn('Teste 1');
        $produtoStub->method('getPreco')->willReturn(19.5);
        $produtoStub->method('getSlug')->willReturn('produto-1');
        return $produtoStub;
    }
}
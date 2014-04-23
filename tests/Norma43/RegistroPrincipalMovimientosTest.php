<?php

namespace Test\Norma43;

use Norma43\Registro;
use Norma43\RegistroPrincipalMovimientos;

class RegistroPrincipalMovimientosTest extends \PHPUnit_Framework_TestCase
{
    private $registro;

    public function setUp()
    {
        $this->registro = new RegistroPrincipalMovimientos('22    0569140410140410030381000000000310280000000000000000000000B-97895437      ');
    }
    
    public function testParseCodigoRegistroIsCorrect()
    {        
        $this->assertEquals(Registro::REGISTRO_PRINCIPAL_MOVIMIENTOS, $this->registro->getCodigoRegistro());
    }

    public function testParseCodigoOficinaOrigenIsCorrect()
    {        
        $this->assertEquals('0569', $this->registro->getCodigoOficinaOrigen());
    }

    public function testFechaOperacionIsDatetime()
    {        
        $this->assertInstanceOf('DateTime', $this->registro->getFechaOperacion());
    }

    public function testParseFechaOperacionIsCorrect()
    {        
        $this->assertEquals('10/04/2014', $this->registro->getFechaOperacion()->format('d/m/Y'));
    }

    public function testFechaValorIsDatetime()
    {        
        $this->assertInstanceOf('DateTime', $this->registro->getFechaValor());
    }

    public function testParseFechaValorIsCorrect()
    {        
        $this->assertEquals('10/04/2014', $this->registro->getFechaValor()->format('d/m/Y'));
    }

    public function testParseConceptoComunIsCorrect()
    {
        $this->assertEquals('03', $this->registro->getConceptoComun());
    }

    public function testParseConceptoPropioIsCorrect()
    {
        $this->assertEquals('038', $this->registro->getConceptoPropio());
    }

    public function testParseTipoOperacionIsCorrect()
    {
        $this->assertTrue($this->registro->esTipoDebe());
        $this->assertFalse($this->registro->esTipoHaber());
    }

    public function testParseImporteIsCorrect()
    {
        $this->assertEquals(310.28, $this->registro->getImporte());
    }


    public function testParseNumeroDocumentoIsCorrect()
    {
        $this->assertEquals('0000000000', $this->registro->getNumeroDocumento());
    }

    public function testParseReferencia1IsCorrect()
    {
        $this->assertEquals('000000000000', $this->registro->getReferencia1());
    }

    public function testParseReferencia2IsCorrect()
    {
        $this->assertEquals('B-97895437', $this->registro->getReferencia2());
    }

    public function testGetReferenciasReturnArrayContainingReference1AndReference2()
    {
        $this->assertEquals(2, count($this->registro->getReferencias()));
        $this->assertContains('000000000000', $this->registro->getReferencias());
        $this->assertContains('B-97895437', $this->registro->getReferencias());
    }
}
<?php

namespace Test\Norma43;

use Norma43\Registro;
use Norma43\RegistroComplementarioConcepto;

class RegistroComplementarioConceptoTest extends \PHPUnit_Framework_TestCase
{
    private $registro;

    public function setUp()
    {
        $this->registro = new RegistroComplementarioConcepto('230148411250E000                          JOSE MIGUEL LUQUE                     ');
    }
    
    public function testParseCodigoRegistroIsCorrect()
    {        
        $this->assertEquals(Registro::REGISTRO_COMPLEMENTARIO_CONCEPTO, $this->registro->getCodigoRegistro());
    }

    public function testParseCodigoDatoIsCorrect()
    {        
        $this->assertEquals('01', $this->registro->getCodigoDato());
    }

    public function testParseConcepto1IsCorrect()
    {        
        $this->assertEquals('48411250E000', $this->registro->getConcepto1());
    }

    public function testParseConcepto2IsCorrect()
    {        
        $this->assertEquals('JOSE MIGUEL LUQUE', $this->registro->getConcepto2());
    }

    public function testGetConcpetosReturnArrayContainingConcepto1AndConcepto2()
    {
        $this->assertEquals(2, count($this->registro->getConceptos()));
        $this->assertContains('48411250E000', $this->registro->getConceptos());
        $this->assertContains('JOSE MIGUEL LUQUE', $this->registro->getConceptos());
    }
}
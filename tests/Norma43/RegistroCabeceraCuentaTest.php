<?php

namespace Test\Norma43;

use Norma43\RegistroCabeceraCuenta;
use Norma43\CodigoDivisa;

class RegistroCabeceraCuentaTest extends \PHPUnit_Framework_TestCase
{
    private $cabecera;

    public function setUp()
    {
        $this->cabecera = new RegistroCabeceraCuenta('112100485622000528321404101404132000000023224929783SURVEY & MARINE AUDITS, S.   ');
    }
    
    public function testParseCodigoRegistroIsCorrect()
    {        
        $this->assertEquals('11', $this->cabecera->getCodigoRegistro());
    }

    public function testParseCodigoEntidadIsCorrect()
    {        
        $this->assertEquals('2100', $this->cabecera->getCodigoEntidad());
    }

    public function testParseCodigoOficinaIsCorrect()
    {        
        $this->assertEquals('4856', $this->cabecera->getCodigoOficina());
    }

    public function testParseNumeroCuentaIsCorrect()
    {        
        $this->assertEquals('2200052832', $this->cabecera->getNumeroCuenta());
    }

    public function testFechaInicialIsDatetime()
    {        
        $this->assertInstanceOf('DateTime', $this->cabecera->getFechaInicial());
    }

    public function testParseFechaInicialIsCorrect()
    {        
        $this->assertEquals('10/04/2014', $this->cabecera->getFechaInicial()->format('d/m/Y'));
    }

    public function testFechaFinalIsDatetime()
    {        
        $this->assertInstanceOf('DateTime', $this->cabecera->getFechaFinal());
    }

    public function testParseFechaFinalIsCorrect()
    {        
        $this->assertEquals('13/04/2014', $this->cabecera->getFechaFinal()->format('d/m/Y'));
    }

    public function testParseTipoOperacionIsCorrect()
    {
        $this->assertFalse($this->cabecera->esTipoDebe());
        $this->assertTrue($this->cabecera->esTipoHaber());
    }

    public function testParseImporteSaldoInicialIsCorrect()
    {
        $this->assertEquals(23224.92, $this->cabecera->getImporteSaldoInicial());
    }

    public function testParseCodigoDivisaIsCorrect()
    {
        $this->assertEquals(CodigoDivisa::EURO, $this->cabecera->getCodigoDivisa());
    }

    public function testParseModalidadInformacionIsCorrect()
    {
        $this->assertEquals(3, $this->cabecera->getModalidadInformacion());
    }

    public function testParseNombreAbreviadoIsCorrect()
    {
        $this->assertEquals('SURVEY & MARINE AUDITS, S.', $this->cabecera->getNombreAbreviado());
    }
}
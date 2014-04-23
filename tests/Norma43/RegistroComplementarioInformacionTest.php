<?php

namespace Test\Norma43;

use Norma43\Registro;
use Norma43\RegistroComplementarioInformacion;
use Norma43\CodigoDivisa;

class RegistroComplementarioInformacionTest extends \PHPUnit_Framework_TestCase
{
    private $registro;

    public function setUp()
    {
        $this->registro = new RegistroComplementarioInformacion('240197800000000001125                                                            ');
    }
    
    public function testParseCodigoRegistroIsCorrect()
    {        
        $this->assertEquals(Registro::REGISTRO_COMPLEMENTARIO_INFORMACION, $this->registro->getCodigoRegistro());
    }

    public function testParseCodigoDatoIsCorrect()
    {        
        $this->assertEquals('01', $this->registro->getCodigoDato());
    }

    public function testParseCodigoDivisaOrigenIsCorrect()
    {        
        $this->assertEquals(CodigoDivisa::EURO, $this->registro->getCodigoDivisaOrigen());
    }

    public function testParseImporteIsCorrect()
    {        
        $this->assertEquals(11.25, $this->registro->getImporte());
    }
}
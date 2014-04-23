<?php

namespace Norma43;

use Norma43\Registro;

class RegistroComplementarioConcepto extends Registro
{
    /**
     * Código de dato
     * @var string $codigoDato
     */
    private $codigoDato;

    /**
     * Concepto1
     * @var string $concepto1
     */
    private $concepto1;

    /**
     * Concepto2
     * @var string $concepto2
     */
    private $concepto2;

    public function __construct($linea)
    {
        $this->setCodigoRegistro(Registro::REGISTRO_COMPLEMENTARIO_CONCEPTO);
        $this->setCodigoDato(substr($linea, 2, 2));
        $this->setConcepto1(substr($linea, 4, 38));
        $this->setConcepto2(substr($linea, 42, 38));
    }

    public function setCodigoDato($codigoDato)
    {
        $this->codigoDato = $codigoDato;

        return $this;
    }

    public function getCodigoDato()
    {
        return $this->codigoDato;
    }

    public function setConcepto1($concepto)
    {
        $this->concepto1 = trim($concepto);

        return $this;
    }

    public function getConcepto1()
    {
        return $this->concepto1;
    }

    public function setConcepto2($concepto)
    {
        $this->concepto2 = trim($concepto);

        return $this;
    }

    public function getConcepto2()
    {
        return $this->concepto2;
    }

    public function getConceptos()
    {
        return array(
            $this->getConcepto1(), 
            $this->getConcepto2()
        );
    }
}
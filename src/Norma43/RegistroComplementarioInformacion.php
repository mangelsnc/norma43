<?php

namespace Norma43;

use Norma43\Registro;

class RegistroComplementarioInformacion extends Registro
{
    /**
     * Código de dato
     * @var string
     */
    private $codigoDato;

    /**
     * Codigo de divisa origen
     * @var string
     */
    private $codigoDivisaOrigen;

    /**
     * Importe
     * @var double
     */
    private $importe;

    public function __construct($linea)
    {
        $this->setCodigoRegistro(Registro::REGISTRO_COMPLEMENTARIO_INFORMACION);
        $this->setCodigoDato(substr($linea, 2, 2));
        $this->setCodigoDivisaOrigen(substr($linea, 4, 3));
        $importe = $this->parseImporte(substr($linea, 7, 14));
        $this->setImporte($importe);

        return $this;
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

    public function setCodigoDivisaOrigen($codigoDivisaOrigen)
    {
        $this->codigoDivisaOrigen = $codigoDivisaOrigen;

        return $this;
    }

    public function getCodigoDivisaOrigen()
    {
        return $this->codigoDivisaOrigen;
    }

    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    public function getImporte()
    {
        return $this->importe;
    }
}
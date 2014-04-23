<?php

namespace Norma43;

use Norma43\Registro;

class RegistroPrincipalMovimientos extends Registro
{
    /**
     * Código de oficina de origen
     * @var string $codigoOficinaOrigen
     */
    private $codigoOficinaOrigen;

    /**
     * Fecha de operación
     * @var DateTime $fechaOperacion
     */
    private $fechaOperacion;

    /**
     * Fecha de valor
     * @var DateTime $fechaValor
     */
    private $fechaValor;

    /**
     * Concepto común
     * @var string $conceptoComun
     */
    private $conceptoComun;

    /**
     * Concepto Propio
     * @var string $conceptoPropio
     */
    private $coneceptoPropio;

    /**
     * Clave Debe o Haber
     * @var int $tipo
     */
    private $tipo;

    /**
     * Importe
     * @var double $importe
     */
    private $importe;

    /**
     * Número de documento
     * @var string $numDocumento;
     */
    private $numDocumento;

    /**
     * Referencia 1
     * @var string $referencia1
     */
    private $referencia1;

    /**
     * Referencia 2
     * @var string $referencia1
     */
    private $referencia2;

    public function __construct($linea)
    {
        $this->setCodigoRegistro(Registro::REGISTRO_PRINCIPAL_MOVIMIENTOS);
        $this->setCodigoOficinaOrigen(substr($linea, 6, 4));
        
        $fechaString = substr($linea, 10, 6);
        $this->setFechaOperacion(new \DateTime($this->parseDate($fechaString)));

        $fechaString = substr($linea, 16, 6);
        $this->setFechaValor(new \DateTime($this->parseDate($fechaString)));

        $this->setConceptoComun(substr($linea, 22, 2));
        $this->setConceptoPropio(substr($linea, 24, 3));
        $this->setTipoOperacion(substr($linea, 27, 1));

        $importe = $this->parseImporte(substr($linea, 28, 14));
        $this->setImporte($importe);

        $this->setNumeroDocumento(substr($linea, 42, 10));
        $this->setReferencia1(substr($linea, 52, 12));
        $this->setReferencia2(substr($linea, 64, 16));

        return $this;
    }

    /**
     * Set $codigoOficinaOrigen
     * @param string $codigoOficinaOrigen
     */
    public function setCodigoOficinaOrigen($codigoOficinaOrigen)
    {
        $this->codigoOficinaOrigen = $codigoOficinaOrigen;

        return  $this;
    }

    /**
     * Get $codigoOficinaOrigen
     * @return string
     */
    public function getCodigoOficinaOrigen()
    {
        return $this->codigoOficinaOrigen;
    }

    public function setFechaOperacion(\DateTime $fechaOperacion)
    {
        $this->fechaOperacion = $fechaOperacion;

        return $this;
    }

    public function getFechaOperacion()
    {
        return $this->fechaOperacion;
    }

    public function setFechaValor(\DateTime $fechaValor)
    {
        $this->fechaValor = $fechaValor;

        return $this;
    }

    public function getFechaValor()
    {
        return $this->fechaValor;
    }

    public function setConceptoComun($conceptoComun)
    {
        $this->conceptoComun = $conceptoComun;

        return $this;
    }

    public function getConceptoComun()
    {
        return $this->conceptoComun;
    }

    public function setConceptoPropio($conceptoPropio)
    {
        $this->conceptoPropio = $conceptoPropio;

        return $this;
    }

    public function getConceptoPropio()
    {
        return $this->conceptoPropio;
    }

    public function setTipoOperacion($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getTipoOperacion()
    {
        return $this->tipo;
    }

    public function esTipoDebe()
    {
        return $this->tipo == Registro::TIPO_OPERACION_DEBE;
    }

    public function esTipoHaber()
    {
        return $this->tipo == Registro::TIPO_OPERACION_HABER;
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

    public function setNumeroDocumento($numDocumento)
    {
        $this->numDocumento = $numDocumento;

        return $this;
    }

    public function getNumeroDocumento()
    {
        return $this->numDocumento;
    }

    public function setReferencia1($referencia)
    {
        $this->referencia1 = trim($referencia);

        return $this;
    }

    public function getReferencia1()
    {
        return $this->referencia1;
    }

    public function setReferencia2($referencia)
    {
        $this->referencia2 = trim($referencia);

        return $this;
    }

    public function getReferencia2()
    {
        return $this->referencia2;
    }

    public function getReferencias()
    {
        return array(
            $this->getReferencia1(), 
            $this->getReferencia2()
        );
    }
}
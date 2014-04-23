<?php

namespace Norma43;

use Norma43\Registro;

class RegistroCabeceraCuenta extends Registro
{
    /**
     * Código de Entidad
     * @var string
     */
    private $codigoEntidad;

    /**
     * Código de Oficina
     * @var string
     */
    private $codigoOficina;

    /**
     * Numero de cuenta
     * @var string
     */
    private $numCuenta;

    /**
     * Fecha inicial
     * @var DateTime
     */
    private $fechaInicial;

    /**
     * Fecha Final
     * @var DateTime
     */
    private $fechaFinal;

    /**
     * Tipo de operacion
     * @var string
     */
    private $tipo;

    /**
     * Importe saldo inicial
     * @var string
     */
    private $importeSaldoInicial;

    /**
     * Codigo de divisa
     * @var string
     */
    private $codigoDivisa;

    /**
     * Modalidad de Informacion
     * @var string
     */
    private $modalidadInformacion;

    /**
     * Nombre abreviado
     * @var string
     */
    private $nombreAbreviado;

    public function __construct($linea)
    {
        $this->setCodigoRegistro(Registro::REGISTRO_CABECERA_CUENTA);
        $this->setCodigoEntidad(substr($linea, 2, 4));
        $this->setCodigoOficina(substr($linea, 6, 4));
        $this->setNumeroCuenta(substr($linea, 10, 10));
        
        $fechaString = substr($linea, 20, 6);        
        $this->setFechaInicial(new \DateTime($this->parseDate($fechaString)));
        
        $fechaString = substr($linea, 26, 6);
        $this->setFechaFinal(new \DateTime($this->parseDate($fechaString)));
        
        $this->setTipoOperacion(substr($linea, 32, 1));

        $importe = $this->parseImporte(substr($linea, 33, 14));
        $this->setImporteSaldoInicial($importe);
        
        $this->setCodigoDivisa(substr($linea, 47, 3));
        $this->setModalidadInformacion(substr($linea, 50, 1));
        $this->setNombreAbreviado(substr($linea, 51, 26));

        return $this;
    }

    public function setCodigoEntidad($codigoEntidad)
    {
        $this->codigoEntidad = $codigoEntidad;

        return $this;
    }

    public function getCodigoEntidad()
    {
        return $this->codigoEntidad;
    }

    public function setCodigoOficina($codigoOficina)
    {
        $this->codigoOficina = $codigoOficina;

        return $this;
    }

    public function getCodigoOficina()
    {
        return $this->codigoOficina;
    }

    public function setNumeroCuenta($numCuenta)
    {
        $this->numCuenta = $numCuenta;

        return $this;
    }

    public function getNumeroCuenta()
    {
        return $this->numCuenta;
    }

    public function setFechaInicial(\DateTime $fechaInicial)
    {
        $this->fechaInicial = $fechaInicial;

        return $this;
    }

    public function getFechaInicial()
    {
        return $this->fechaInicial;
    }

    public function setFechaFinal(\DateTime $fechaFinal)
    {
        $this->fechaFinal = $fechaFinal;

        return $this;
    }

    public function getFechaFinal()
    {
        return $this->fechaFinal;
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

    public function setImporteSaldoInicial($importeSaldoInicial)
    {
        $this->importeSaldoInicial = $importeSaldoInicial;

        return $this;
    }

    public function getImporteSaldoInicial()
    {
        return $this->importeSaldoInicial;
    }

    public function setCodigoDivisa($codigoDivisa)
    {
        $this->codigoDivisa = $codigoDivisa;

        return $this;
    }

    public function getCodigoDivisa()
    {
        return $this->codigoDivisa;
    }

    public function setModalidadInformacion($modalidadInformacion)
    {
        $this->modalidadInformacion = $modalidadInformacion;

        return $this;
    }

    public function getModalidadInformacion()
    {
        return $this->modalidadInformacion;
    }

    public function setNombreAbreviado($nombreAbreviado)
    {
        $this->nombreAbreviado = trim($nombreAbreviado);

        return $this;
    }

    public function getNombreAbreviado()
    {
        return $this->nombreAbreviado;
    }
}
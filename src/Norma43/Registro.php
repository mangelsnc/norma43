<?php

namespace Norma43;

class Registro
{
    const REGISTRO_CABECERA_CUENTA = 11;
    const REGISTRO_PRINCIPAL_MOVIMIENTOS = 22;
    const REGISTRO_COMPLEMENTARIO_CONCEPTO = 23;
    const REGISTRO_COMPLEMENTARIO_INFORMACION = 24;
    const REGISTRO_FINAL_CUENTA = 33;
    const REGISTRO_FIN_FICHERO = 88;

    const TIPO_OPERACION_DEBE = 1;
    const TIPO_OPERACION_HABER = 2;

    /**
     * Código de registro
     * @var string $codigoRegistro
     */
    private $codigoRegistro;

    public function setCodigoRegistro($codigoRegistro)
    {
        $this->codigoRegistro = $codigoRegistro;

        return $this;
    }

    public function getCodigoRegistro()
    {
        return $this->codigoRegistro;
    }

    protected function parseDate($fechaString)
    {
        $anyo = substr($fechaString, 0, 2);
        $mes = substr($fechaString, 2, 2);
        $dia = substr($fechaString, 4, 2);

        return $anyo . '-' . $mes . '-' . $dia;
    }

    protected function parseImporte($importe)
    {
        return intval($importe)/100;
    }
}
<?php
require_once 'Cuenta.php';

/**
* Representa una Caja de Ahorro.
* 
* Tope de extracción fijado en un cierto monto.
* No permite descubierto (saldo negativo).
*
 */

class CajaAhorro extends Cuenta
{
    /**
     * @var int $topeExtraccion Máximo importe permitido en cada extracción.
     */
    protected $topeExtraccion;

    /**
     * Constructor
     * @params int $numero
     * @params string $titular
     * @params int $saldo
     * @params int $tope 
     */
    public function __construct($numero, $titular, $saldo, $tope = 2000, $transacciones)
    {
        parent::__construct($numero, $titular, $saldo, $transacciones);
        $this->topeExtraccion = $tope;
    }

    /**
     * Permite realizar una extracción, disminuyendo el saldo de la cuenta
     *
     * Verifica además que el monto no supere al saldo ni al tope de extracción
     * @param int $monto El monto a extraer
     * @return string Mensaje que especifica el resultado de la operación.
     * 
     */
    public function extraer($monto) {
        if ($monto > $this->topeExtraccion) {
            return "Tope de extracción excedido";
        }
        else if ( $monto > $this->saldo ) {
            return "Saldo insuficiente";
        }
        else {
            return parent::extraer($monto);
        }
    }

}












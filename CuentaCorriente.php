<?php
require_once 'Cuenta.php';

/**
* Representa una Cuenta Corriente
* 
* Tope de extracción sin límite
* Permite descubierto (saldo negativo) hasta un cierto límite.
*
 */

class CuentaCorriente extends Cuenta
{
    /**
     * @var int $topeDescubierto Máximo saldo negativo
     */
    protected $topeDescubierto;

    /**
     * Constructor
     * @params int $numero
     * @params string $titular
     * @params int $saldo
     * @params int $tope 
     */
    public function __construct($numero, $titular, $saldo, $transacciones, $tope = 2000)
    {
        parent::__construct($numero, $titular, $saldo, $transacciones);
        $this->topeDescubierto = $tope;
    }

    /**
     * Permite realizar una extracción, disminuyendo el saldo de la cuenta
     *
     * Verifica además que el monto no deje a la cuenta con un saldo por debajo
     * del tope de descubierto.
     *
     * @param int $monto El monto a extraer
     * @return string Mensaje que especifica el resultado de la operación.
     * 
     */
    public function extraer($monto)
    {
        if ( $monto > $this->saldo + $this->topeDescubierto)
        {
            return "Tope de descubierto excedido";
        }
        else
        {
            return parent::extraer($monto);
        }
    }
}
?>
<?php

abstract class Cuenta
{
    /**
     * @var int $numero Número de cuenta.
     */
    protected $numero;
    /**
     * @var int $saldo Saldo de la cuenta
     */
    protected $saldo;
    /**
     * @var string $titular Nombre de la persona titular de la cuenta
     */
    protected $titular;

    /**
     * Constructor
     * @params int $numero
     * @params string $titular
     * @params int $saldo
     */
    public function __construct($numero, $titular, $saldo)
    {
        $this->numero = $numero;
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    
    /**
     * Permite realizar un depósito, incrementando el saldo de la cuenta
     *
     * @param int $monto El monto a depositar
     * @return string Mensaje que especifica el resultado de la operación.
     */
    public function depositar($monto)
    {
        $this->saldo += $monto;
        return "El depósito se realizó correctamente.";
    }

    /**
     * Permite realizar una extracción, disminuyendo el saldo de la cuenta
     *
     * @param int $monto El monto a extraer
     * @return string Mensaje que especifica el resultado de la operación.
     * 
     */
    public function extraer($monto) {
        $this->saldo -= $monto;
        return "Extracción realizada correctamente.";
    }

    /**
     * Permite obtener el saldo.
     *
     * @return int El saldo de la cuenta.
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    public function registrarMovimiento($m, $op){
        switch($op){
            case "e":
                array_push($this->movimientos, -1 * abs($m));
                break;
            case "d":
                array_push($this->movimientos, $m);
                break;
        }

    }

}

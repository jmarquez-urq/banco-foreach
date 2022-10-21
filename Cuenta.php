<?php

abstract class Cuenta
{
    /*
     * @var int $numero Número de cuenta.
     */
    protected $numero;
    /*
     * @var int $saldo Saldo de la cuenta
     */
    protected $saldo;
    /*
     * @var string $titular Nombre de la persona titular de la cuenta
     */
    protected $titular;

    protected $transaccion = [];


    /*
     * Constructor
     * @param string $titular
     * @param int $saldo
     * @param int $numero
     */
    public function __construct($numero, $titular, $saldo)
    {
     
        $this->numero = $numero;
        $this->titular = $titular;
        $this->saldo = $saldo;

        $this->transaccion=["+ ".$this->saldo.", "];

    }

    
    /*
     * Permite realizar un depósito, incrementando el saldo de la cuenta
     *
     * @params int $monto El monto a depositar
     * @return string Mensaje que especifica el resultado de la operación.
     */
    public function depositar($monto)
    {
        $this->saldo += $monto;

        array_push($this->transaccion,"+".$monto.", ");

        return "El depósito se realizó correctamente.";
    }

    /*
     * Permite realizar una extracción, disminuyendo el saldo de la cuenta
     *
     * @params int $monto El monto a extraer
     * @return string Mensaje que especifica el resultado de la operación.
     * 
     */
    public function extraer($monto) {
        $this->saldo -= $monto;

        array_push($this->transaccion,"-".$monto.", ");

        return "Extracción realizada correctamente.";
    }

    /*
     * Permite obtener el saldo.
     *
     * @return int El saldo de la cuenta.
     */
    public function getSaldo()
    {
        return $this->saldo;
    }



    public function movimientos(){
        echo ('ULTIMOS MOVIMIENTOS'."<br>");
        foreach ($this->transaccion as $i) {            
            echo ($i)."<br>";            
        }
    }

}

<?php
require_once 'Cuenta.php';


Class CajaAhorroEspecial extends CajaAhorro {

	protected $minimoDeposito;

	public function __construct($numero, $titular, $saldo, $tope = 1000){

		parent::__construct($numero, $titular, $saldo);
		$this->minimoDeposito = $tope;
	}

	public function depositar($monto) {

		if ($monto<$this->minimoDeposito) {

			return "El monto minimo a depositar debe ser mayor a ".$this->minimoDeposito;
		}
		else {
			return parent::depositar($monto);
		}
	}
}
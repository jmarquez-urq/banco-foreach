<?php

/*
SE DEFINE LA ZONA HORARIA LOCAL
*/
    date_default_timezone_set('America/Argentina/Buenos_Aires');
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
    /*
SE CREA $MOVIM QUE ALMACENARÁ LOS MOVIMIENTOS
*/
    protected $movim = array();
/*
/*
SE CREA $SHOW QUE MOSTRARA LOS MOVIMIENTOS EN TEXTO
*/
        protected $show;


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
        /*
A $MOVIM SE LE ASIGNA POR DEFECTO EL MONTO Y LA FECHA CON LA QUE FUÉ CREADA LA CUENTA.
*/
        $this->movim = [ date('d-m-Y h:i:s a', time())." --------------- "."%2b".$saldo];
/*
A $SHOW SE INICIALIZA COMO STRING VACIO
*/
        $this->show = "";
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
        $this->saldo += $monto;
        /*
        SE VA LLENANDO EL ARRAY $MOVIM CON CADA MOVIMIENTO DE PLATA.
        SE USA CON ARRAY_UNSHIFT PARA QUE SE ALMACENE DE ADELANTE HACIA ATRAS, PARA QUE MUESTRE
        EL ULTIMO MOVIMIENTO PRIMERO EN LA LISTA.
        CADA ELEMENTO DEL ARRAY TIENE UNA CONCATENACION DE FECHA, HORA, LOS PUNTITOS PARA SEPARAR Y
        EL MONTO QUE SE DEPOSITÓ. ASI SE MUESTRA EN LA PANTALLA.
        EL SPAN ES PARA AGREGARLE UN POCO DE ESTILO Y NO SE VEA TODO NEGRO.
        */
        array_unshift($this->movim,"<span style='color:green;'>". date('d-m-Y h:i:s a', time())." ................. ". '%2b'.$monto."</span>");
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
 /*
LO MISMO QUE EL ARRAY UNSHIFT ANTERIOR PERO CON EXTRACCION.
*/
    array_unshift($this->movim,"<span style='color:red;'>". date('d-m-Y h:i:s a', time())." ................. ". ' -'.$monto."</span>");
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
    
/*
SE CREA ESTA FUNCION QUE LE ASIGNA A $SHOW LOS MOVIENTOS DE $MOVIM.
LOS CONCATENA Y LOS MANDA COMO STRING A LA PAG PRINCIPAL PARA QUE SE MUESTRE EN PANTALLA.
*/
public function mostrarUltim(){

    $this->show= "";

    foreach ($this->movim as $value) {
             
        $this->show.="$value<br>";
    }
    
    return $this->show;
}

}

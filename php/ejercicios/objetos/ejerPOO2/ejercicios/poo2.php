<?php
/*
Confeccionar una clase Empleado, definir como atributos su nombre y sueldo.
Definir un método inicializar que lleguen como dato el nombre y sueldo. 
Plantear un segundo método que imprima el nombre y un mensaje si debe o no pagar impuestos (si el sueldo supera a 3000 paga impuestos)
*/
declare(strict_types=1);
class Empleado{
    public string $nombre;
    public float $sueldo;

    function __construct(string $nombre, float $sueldo)
    {
        $this->nombre=$nombre;
        $this->sueldo=$sueldo;
    }

    function pagarImpuestos(){
        if($this->sueldo>3000){
            echo $this->nombre.' paga impuestos';
        }else{
            echo $this->nombre.' no paga impuestos';
        }
    }
}

$empleado = new Empleado('Ángel', 3001);
$empleado->pagarImpuestos();
echo '<br>';
$empleado2 = new Empleado('Hugo', 301);
$empleado2->pagarImpuestos();

?>
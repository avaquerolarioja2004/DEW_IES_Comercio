<?php
declare(strict_types=1);
/*
Confeccionar una clase CabeceraPagina que permita mostrar un título, 
indicarle si queremos que aparezca centrado, a derecha o izquierda, 
además permitir definir el color de fondo y de la fuente
*/

class CabeceraPagina{
    //texto
    private string $texto;
    //pos
    private string $pos;
    //fondo
    private int $r=0;
    private int $g=0;
    private int $b=0;
    //fuente
    private int $r2=0;
    private int $g2=0;
    private int $b2=0;

    public function __construct($texto)
    {
        $this->texto=$texto;
    }


    public function getTexto():string{
        return $this->texto;
    }

    public function setPos(string $pos){
        $this->pos=$pos;
    }

    public function getPos():string{
        return $this->pos;
    }

    public function setBackColor(int $r,int $g,int $b){
        $this->r=$r;
        $this->g=$g;
        $this->b=$b;
    }

    public function setColor(int $r,int $g,int $b){
        $this->r2=$r;
        $this->g2=$g;
        $this->b2=$b;
    }

    public function getBackColor():string{
        return "($this->r , $this->g , $this->b)";
    }

    public function getColor():string{
        return "($this->r2 , $this->g2 , $this->b2)";
    }
}

?>
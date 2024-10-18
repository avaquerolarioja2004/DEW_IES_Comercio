<?php
declare(strict_types=1);
/*
Confeccionar una clase Menu. 
Permitir añadir la cantidad de opciones que necesitemos. 
Mostrar el menú en forma horizontal o vertical (según que método llamemos.)
*/
class Menu{
    private array $objetos;

    public function __construct(...$objetos)
    {
        $this->objetos=$objetos;
    }

    public function anadirObjeto($objeto){
        $this->objetos[]=$objeto;
    }

    public function vertical(): string{
        $lista='<ul>';
        foreach($this->objetos as $objeto){
            $lista.="<li>$objeto</li>";
        }
        $lista.='</ul>';
        return $lista;
    }

    public function horizontal(): string{
        $lista='';
        foreach($this->objetos as $objeto){
            $lista.=$objeto;
            $lista.='   ';
        }
        return $lista;
    }

}

$menu=new Menu(0,'k', 0,'p');
$menu->anadirObjeto(4654);
echo $menu->horizontal();
echo $menu->vertical();

?>
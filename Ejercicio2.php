<?php

//Interfaz requerida por el cliente
interface EjecutarFormato{
    public function abrirFormato();
}

//Clases que queromos adaptar

class Window10{
    public $formatoWord;
    public $formatoExcel;
    public $formatoPowerPoint;

    public function __construct($formatoWord, $formatoExcel, $formatoPowerPoint){
        $this->formatoWord = $formatoWord;
        $this->formatoExcel = $formatoExcel;
        $this->formatoPowerPoint = $formatoPowerPoint;
    }

    //Getters
    public function getFormatoWord(){
        return $this->formatoWord;
    }
    public function getFormatoExcel(){
        return $this->formatoExcel;
    }
    public function getFormatoPowerPoint(){
        return $this->formatoPowerPoint;
    }
}

class Window07{

    //Getters
    /** 
    public function getFormatoWord(){
        return $this->formatoWord7;
    }
    public function getFormatoExcel(){
        return $this->formatoExcel;
    }
    public function getFormatoPowerPoint(){
        return $this->formatoPowerPoint;
    }
    */
    public function abrir(){
        echo "Abriendo documento de word";
    }
    
}

//Adaptador
class WindowAdapter implements EjecutarFormato{
    private $window7;

    public function __construct(Window07 $window7){
        $this->window7 = $window7;
    }
    public function abrirFormato(){
        $this->window7->abrir();
    }
}

class WindowLectura{
    public function empezarLectura(EjecutarFormato $window){
        $window->abrirFormato();
    }
}

$windows7 = new Window07();
$windowsAdaptador = new WindowAdapter($windows7);
$lectura = new WindowLectura();
$lectura->empezarLectura($windowsAdaptador);
?>
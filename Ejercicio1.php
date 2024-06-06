<?php

//Crea un programa que contenga dos personajes: "Esqueleto" y "Zombi"
//Cada personaje tendrá una lógica diferente en sus ataques y velocidad
//La creacion de los personajes dependerá del nivel del juego

//En el nivel fácil se creará un personaje "Esqueleto"
//En el nivel difícil se creará un personaje "Zombi"

//Debes aplicar el patrón de diseño Factory para la creación de los personajes

    //Interfaz para los enemigos
    interface Enemigo{
        
        public function ataque();
    }
    
    //Clase de un enemigo tipo Zombi
    class Zombi implements Enemigo{

        public $velocidad;

        public function __construct($velocidad){
            $this->velocidad = $velocidad;
        }

        public function ataque(){
            echo "Un zombi te ataca => Mordida en el cuello \n";
        }

        public function getVelocidad(){
            return $this->velocidad;
        }
    }

    //Clase de enemigo tipo Esqueleto
    class Esqueleto implements Enemigo{

        public $velocidad;

        //Método constructor
        public function __construct($velocidad){
            $this->velocidad = $velocidad;
        }

        public function ataque(){
            echo "Un esqueleto te ataca => Hueso mortal\n";
        }
        public function getVelocidad(){
            return $this->velocidad;
        }
        
    }

    //Clase Factory para crear los personajes
    class FactoryEnemigo{
        public static function crearEnemigo($tipo){
            switch ($tipo){
                case 'zombi':
                    return new Zombi("Muy lento");
                case 'esqueleto':
                    return new Esqueleto("Un poco rapido");
                default:
                    throw new Exception("Tipo de personaje desconocido");
            }
        }
    }

    //Usamos el juego
    $zombi = FactoryEnemigo::crearEnemigo('zombi');
    $zombi->ataque();
    //$zombi = new Zombi("Muy lento \n");
    echo "La velocidad es: " . $zombi->getVelocidad();

    $esqueleto = FactoryEnemigo::crearEnemigo('esqueleto');
    $esqueleto->ataque();
    //$esqueleto = new Esqueleto("VA A 1000*HORA");
    echo "La velocidad es: ". $esqueleto->getVelocidad();


?>
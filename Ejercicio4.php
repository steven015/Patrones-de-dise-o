<?php

// Interfaz de salida
interface SalidaStrategy {
    public function output($mensaje);
}

// Clase de salida por consola
class ConsoleSalida implements SalidaStrategy {
    public function output($mensaje) {
        echo $mensaje . "\n";
    }
}

// Clase de salida en formato JSON
class JsonSalida implements SalidaStrategy {
    public function output($mensaje) {
        echo json_encode(array('message' => $mensaje)) . "\n";
    }
}

// Clase de salida en archivo TXT
class TxtSalida implements SalidaStrategy {
    public function output($mensaje) {
        file_put_contents('output.txt', $mensaje . "\n", FILE_APPEND);
    }
}

// Clase que utiliza la estrategia de salida
class MessageDisplayer {
    private $salidaStrategy;

    public function __construct(SalidaStrategy $salidaStrategy) {
        $this->salidaStrategy = $salidaStrategy;
    }

    public function displayMessage($mensaje) {
        $this->salidaStrategy->output($mensaje);
    }
}

// Uso del patrón Strategy
$mensajeDisplayer = new MessageDisplayer(new ConsoleSalida());
$mensajeDisplayer->displayMessage('Hola, mundo en consola!');

$mensajeDisplayer = new MessageDisplayer(new JsonSalida());
$mensajeDisplayer->displayMessage('Hola, mundo en Json!');

$mensajeDisplayer = new MessageDisplayer(new TxtSalida());
$mensajeDisplayer->displayMessage('Hola, mundo!');
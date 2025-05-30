<?php
class Locomotora {
    public $pesoLocomotora;
    public $velocidadMaxima;

public function __construct(
    $pesoLocomotora,
    $velocidadMaxima
    ) {
    $this->pesoLocomotora = $pesoLocomotora;
    $this->velocidadMaxima = $velocidadMaxima;
}

public function getPesoLocomotora() {
    return $this->pesoLocomotora;
}

public function getVelocidadMaxima() {
    return $this->velocidadMaxima;
}

public function setPesoLocomotora($pesoLocomotora) {
    $this->pesoLocomotora = $pesoLocomotora;
}

public function setVelocidadMaxima($velocidadMaxima) {
    $this->velocidadMaxima = $velocidadMaxima;
}

 public function __toString(){
            "\n Información de la locomotora: \n" .
            "Peso de la locomotora: " . $this->getPesoLocomotora() . "\n" .
            "Velocidad máxima de la locomotora: " . $this->getVelocidadMaxima() . "\n";
        }


}
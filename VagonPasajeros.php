<?php

class VagonPasajeros extends Vagon{

private $cantMaxPasajeros;
private $cantPasajerosActuales;
private $promPesoPasajeros;

public function __construct(
    $anioInstalacion, 
    $largoVagon, 
    $anchoVagon, 
    $pesoVagonVacio,
    $cantMaxPasajeros,
    $cantPasajerosActuales,
    $promPesoPasajeros
) {
    parent::__construct($anioInstalacion, $largoVagon, $anchoVagon, $pesoVagonVacio);
    $this->cantMaxPasajeros = $cantMaxPasajeros;
    $this->cantPasajerosActuales = $cantPasajerosActuales;
    $this->promPesoPasajeros = $promPesoPasajeros;
    $this->actualizarPeso = $actualizarPeso;

}

public function getCantMaxPasajeros() {
    return $this->cantMaxPasajeros;
}

public function getCantPasajerosActuales() {
    return $this->cantPasajerosActuales;
}

public function getPromPesoPasajeros() {
    return $this->promPesoPasajeros;
}

public function setCantMaxPasajeros($cantMaxPasajeros) {
    $this->cantMaxPasajeros = $cantMaxPasajeros;
}

public function setCantPasajerosActuales($cantPasajerosActuales) {
    $this->cantPasajerosActuales = $cantPasajerosActuales;
}

public function setPromPesoPasajeros($promPesoPasajeros) {
    $this->promPesoPasajeros = $promPesoPasajeros;
}

public function incorporarPasajeroVagon($cantidadPasajeros){
    $incorporacionExitosa = false;
    $cantidadPasajerosVagon = getCantPasajerosActuales() + $cantidadPasajeros;
    if ($this->getCantMaxPasajeros() + $cantidadPasajeros <= $this->getCantMaxPasajeros()) {
        $this->getCantPasajerosActuales += $cantidadPasajeros;
        $this->actualizarPeso();
        $incorporacionExitosa = true;
    }
    return $incorporacionExitosa;
}

public function calcularPesoVagon() {
    $pesoFinalVagon = 0;
    $pesoBase = parent::getPesoVagonVacio();
    $pesoFinalVagon = $pesoBase + ($this->getCantPasajerosActuales() * $this->getPromPesoPasajeros());
    return $pesoFinalVagon;
}


 public function __toString(){
            return parent::__toString() .
            "\n Información del vagón de pasajeros: \n" .
            "Cantidad máxima de pasajeros: " . $this->getCantMaxPasajeros() . "\n" .
            "Cantidad de pasajeros: " . $this->getCantPasajeros() . "\n" .
            "Peso promedio de los pasajeros: " . $this->getPromPesoPasajeros() . "\n";
        }


}
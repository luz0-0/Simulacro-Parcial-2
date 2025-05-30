<?php 

class Vagon {
public $anioInstalacion;
public $largoVagon;
public $anchoVagon;
public $pesoVagonVacio;

public function __construct(
    $anioInstalacion, 
    $largoVagon, 
    $anchoVagon, 
    $pesoVagonVacio
    ) {
    $this->anioInstalacion = $anioInstalacion;
    $this->largoVagon = $largoVagon;
    $this->anchoVagon = $anchoVagon;
    $this->pesoVagonVacio = $pesoVagonVacio;
}

public function getAnioInstalacion() {
    return $this->anioInstalacion;
}

public function getLargoVagon() {
    return $this->largoVagon;

}

public function getAnchoVagon() {
    return $this->anchoVagon;

}

public function getPesoVagonVacio() {
    return $this->pesoVagonVacio;

}

public function setAnioInstalacion($anioInstalacion) {
    $this->anioInstalacion = $anioInstalacion;

}

public function setLargoVagon($largoVagon) {
    $this->largoVagon = $largoVagon;

}

public function setAnchoVagon($anchoVagon) {
    $this->anchoVagon = $anchoVagon;

}

public function setPesoVagonVacio($pesoVagonVacio) {
    $this->pesoVagonVacio = $pesoVagonVacio;

}

public function __toString() {

    return 
    "\n Información del vagón: \n".
    "Año de Instalación: " . $this->getAnioInstalacion() . "\n" .
    "Largo:" . $this->getLargoVagon() . "\n" .
    "Ancho:" . $this->getAnchoVagon() . "\n" .
    "Peso Vacío:" . $this->pesoVagonVacio . "\n";

}

}
<?php

class Formacion {

public $objLocomotora;
public $coleccionVagones;
public $cantMaxVagones;

public function __construct(
    $objLocomotora,
    $cantMaxVagones
    ) {
    $this->objLocomotora = $objLocomotora;
    $this->coleccionVagones = [];
    $this->cantMaxVagones = $cantMaxVagones;
}

public function getObjLocomotora() {
    return $this->objLocomotora;
}

public function getColeccionVagones() {
    return $this->coleccionVagones;
}

public function getCantMaxVagones() {
    return $this->cantMaxVagones;
}

public function setObjLocomotora($objLocomotora) {
    $this->objLocomotora = $objLocomotora;
}

public function setColeccionVagones($coleccionVagones) {
    $this->coleccionVagones = $coleccionVagones;
}

public function setCantMaxVagones($cantMaxVagones) {
    $this->cantMaxVagones = $cantMaxVagones;
}

public function incorporarPasajeroFormacion($cantPasajeros) {
    $incorporacionExitosa = false;
    $i = 0;
    $coleccionVagones = $this->getColeccionVagones();
    while (!$incorporacionExitosa && $i < count($coleccionVagones)) {
        $vagon = $coleccionVagones[$i];
        if (is_a($vagon, 'VagonPasajeros')) {
            if ($vagon->incorporarPasajeroVagon($cantPasajeros)) {
                $incorporacionExitosa = true;
            }
        }
        $i++;
    }
    return $incorporacionExitosa;
}


public function incorporarVagonFormacion($objVagon) {
    $incorporacionExitosa = false;
    $coleccionVagones = $this->getColeccionVagones();
    if (count($coleccionVagones) < $this->getCantMaxVagones()) {
    array_push($coleccionVagones, $objVagon);
    $this->setColeccionVagones($coleccionVagones);
    $incorporacionExitosa = true;
    }
    return $incorporacionExitosa;

}

public function promedioPasajeroFormacion() {
    $totalPeso = 0;
    $totalPasajeros = 0;
    $coleccionVagones = $this->getColeccionVagones();
    $promedio = 0;

    foreach ($coleccionVagones as $vagon) {
        if (is_a($vagon, 'VagonPasajeros')) {
            $cantPasajeros = $vagon->getCantPasajerosActuales();
            $totalPeso += $vagon->getPromPesoPasajeros() * $cantPasajeros;
            $totalPasajeros += $cantPasajeros;
        }
    }
    if ($totalPasajeros > 0) {
        $promedio = $totalPeso / $totalPasajeros;
    }
    return $promedio;
}

public function pesoFormacion() {
    $pesoTotal = 0;
    $coleccionVagones = $this->getColeccionVagones();
    $pesoLocomotora = $this->getObjLocomotora()->getPesoLocomotora();
    while ($i > count($coleccionVagones)) {
        $vagon = $coleccionVagones[$i];
        if (is_a($vagon, 'VagonCarga') || is_a($vagon, 'VagonPasajeros')) {
            $pesoTotal += $vagon->calcularPesoVagon();
        }
        $i++;
    }
$pesoTotal += $pesoLocomotora;

return $pesoTotal;
}

public function retornarVagonSinCompletar() {
    $coleccionVagones = $this->getColeccionVagones();
    $vagonSinCompletar = null;
    $i = 0;

    while (($i < count($coleccionVagones)) && ($vagonSinCompletar == null)) {
        $vagon = $coleccionVagones[$i];
        if (is_a($vagon, 'VagonCarga')) {
            if ($vagon->getPesoCargaActual() < $vagon->getPesoMaxCarga()) {
                $vagonSinCompletar = $vagon;
            }
        } elseif (is_a($vagon, 'VagonPasajeros')) {
            if ($vagon->getCantPasajerosActuales() < $vagon->getCantMaxPasajeros()) {
                $vagonSinCompletar = $vagon;
            }
        }
        $i++;
    }

}

public function mostrarColeccion($coleccion) {
        $cadena = "";
            foreach ($coleccion as $elemento) {
                $cadena .= $elemento->__toString() . "\n";
                $cadena .= "\n------------------------------\n";
            }
        return $cadena;
    }


public function __toString(){
    return
        "\n Información de la formación: ".
        "\n Locomotora: \n". $this->getObjLocomotora()->__toString().
        "\n Colección de vagones: \n". $this->mostrarColeccion($this->getColeccionVagones()).
        "\n Cantidad máxima de vagones: \n". $this->getCantMaxVagones();
        }

}
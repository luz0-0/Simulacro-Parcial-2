<?php

class VagonCarga extends Vagon {

    private $pesoMaxCarga;
    private $pesoCargaActual;

    public function __construct(
        $anioInstalacion, 
        $largoVagon, 
        $anchoVagon, 
        $pesoVagonVacio,
        $pesoMaxCarga,
        $pesoCargaActual
    ) {
        parent::__construct(
            $anioInstalacion, 
            $largoVagon, 
            $anchoVagon, 
            $pesoVagonVacio
        );
        $this->pesoMaxCarga = $pesoMaxCarga;
        $this->pesoCargaActual = $pesoCargaActual;
    }

    public function getPesoMaxCarga() {
        return $this->pesoMaxCarga;
    }

    public function getPesoCargaActual() {
        return $this->pesoCargaActual;
    }

    public function setPesoMaxCarga($pesoMaxCarga) {
        $this->pesoMaxCarga = $pesoMaxCarga;
    }

    public function setPesoCargaActual($pesoCargaActual) {
        $this->pesoCargaActual = $pesoCargaActual;
    }


    public function incorporarCargaVagon($pesoCarga) {
        $incorporacionExitosa = false;
        if ($this->getPesoCargaActual() + $pesoCarga <= $this->getPesoMaxCarga()) {
            $this->setPesoCargaActual($this->getPesoCargaActual() + $pesoCarga);
            $incorporacionExitosa = true;
        }
        return $incorporacionExitosa;
    }

    public function calcularPesoVagon() {
        $pesoBase = parent::getPesoVagonVacio();
        $pesoVagon = $this->getPesoVagonVacio() + ($this->getPesoCargaActual() * $this->getIndiceCarga());
        $pesoFinalVagon = 0;
        $pesoFinal = $pesoBase + $pesoVagon;
        return $pesoFinal;
    }

    public function __toString() {
        return parent::__toString() . 
               " Peso máximo de carga: " . $this->pesoMaxCarga . 
               " Peso de carga actual: " . $this->pesoCargaActual;
    }
}
<?php

include_once 'Vagon.php';
include_once 'VagonCarga.php';
include_once 'VagonPasajeros.php';
include_once 'Formacion.php';
include_once 'Locomotora.php';

$locomotora = new Locomotora(188, 140);

$vagon1 = new VagonPasajeros(2020, 20, 10, 15000, 30, 25, 50);
$vagonCarga = new VagonCarga(2020, 20, 10, 15000, 100000, 55000);
$vagon = new VagonPasajeros(2020, 20, 10, 15000, 50, 50, 50);

$formacion = new Formacion($locomotora, 5);
$formacion->incorporarVagonFormacion($vagon1);
$formacion->incorporarVagonFormacion($vagonCarga);
$formacion->incorporarVagonFormacion($vagon);

$incorporacion6pasajeros = $formacion->incorporarPasajeroFormacion(6);
echo "Incorporación de 6 pasajeros: " . ($incorporacion6pasajeros ? "Incorporación exitosa" : "No se pudo incorporar") . "\n";

echo $vagon1;
echo $vagonCarga;
echo $vagon;

$incorporacion14pasajeros = $formacion->incorporarPasajeroFormacion(14);
echo "Incorporación de 14 pasajeros: " . ($incorporacion14pasajeros ? "Incorporación exitosa" : "No se pudo incorporar") . "\n";

echo $locomotora;

   
echo "\n Promedio de pasajeros por vagón: " . $formacion->promedioPasajeroFormacion() . "\n";



echo "\n Peso total de la formación: " . $formacion->pesoFormacion() . "\n";

echo $vagon1;
echo $vagonCarga;
echo $vagon;
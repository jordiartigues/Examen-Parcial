<?php

declare(strict_types=1);

require_once 'Jugador.php';
require_once 'Posicion.php';
require_once 'Equipo.php';

$jugador1 = new Jugador("Jordi", 22, 1.75, 66, [Posicion::BASE, Posicion::ESCOLTA]);
$jugador2 = new Jugador("Pepe", 22, 1.75, 66, [Posicion::BASE]);
$jugador3 = new Jugador("Juan", 20, 1.75, 66, [Posicion::ESCOLTA]);
$jugador4 = new Jugador("Alfredo", 19, 1.75, 66, [Posicion::ALERO]);

$equipo = new Equipo();

$equipo->agregarJugador($jugador1);
$equipo->agregarJugador($jugador2);
$equipo->agregarJugador($jugador3);
$equipo->agregarJugador($jugador4);


// Buscar jugadores sub21

$jugadoresSub21 = $equipo->obtenerJugadoresSub21();

echo "Jugadores aptos para el equipo Sub21:\n";

foreach ($jugadoresSub21 as $jugador) {
    echo $jugador->getNombre() . "\n";
}


// Buscar jugadores por posicion

$jugadoresPorPosicion = $equipo->obtenerJugadoresPorPosicion(Posicion::BASE);

echo "\nJugadores que juegan de base:\n";

foreach ($jugadoresPorPosicion as $jugador) {
    echo $jugador->getNombre() . "\n";
}

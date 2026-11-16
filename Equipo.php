<?php

declare(strict_types=1);

require_once 'Jugador.php';
require_once 'Posicion.php';

class Equipo
{
    private array $jugadores = [];

    public function agregarJugador(Jugador $jugador): void
    {
        if (in_array($jugador, $this->jugadores, true)) {
            throw new InvalidArgumentException("El jugador ya está registrado en el equipo");
        }

        $this->jugadores[] = $jugador;
    }

    public function obtenerJugadoresSub21(): array
    {
        $jugadoresSub21 = [];

        foreach ($this->jugadores as $jugador) {
            if ($jugador->getEdad() <= 21) {
                $jugadoresSub21[] = $jugador;
            }
        }

        return $jugadoresSub21;
    }

    public function obtenerJugadoresPorPosicion(Posicion $posicion): array
    {
        $jugadoresPorPosicion = [];

        foreach ($this->jugadores as $jugador) {
            if (in_array($posicion, $jugador->getPosiciones(), true)) {
                $jugadoresPorPosicion[] = $jugador;
            }
        }

        return $jugadoresPorPosicion;
    }
}
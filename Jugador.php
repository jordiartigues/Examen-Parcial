<?php

declare(strict_types=1);

require_once 'Posicion.php';

class Jugador
{
    private string $nombre;
    private int $edad;
    private float $altura;
    private int $peso;
    private array $posiciones;

    public function __construct(string $nombre, int $edad, float $altura, int $peso, array $posiciones)
    {

        $nombre = trim($nombre);

        if ($nombre === "") {
            throw new InvalidArgumentException("El nombre no puede estar vacío");
        }

        if ($edad < 0) {
            throw new InvalidArgumentException("La edad no puede ser negativa");
        }

        if ($altura <= 0) {
            throw new InvalidArgumentException("La altura debe ser mayor que cero");
        }

        if ($peso <= 0) {
            throw new InvalidArgumentException("El peso debe ser mayor que cero");
        }

        if (empty($posiciones)) {
            throw new InvalidArgumentException("El jugador debe tener al menos una posición");
        }

        $posicionesValidadas = [];

        foreach ($posiciones as $posicion) {

            if (!$posicion instanceof Posicion) {
                throw new InvalidArgumentException("Posición no válida");
            }

            if (in_array($posicion, $posicionesValidadas, true)) {
                throw new InvalidArgumentException("No se puede repetir una posición");
            }

            $posicionesValidadas[] = $posicion;
        }

        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->altura = $altura;
        $this->peso = $peso;
        $this->posiciones = $posicionesValidadas;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getEdad(): int
    {
        return $this->edad;
    }

    public function getAltura(): float
    {
        return $this->altura;
    }

    public function getPeso(): int
    {
        return $this->peso;
    }

    public function getPosiciones(): array
    {
        return $this->posiciones;
    }

    public function __toString(): string
    {
        $posicionesTexto = "";

        foreach ($this->posiciones as $posicion) {
            $posicionesTexto .= $posicion->value . ", ";
        }

        return "Nombre del jugador: " . $this->nombre . "\n" .
            "Edad del jugador: " . $this->edad . "\n" .
            "Altura del jugador: " . $this->altura . "\n" .
            "Peso del jugador: " . $this->peso . "\n" .
            "Posiciones del jugador: " . $posicionesTexto . "\n";
    }
}
